<?php

namespace Maternidad\Http\Controllers;

use Illuminate\Http\Request;

use Maternidad\Http\Requests;
use Maternidad\Http\Controllers\Controller;
use Validator;
use Maternidad\OtCorrectivo;
use Maternidad\OtPreventivo;
use Maternidad\Servicio;
use Maternidad\Activo;
use Carbon\Carbon;
use DB;
use Maternidad\Http\Controllers\dataContainer;

class adquisicionController extends Controller
{
    public function a_1()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Cantidad de compras programadas por año";//nombre de la p'agin;
        $dataContainer->siderbar_type ="purchase";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="compras_programadas_año_rep";
        $dataContainer->report_name="Cantidad de compras programadas por año";
        $dataContainer->service=true;
        $dataContainer->group=false;
        $dataContainer->departament=true;
        
        return view('indicators.purchase.1',compact('dataContainer'));
    }

    public function a_2()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Ejecución de compras";//nombre de la p'agin;
        $dataContainer->siderbar_type ="purchase";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="ejecucion_compras_rep";
        $dataContainer->report_name="Ejecución de compras";
        $dataContainer->service=true;
        $dataContainer->group=false;
        $dataContainer->departament=true;

        return view('indicators.purchase.2',compact('dataContainer'));
    }

    public function a_3()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Personal del Comité (Cantidad de expedientes asignados)";//nombre de la p'agin;
        $dataContainer->siderbar_type = "purchase";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="personal_comite_rep";
        $dataContainer->report_name="Personal del Comité (Cantidad de expedientes asignados)";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        

        return view('indicators.purchase.3',compact('dataContainer'));
    }

    public function a_4()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Gasto efectivo en compra de equipos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "purchase";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="gasto_efectivo_compras_rep";
        $dataContainer->report_name="Gasto efectivo en compra de equipos";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        

        return view('indicators.purchase.4',compact('dataContainer'));
    }

    public function a_5()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo de compra de equipos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "purchase";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="tiempo_compra_equipos_rep";
        $dataContainer->report_name="Tiempo de compra de equipos";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        

        return view('indicators.purchase.5',compact('dataContainer'));
    }

    public function a_1_post(Request $request)
    {
        /*Validator section*/
        /*
         $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('motivo_baja_equipo')
                        ->withErrors($validator)
                        ->withInput();
        }
        */

        //INICIALIZACION DE VARIABLES
        $servicio=null;
        $departamento=null;
        $grupo=null;

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $servicio =$request->search_servicio;
        $departamento= $request->search_departament;
        $grupo = $request->search_grupo;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $programacion_compras=null;

        $sql = 'select "1. Atrasado" as estado_programacion, count(p.idprogramacion_compra) as cantidad
                from programacion_compra_adquisicion p
                where (year(p.fecha_aproximada_adquisicion) * 10000 +
                      month(p.fecha_aproximada_adquisicion) * 100 +
                      day(p.fecha_aproximada_adquisicion) < 
                      year(curdate()) * 10000 + month(curdate()) * 100 + day(curdate()))
                    and ((p.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((p.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0))                     
                    and (p.fecha_inicio_evaluacion >= \''.$date_start_c.'\'  
                               and p.fecha_inicio_evaluacion <= \''.$date_end_c.'\' )
                union
                select "2. Programado Mes Actual" as estado_programacion, count(p.idprogramacion_compra) as cantidad
                from programacion_compra_adquisicion p
                where (year(p.fecha_aproximada_adquisicion) * 10000 +
                      month(p.fecha_aproximada_adquisicion) * 100 = 
                      year(curdate()) * 10000 + month(curdate()) * 100)
                    and (day(p.fecha_aproximada_adquisicion) >= day(curdate()))
                    and ((p.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((p.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0))                     
                    and (p.fecha_inicio_evaluacion >= \''.$date_start_c.'\'  
                               and p.fecha_inicio_evaluacion <= \''.$date_end_c.'\' )
                union
                select "3. Programado Trimestre Actual" as estado_programacion, count(p.idprogramacion_compra) as cantidad
                from programacion_compra_adquisicion p
                where (year(p.fecha_aproximada_adquisicion) * 10000 +
                      month(p.fecha_aproximada_adquisicion) * 100 <= 
                      year(curdate()) * 10000 + 
                      if(mod(month(curdate()),3)=0,month(curdate())/3,ceil(month(curdate())/3)) * 3 * 100)
                    and (month(p.fecha_aproximada_adquisicion) > month(curdate()))
                    and ((p.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((p.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0))                     
                    and (p.fecha_inicio_evaluacion >= \''.$date_start_c.'\'  
                               and p.fecha_inicio_evaluacion <= \''.$date_end_c.'\' )
                union
                select "4. Programado Resto del Año" as estado_programacion, count(p.idprogramacion_compra) as cantidad
                from programacion_compra_adquisicion p
                where (year(p.fecha_aproximada_adquisicion) * 10000 = year(curdate()) * 10000)
                    and (if(mod(month(curdate()),3)=0,month(curdate())/3,ceil(month(curdate())/3)) < 
                         if(mod(month(p.fecha_aproximada_adquisicion),3)=0,month(p.fecha_aproximada_adquisicion)/3,ceil(month(p.fecha_aproximada_adquisicion)/3)))
                    and ((p.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((p.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0))                     
                    and (p.fecha_inicio_evaluacion >= \''.$date_start_c.'\'  
                               and p.fecha_inicio_evaluacion <= \''.$date_end_c.'\' )
                ';
        $programacion_compras = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($programacion_compras as $programacion_compra) {
            $i++;
            $data[$i][0] = $programacion_compra->estado_programacion;
            $data[$i][1] = $programacion_compra->cantidad;             
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Cantidad de compras programadas por año";//nombre de la p'agin;
        $dataContainer->siderbar_type ="purchase";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="compras_programadas_año_rep";
        $dataContainer->report_name="Cantidad de compras programadas por año";
        $dataContainer->service=true;
        $dataContainer->group=false;
        $dataContainer->departament=true;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.purchase.1',compact('dataContainer'));

    }


    public function a_2_post(Request $request)
    {
       /*Validator section*/
        /*
         $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('motivo_baja_equipo')
                        ->withErrors($validator)
                        ->withInput();
        }
        */

        //INICIALIZACION DE VARIABLES
        $servicio=null;
        $departamento=null;
        $grupo=null;

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $servicio =$request->search_servicio;
        $departamento= $request->search_departament;
        $grupo = $request->search_grupo;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $expedientes_tecnico=null;

        $sql = 'select "Ejecutados" as tipo_expediente, count(e.idexpediente_tecnico) as cant_expedientes
                from expediente_tecnico e
                where (e.idoferta_ganador is not null)
                    and ((e.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((e.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0))                     
                    and (e.created_at >= \''.$date_start_c.'\'  
                               and e.created_at <= \''.$date_end_c.'\' )
                union
                select "Pendientes" as tipo_expediente, count(e.idexpediente_tecnico) as cant_expedientes
                from expediente_tecnico e
                where (e.idoferta_ganador is null)
                    and ((e.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((e.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0))                     
                    and (e.created_at >= \''.$date_start_c.'\'  
                               and e.created_at <= \''.$date_end_c.'\' )
                ';
        $expedientes_tecnico = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($expedientes_tecnico as $expediente_tecnico) {
            $i++;
            $data[$i][0] = $expediente_tecnico->tipo_expediente;
            $data[$i][1] = $expediente_tecnico->cant_expedientes;             
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Ejecución de compras";//nombre de la p'agin;
        $dataContainer->siderbar_type ="purchase";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="ejecucion_compras_rep";
        $dataContainer->report_name="Ejecución de compras";
        $dataContainer->service=true;
        $dataContainer->group=false;
        $dataContainer->departament=true;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.purchase.2',compact('dataContainer'));     
    }



    public function a_3_post(Request $request)
    {
        
        /*Validator section*/
        /*
         $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('motivo_baja_equipo')
                        ->withErrors($validator)
                        ->withInput();
        }
        */

        //INICIALIZACION DE VARIABLES

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $expedientes_tecnicos=null;

        $sql = 'select concat(u.apellido_pat, " ", u.apellido_mat, " ", u.nombre) as nombre_usuario, 
                       if(presidentes.cant_expedientes is null, "-",presidentes.cant_expedientes)  as Presidente,
                       if(miembros1.cant_expedientes is null, "-",miembros1.cant_expedientes)  as Miembro1,
                       if(miembros2.cant_expedientes is null, "-",miembros2.cant_expedientes)  as Miembro2,
                       if(miembros3.cant_expedientes is null, "-",miembros3.cant_expedientes)  as Miembro3,
                       (if(presidentes.cant_expedientes is null, 0,presidentes.cant_expedientes) + 
                        if(miembros1.cant_expedientes is null, 0,miembros1.cant_expedientes) + 
                        if(miembros2.cant_expedientes is null, 0,miembros2.cant_expedientes) +
                        if(miembros2.cant_expedientes is null, 0,miembros2.cant_expedientes)) as total_carga
                from users u
                    left join (select e.idpresidente, count(e.idexpediente_tecnico) as cant_expedientes
                          from expediente_tecnico e
                          where e.idpresidente is not null
                          group by e.idpresidente) as presidentes on u.id = presidentes.idpresidente
                    left join (select e.idmiembro1, count(e.idexpediente_tecnico) as cant_expedientes
                          from expediente_tecnico e
                          where e.idmiembro1 is not null
                          group by e.idmiembro1) as miembros1 on u.id = miembros1.idmiembro1
                    left join (select e.idmiembro2, count(e.idexpediente_tecnico) as cant_expedientes
                          from expediente_tecnico e
                          where e.idmiembro2 is not null
                          group by e.idmiembro2) as miembros2 on u.id = miembros2.idmiembro2
                    left join (select e.idmiembro3, count(e.idexpediente_tecnico) as cant_expedientes
                          from expediente_tecnico e
                          where e.idmiembro3 is not null
                          group by e.idmiembro3) as miembros3 on u.id = miembros3.idmiembro3
                where (presidentes.cant_expedientes is not null or miembros1.cant_expedientes is not null or 
                        miembros2.cant_expedientes is not null or miembros3.cant_expedientes is not null)
                    and (e.created_at >= \''.$date_start_c.'\'  
                    and e.created_at <= \''.$date_end_c.'\' )
                ';
        $expedientes_tecnicos = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($expedientes_tecnicos as $expediente_tecnico) {
            $i++;
            $data[$i][0] = $expediente_tecnico->nombre_usuario;
            $data[$i][1] = $expediente_tecnico->Presidente;             
            $data[$i][2] = $expediente_tecnico->Miembro1;   
            $data[$i][3] = $expediente_tecnico->Miembro2;   
            $data[$i][4] = $expediente_tecnico->Miembro3;   
            $data[$i][5] = $expediente_tecnico->total_carga; 
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Personal del Comité (Cantidad de expedientes asignados)";//nombre de la p'agin;
        $dataContainer->siderbar_type ="purchase";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="personal_comite_rep";
        $dataContainer->report_name="Personal del Comité (Cantidad de expedientes asignados)";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.purchase.3',compact('dataContainer'));     
    }

    public function a_4_post(Request $request)
    {
        
        /*Validator section*/
        /*
         $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('motivo_baja_equipo')
                        ->withErrors($validator)
                        ->withInput();
        }
        */

        //INICIALIZACION DE VARIABLES

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $expedientes_tecnicos=null;

        $sql = 'select a.nombre as area, if(s.nombre is null, "-", s.nombre) as servicio, FORMAT(sum(o.precio),2) as total_gasto
                from expediente_tecnico e
                    join areas a on e.idarea = a.idarea
                    join oferta_expediente o on e.idoferta_ganador = o.idoferta_expediente
                    left join servicios s on e.idservicio = s.idservicio                                        
                group by a.nombre, s.nombre
                where (e.created_at >= \''.$date_start_c.'\'  
                    and e.created_at <= \''.$date_end_c.'\' )
                ';
        $expedientes_tecnicos = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($expedientes_tecnicos as $expediente_tecnico) {
            $i++;
            $data[$i][0] = $expediente_tecnico->area;
            $data[$i][1] = $expediente_tecnico->servicio;             
            $data[$i][2] = $expediente_tecnico->total_gasto;   
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Gasto efectivo en compra de equipos)";//nombre de la p'agin;
        $dataContainer->siderbar_type ="purchase";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="gasto_efectivo_compras_rep";
        $dataContainer->report_name="Gasto efectivo en compra de equipos)";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.purchase.4',compact('dataContainer'));     
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

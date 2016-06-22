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

class riesgosController extends Controller
{
    public function r_1()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eventos adversos por rango de edades";//nombre de la p'agin;
        $dataContainer->siderbar_type ="risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eventos_adversos_por_edades_rep";
        $dataContainer->report_name="Eventos adversos por rango de edades";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        
        return view('indicators.risks.1',compact('dataContainer'));
    }

    public function r_2()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eventos adversos por sexo";//nombre de la p'agin;
        $dataContainer->siderbar_type ="risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eventos_adversos_por_sexo_rep";
        $dataContainer->report_name="Eventos adversos por sexo";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;

        return view('indicators.risks.2',compact('dataContainer'));
    }

    public function r_3()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eventos adversos por tipo de incidente";//nombre de la p'agin;
        $dataContainer->siderbar_type = "risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eventos_adversos_por_tipo_incidente_rep";
        $dataContainer->report_name="Eventos adversos por tipo de incidente";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        

        return view('indicators.risks.3',compact('dataContainer'));
    }

    public function r_4()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eventos adversos por entorno asistencial";//nombre de la p'agin;
        $dataContainer->siderbar_type = "risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eventos_adversos_por_entorno_asistencial_rep";
        $dataContainer->report_name="Eventos adversos por entorno asistencial";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        

        return view('indicators.risks.4',compact('dataContainer'));
    }

    public function r_5()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eventos adversos por equipo médico involucrado";//nombre de la p'agin;
        $dataContainer->siderbar_type = "risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eventos_adversos_por_equipo_medico_rep";
        $dataContainer->report_name="Eventos adversos por equipo médico involucrado";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        

        return view('indicators.risks.5',compact('dataContainer'));
    }

    public function r_6()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Calibración de equipos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="calibracion_rep";
        $dataContainer->report_name="Calibración de equipos";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        

        return view('indicators.risks.6',compact('dataContainer'));
    }

    public function r_1_post(Request $request)
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

        $eventos=null;

        $sql = 'select
                    CASE
                        WHEN edad < 2 THEN "00 - 01"
                        WHEN edad BETWEEN 2 and 9 THEN "02 - 10"
                        WHEN edad BETWEEN 10 and 19 THEN "10 - 19"
                        WHEN edad BETWEEN 20 and 29 THEN "20 - 29"
                        WHEN edad BETWEEN 30 and 39 THEN "30 - 39"
                        WHEN edad BETWEEN 40 and 49 THEN "40 - 49"
                        WHEN edad BETWEEN 50 and 59 THEN "50 - 59"
                        WHEN edad BETWEEN 60 and 69 THEN "60 - 69"
                        WHEN edad BETWEEN 70 and 79 THEN "70 - 79"
                        WHEN edad >= 80 THEN "Mayor a 80"
                    END as rango_edad,
                    COUNT(*) AS cantidad
                FROM eventos_adversos                
                where (fecha_incidente >= \''.$date_start_c.'\'  
                               and fecha_incidente <= \''.$date_end_c.'\' )
                GROUP BY rango_edad
                ORDER BY rango_edad
                ';
        $eventos = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($eventos as $evento) {
            $i++;
            $data[$i][0] = $evento->rango_edad;
            $data[$i][1] = $evento->cantidad;             
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eventos adversos por rango de edades";//nombre de la p'agin;
        $dataContainer->siderbar_type ="risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eventos_adversos_por_edades_rep";
        $dataContainer->report_name="Eventos adversos por rango de edades";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.risks.1',compact('dataContainer'));

    }


    public function r_2_post(Request $request)
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

        $eventos=null;

        $sql = 'select
                    CASE
                        WHEN sexo = "M" THEN "Masculino"
                        WHEN sexo = "F" THEN "Femenino"
                    END as tipo_sexo,
                    COUNT(*) AS cantidad
                FROM eventos_adversos                
                where (fecha_incidente >= \''.$date_start_c.'\'  
                               and fecha_incidente <= \''.$date_end_c.'\' )
                GROUP BY tipo_sexo
                ORDER BY tipo_sexo
                ';
        $eventos = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($eventos as $evento) {
            $i++;
            $data[$i][0] = $evento->tipo_sexo;
            $data[$i][1] = $evento->cantidad;             
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eventos adversos por sexo";//nombre de la p'agin;
        $dataContainer->siderbar_type ="risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eventos_adversos_por_sexo_rep";
        $dataContainer->report_name="Eventos adversos por sexo";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.risks.2',compact('dataContainer'));     
    }



    public function r_3_post(Request $request)
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

        $tipos_incidente=null;
        $sql = 'select t.nombre as nombre_incidente, count(e.id) as cantidad
                from eventos_adversosxsubtipohijo_incidente e
                    join eventos_adversos ea on e.idevento = ea.id
                    join subtipohijo_incidente h on e.idsubtipohijo = h.id
                    join subtipopadre_incidente p on h.idsubtipopadre_incidente = p.id
                    join tipo_incidente t on p.idtipo_incidente = t.id                    
                where (ea.fecha_incidente >= \''.$date_start_c.'\'  
                    and ea.fecha_incidente <= \''.$date_end_c.'\' )
                    group by t.nombre
                ';
        $tipos_incidente = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($tipos_incidente as $tipo_incidente) {
            $i++;
            $data[$i][0] = $tipo_incidente->nombre_incidente;
            $data[$i][1] = $tipo_incidente->cantidad;     
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eventos adversos por tipo de incidente";//nombre de la p'agin;
        $dataContainer->siderbar_type ="risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eventos_adversos_por_tipo_incidente_rep";
        $dataContainer->report_name="Eventos adversos por tipo de incidente";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.risks.3',compact('dataContainer'));     
    }

    public function r_4_post(Request $request)
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

        $tipos_incidente=null;
        $sql = 'select es.nombre as nombre_incidente, count(e.id) as cantidad
                from eventoxentorno_asistencial e
                    join eventos_adversos ea on e.idevento = ea.id
                    join entorno_asistencial es on e.identorno = es.id                
                where (ea.fecha_incidente >= \''.$date_start_c.'\'  
                    and ea.fecha_incidente <= \''.$date_end_c.'\' )
                    group by es.nombre
                ';
        $tipos_incidente = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($tipos_incidente as $tipo_incidente) {
            $i++;
            $data[$i][0] = $tipo_incidente->nombre_incidente;
            $data[$i][1] = $tipo_incidente->cantidad;     
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eventos adversos por entorno_asistencial";//nombre de la p'agin;
        $dataContainer->siderbar_type ="risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eventos_adversos_por_entorno_asistencial_rep";
        $dataContainer->report_name="Eventos adversos por entorno_asistencial";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.risks.4',compact('dataContainer'));      
    }

    public function r_5_post(Request $request)
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

        $equipos=null;
        $sql = 'select f.nombre_equipo, count(e.id) as cantidad
                from eventos_adversos e
                    join activos a on e.idactivo = a.idactivo
                    join modelo_activos m on a.idmodelo_equipo = m.idmodelo_equipo
                    join familia_activos f on m.idfamilia_activo = f.idfamilia_activo
                where (e.fecha_incidente >= \''.$date_start_c.'\'  
                    and e.fecha_incidente <= \''.$date_end_c.'\' )
                    group by f.nombre_equipo
                ';
        $equipos = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($equipos as $equipo) {
            $i++;
            $data[$i][0] = $equipo->nombre_equipo;
            $data[$i][1] = $equipo->cantidad;     
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eventos adversos por equipo médico involucrado";//nombre de la p'agin;
        $dataContainer->siderbar_type ="risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eventos_adversos_por_equipo_medico_rep";
        $dataContainer->report_name="Eventos adversos por equipo médico involucrado";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.risks.4',compact('dataContainer'));      
    }

    public function r_6_post(Request $request)
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

        $equipos=null;
        $sql = 'select 
                    case 
                    when a.fecha_garantia_fin >= curdate() then "Equipos en garantía"
                    when a.fecha_garantia_fin < curdate() then "Equipos fuera de garantía"
                    end as estado_garantia,
                    count(terminados.id) as terminados, 
                    count(pendientes.id) as pendientes
                from activos a
                    left join (select r.id, r.idactivo, r.fecha_calibracion
                          from reporte_calibracion r
                          where r.idestado = 28
                                and (r.fecha_calibracion >= \''.$date_start_c.'\'  
                                and r.fecha_calibracion <= \''.$date_end_c.'\' )) as terminados on a.idactivo = terminados.idactivo
                    left join (select r.id, r.idactivo, r.fecha_calibracion
                          from reporte_calibracion r
                          where r.idestado = 27
                                and (r.fecha_calibracion >= \''.$date_start_c.'\'  
                                and r.fecha_calibracion <= \''.$date_end_c.'\' )) as pendientes on a.idactivo = pendientes.idactivo
                where (terminados.idactivo is not null or pendientes.idactivo is not null)
                group by estado_garantia                   
                ';
        $equipos = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($equipos as $equipo) {
            $i++;
            $data[$i][0] = $equipo->estado_garantia;
            $data[$i][1] = $equipo->terminados;     
            $data[$i][2] = $equipo->pendientes;     
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Calibración de equipos";//nombre de la p'agin;
        $dataContainer->siderbar_type ="risks";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="calibracion_rep";
        $dataContainer->report_name="Calibración de equipos";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.risks.6',compact('dataContainer'));      
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

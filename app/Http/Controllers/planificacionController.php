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

class planificacionController extends Controller
{
     public function p_1()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Cantidad de Reportes de Necesidad ingresados";//nombre de la p'agin;
        $dataContainer->siderbar_type ="planning";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="reportes_cn_ingresados_rep";
        $dataContainer->report_name="Cantidad de Reportes de Necesidad ingresados";
        $dataContainer->service=true;
        $dataContainer->group=false;
        $dataContainer->departament=true;
        
        return view('indicators.planning.1',compact('dataContainer'));
    }

    public function p_2()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Reportes de Priorización";//nombre de la p'agin;
        $dataContainer->siderbar_type ="planning";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="reportes_priorizacion_rep";
        $dataContainer->report_name="Reportes de Priorización";
        $dataContainer->service=true;
        $dataContainer->group=false;
        $dataContainer->departament=true;

        return view('indicators.planning.2',compact('dataContainer'));
    }

    public function p_3()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Cantidad de Precios Referenciales ingresados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "planning";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="precios_referenciales_ingresados_rep";
        $dataContainer->report_name="Cantidad de Precios Referenciales ingresados";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        

        return view('indicators.planning.3',compact('dataContainer'));
    }

    public function p_1_post(Request $request)
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

        $reportes_cn=null;

        $sql = 'select t.nombre as tipo_reporte, count(c.idreporte_cn) as cant_reportes
                from reporte_cn c 
                    join programacion_reporte_cn p on c.idprogramacion_reporte_cn = p.idprogramacion_reporte_cn
                    join tipo_reporte_cn t on p.idtipo_reporte_cn = t.idtipo_reporte_cn
                where ((p.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((p.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0))                     
                    and (c.created_at >= \''.$date_start_c.'\'  
                               and c.created_at <= \''.$date_end_c.'\' )
                group by p.idtipo_reporte_cn';
        $reportes_cn = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($reportes_cn as $reporte_cn) {
            $i++;
            $data[$i][0] = $reporte_cn->tipo_reporte;
            $data[$i][1] = $reporte_cn->cant_reportes;             
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Cantidad de Reportes de Necesidad ingresados";//nombre de la p'agin;
        $dataContainer->siderbar_type ="planning";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="reportes_cn_ingresados_rep";
        $dataContainer->report_name="Cantidad de Reportes de Necesidad ingresados";
        $dataContainer->service=true;
        $dataContainer->group=false;
        $dataContainer->departament=true;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.planning.1',compact('dataContainer'));

    }


    public function p_2_post(Request $request)
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

        $reportes_priorizacion=null;

        $sql = 'select "Reporte Priorización" as tipo_reporte, count(p.idreporte_priorizacion) as cant_reportes
                from reporte_priorizacion p 
                where ((p.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((p.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0))                     
                    and (p.created_at >= \''.$date_start_c.'\'  
                               and p.created_at <= \''.$date_end_c.'\' )';
        $reportes_priorizacion = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($reportes_priorizacion as $reporte_priorizacion) {
            $i++;
            $data[$i][0] = $reporte_priorizacion->tipo_reporte;
            $data[$i][1] = $reporte_priorizacion->cant_reportes;             
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Reportes de Priorización";//nombre de la p'agin;
        $dataContainer->siderbar_type ="planning";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="reportes_priorizacion_rep";
        $dataContainer->report_name="Reportes de Priorización";
        $dataContainer->service=true;
        $dataContainer->group=false;
        $dataContainer->departament=true;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.planning.2',compact('dataContainer'));     
    }



    public function p_3_post(Request $request)
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

        $cotizaciones=null;

        $sql = 'select nombre_equipo, count(idcotizacion) as cant_cotizaciones
                from cotizaciones 
                where (anho >= \''.$anhoInicio.'\'  and anho <= \''.$anhoFin.'\' )
                group by nombre_equipo
                order by nombre_equipo';
        $cotizaciones = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($cotizaciones as $cotizacion) {
            $i++;
            $data[$i][0] = $cotizacion->nombre_equipo;
            $data[$i][1] = $cotizacion->cant_cotizaciones;             
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Cantidad de Precios Referenciales ingresados";//nombre de la p'agin;
        $dataContainer->siderbar_type ="planning";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="precios_referenciales_ingresados_rep";
        $dataContainer->report_name="Cantidad de Precios Referenciales ingresados";
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=false;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.planning.3',compact('dataContainer'));     
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

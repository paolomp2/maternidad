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

class assetsController extends Controller
{

    public function a_1()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de motivo de baja de equipos";//nombre de la p'agin;
        $dataContainer->siderbar_type ="assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="motivo_baja_equipo_rep";
        $dataContainer->report_name="Indicador de Motivo de baja de Equipos";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;
        
        return view('indicators.assets.1',compact('dataContainer'));
    }

    public function a_2()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de bajas generadas";//nombre de la p'agin;
        $dataContainer->siderbar_type ="assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="bajas_generadas_rep";
        $dataContainer->report_name="Indicador de Bajas Generadas";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;

        return view('indicators.assets.2',compact('dataContainer'));
    }

    public function a_3()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de bajas atendidas";//nombre de la p'agin;
        $dataContainer->siderbar_type = "assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="bajas_atendidas_rep";
        $dataContainer->report_name="Indicador de Bajas Atendidas";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;
        

        return view('indicators.assets.3',compact('dataContainer'));
    }

    public function a_4()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de bajas pendientes";//nombre de la p'agin;
        $dataContainer->siderbar_type = "assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="bajas_pendientes_rep";
        $dataContainer->report_name="Indicador de Bajas Pendientes";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;

        return view('indicators.assets.4',compact('dataContainer'));
    }

    public function a_5()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de bajas no atendidas";//nombre de la p'agin;
        $dataContainer->siderbar_type = "assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="bajas_no_atendidas_rep";
        $dataContainer->report_name="Indicador de Bajas no Atendidas";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;

        return view('indicators.assets.5',compact('dataContainer'));
    }

    public function a_6()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Costo de mano de obra de baja no atendida";//nombre de la p'agin;
        $dataContainer->siderbar_type = "assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="costo_mano_de_obra_rep";
        $dataContainer->report_name="Costo de mano de obra de baja no atendida";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;

        return view('indicators.assets.6',compact('dataContainer'));
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
        $departamento= 0;
        $grupo = $request->search_grupo;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $bajas_equipos=null;

        $sql = 'select s.nombre as servicio,
                    if(motivo1.cant1 is null,\'-\',motivo1.cant1) as "motivo1", 
                    if(motivo2.cant2 is null,\'-\',motivo2.cant2) as "motivo2", 
                    if(motivo3.cant3 is null,\'-\',motivo3.cant3) as "motivo3", 
                    if(motivo4.cant4 is null,\'-\',motivo4.cant4) as "motivo4", 
                    if(motivo5.cant5 is null,\'-\',motivo5.cant5) as "motivo5"
                FROM servicios s 
                    left join activos a on s.idservicio = a.idservicio             
                    left join areas ar on ar.idarea = s.idarea
                    left join (select a.idservicio, count(a.idservicio) as cant1
                               from reporte_retiros r 
                                    join activos a on r.idactivo = a.idactivo 
                                    join motivo_retiros m on r.idmotivo_retiro = m.idmotivo_retiro
                               where r.idmotivo_retiro = 1
                               and (r.fecha_baja >= \''.$date_start_c.'\'  
                               and r.fecha_baja <= \''.$date_end_c.'\' )
                               GROUP BY a.idservicio) as motivo1 on motivo1.idservicio = s.idservicio
                    left join (select a.idservicio, count(a.idservicio) as cant2
                               from reporte_retiros r 
                                   join activos a on r.idactivo = a.idactivo 
                                   join motivo_retiros m on r.idmotivo_retiro = m.idmotivo_retiro
                               where r.idmotivo_retiro = 2      
                               and (r.fecha_baja >= \''.$date_start_c.'\'  
                               and r.fecha_baja <= \''.$date_end_c.'\')
                               group by a.idservicio) as motivo2 on motivo2.idservicio = a.idservicio
                    left join (select a.idservicio, count(a.idservicio) as cant3
                               from reporte_retiros r 
                                   join activos a on r.idactivo = a.idactivo 
                                   join motivo_retiros m on r.idmotivo_retiro = m.idmotivo_retiro
                               where r.idmotivo_retiro = 3         
                               and (r.fecha_baja >= \''.$date_start_c.'\'  
                               and r.fecha_baja <= \''.$date_end_c.'\')      
                               group by a.idservicio) as motivo3 on motivo3.idservicio = a.idservicio
                    left join (select a.idservicio, count(a.idservicio) as cant4
                               from reporte_retiros r 
                                   join activos a on r.idactivo = a.idactivo 
                                   join motivo_retiros m on r.idmotivo_retiro = m.idmotivo_retiro
                               where r.idmotivo_retiro = 4
                               and (r.fecha_baja >= \''.$date_start_c.'\'  
                               and r.fecha_baja <= \''.$date_end_c.'\' )
                               group by a.idservicio) as motivo4 on motivo4.idservicio = a.idservicio
                    left join (select a.idservicio, count(a.idservicio) as cant5
                               from reporte_retiros r 
                                   join activos a on r.idactivo = a.idactivo 
                                   join motivo_retiros m on r.idmotivo_retiro = m.idmotivo_retiro
                               where r.idmotivo_retiro = 5
                               and (r.fecha_baja >= \''.$date_start_c.'\'  
                               and r.fecha_baja <= \''.$date_end_c.'\' )
                               group by a.idservicio) as motivo5 on motivo5.idservicio = a.idservicio   
                where ((s.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((a.idgrupo = \''.$grupo.'\') or (\''.$grupo.'\' = 0))       
                    and ((ar.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0)) 
                group by s.idservicio';
        $bajas_equipos = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($bajas_equipos as $baja_motivo) {
            $i++;
            $data[$i][0] = $baja_motivo->servicio;
            $data[$i][1] = $baja_motivo->motivo1; 
            $data[$i][2] = $baja_motivo->motivo2; 
            $data[$i][3] = $baja_motivo->motivo3; 
            $data[$i][4] = $baja_motivo->motivo4; 
            $data[$i][5] = $baja_motivo->motivo5;             
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de Motivo de baja de Equipos";//nombre de la p'agin;
        $dataContainer->siderbar_type ="assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="motivo_baja_equipo_rep";
        $dataContainer->report_name="Indicador de Motivo de baja de Equipos";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.assets.1',compact('dataContainer'));

    }


    public function a_2_post(Request $request)
    {
       //INICIALIZACION DE VARIABLES
        $servicio=null;
        $departamento=null;
        $grupo=null;

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $servicio =$request->search_servicio;
        $departamento= 0;
        $grupo = $request->search_grupo;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $bajas_generadas=null;

        $sql = 'select s.nombre as servicio,
                    if(bajas_virtual.cant_baja_virtual is null,\'-\',bajas_virtual.cant_baja_virtual) as "bajas_virtual", 
                    if(bajas_definitiva.cant_baja_definitiva is null,\'-\',bajas_definitiva.cant_baja_definitiva) as "bajas_definitiva"
                FROM servicios s 
                    left join activos a on s.idservicio = a.idservicio             
                    left join areas ar on ar.idarea = s.idarea
                    left join (select a.idservicio, count(a.idservicio) as cant_baja_virtual
                               from reporte_retiros r 
                                    join activos a on r.idactivo = a.idactivo 
                               where (r.fecha_baja >= \''.$date_start_c.'\'  
                               and r.fecha_baja <= \''.$date_end_c.'\' )
                               GROUP BY a.idservicio) as bajas_virtual on bajas_virtual.idservicio = s.idservicio
                    left join (select a.idservicio, count(a.idservicio) as cant_baja_definitiva
                               from ot_retiros o
                                    join activos a on o.idactivo = a.idactivo 
                               where (o.fecha_programacion >= \''.$date_start_c.'\'  
                               and o.fecha_programacion <= \''.$date_end_c.'\' )
                               GROUP BY a.idservicio) as bajas_definitiva on bajas_definitiva.idservicio = s.idservicio
                where ((s.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((a.idgrupo = \''.$grupo.'\') or (\''.$grupo.'\' = 0))       
                    and ((ar.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0)) 
                group by s.idservicio';
        $bajas_generadas = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($bajas_generadas as $baja_generada) {
            $i++;
            $data[$i][0] = $baja_generada->servicio;
            $data[$i][1] = $baja_generada->bajas_virtual; 
            $data[$i][2] = $baja_generada->bajas_definitiva;           
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de Bajas Generadas";//nombre de la p'agin;
        $dataContainer->siderbar_type ="assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="bajas_generadas_rep";
        $dataContainer->report_name="Indicador de Bajas Generadas";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.assets.2',compact('dataContainer'));       
    }



    public function a_3_post(Request $request)
    {
        
        //INICIALIZACION DE VARIABLES
        $servicio=null;
        $departamento=null;
        $grupo=null;

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $servicio =$request->search_servicio;
        $departamento= 0;
        $grupo = $request->search_grupo;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $bajas_atendidas=null;

        $sql = 'select s.nombre as servicio,
                    if(bajas_atendida.cant_baja_atendida is null,\'-\',bajas_atendida.cant_baja_atendida) as "bajas_atendida"
                FROM servicios s 
                    left join activos a on s.idservicio = a.idservicio             
                    left join areas ar on ar.idarea = s.idarea
                    left join (select a.idservicio, count(a.idservicio) as cant_baja_atendida
                               from ot_retiros o
                                    join activos a on o.idactivo = a.idactivo 
                               where o.idestado_final = 8
                               and (o.fecha_conformidad >= \''.$date_start_c.'\'  
                               and o.fecha_conformidad <= \''.$date_end_c.'\' )
                               GROUP BY a.idservicio) as bajas_atendida on bajas_atendida.idservicio = s.idservicio
                where ((s.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((a.idgrupo = \''.$grupo.'\') or (\''.$grupo.'\' = 0))       
                    and ((ar.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0)) 
                group by s.idservicio';
        $bajas_atendidas = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($bajas_atendidas as $baja_atendida) {
            $i++;
            $data[$i][0] = $baja_atendida->servicio;
            $data[$i][1] = $baja_atendida->bajas_atendida;           
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de Bajas Atendidas";//nombre de la p'agin;
        $dataContainer->siderbar_type ="assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="bajas_atendidas_rep";
        $dataContainer->report_name="Indicador de Bajas Atendidas";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.assets.3',compact('dataContainer'));       
    }

    public function a_4_post(Request $request)
    {
        //INICIALIZACION DE VARIABLES
        $servicio=null;
        $departamento=null;
        $grupo=null;

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $servicio =$request->search_servicio;
        $departamento= 0;
        $grupo = $request->search_grupo;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $bajas_pendientes=null;

        $sql = 'select s.nombre as servicio, count(pendientes.idservicio) as cant_pendientes
                from servicios s 
                    left join areas ar on ar.idarea = s.idarea
                    left join (SELECT a.idactivo, a.idservicio, a.idgrupo
                                from activos a 
                                    left join reporte_retiros r on a.idactivo = r.idactivo
                                where (CURRENT_DATE() >= Date_add(a.anho_adquisicion, INTERVAL a.vida_util MONTH)) 
                                       and r.idactivo is null) as pendientes on pendientes.idservicio = s.idservicio
                where ((s.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((pendientes.idgrupo = \''.$grupo.'\') or (\''.$grupo.'\' = 0))       
                    and ((ar.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0))
                group by S.nombre';

        $bajas_pendientes = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($bajas_pendientes as $baja_pendiente) {
            $i++;
            $data[$i][0] = $baja_pendiente->servicio;
            $data[$i][1] = $baja_pendiente->cant_pendientes;           
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de Bajas Pendientes";//nombre de la p'agin;
        $dataContainer->siderbar_type ="assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="bajas_pendientes_rep";
        $dataContainer->report_name="Indicador de Bajas Pendientes";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.assets.4',compact('dataContainer'));        
    }

    public function a_5_post(Request $request)
    {
        //INICIALIZACION DE VARIABLES
        $servicio=null;
        $departamento=null;
        $grupo=null;

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $servicio =$request->search_servicio;
        $departamento= 0;
        $grupo = $request->search_grupo;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $bajas_no_atendidas=null;

        $sql = 'select s.nombre as servicio,
                    if(baja_no_atendida_ED.cant_baja_no_atendida_ED is null,\'-\',baja_no_atendida_ED.cant_baja_no_atendida_ED) as "motivo1",
                    if(baja_no_atendida_NUS.cant_baja_no_atendida_NUS is null,\'-\',baja_no_atendida_NUS.cant_baja_no_atendida_NUS) as "motivo2",
                    if(baja_no_atendida_IR.cant_baja_no_atendida_IR is null,\'-\',baja_no_atendida_IR.cant_baja_no_atendida_IR) as "motivo3",
                    if(baja_no_atendida_ME.cant_baja_no_atendida_ME is null,\'-\',baja_no_atendida_ME.cant_baja_no_atendida_ME) as "motivo4",
                    if(baja_no_atendida_RM.cant_baja_no_atendida_RM is null,\'-\',baja_no_atendida_RM.cant_baja_no_atendida_RM) as "motivo5"
                FROM servicios s 
                    left join activos a on s.idservicio = a.idservicio             
                    left join areas ar on ar.idarea = s.idarea
                    left join (select a.idservicio, count(a.idservicio) as cant_baja_no_atendida_ED
                               from ot_retiros o
                                    join activos a on o.idactivo = a.idactivo 
                               where o.idestado_ot = 10
                               and (o.fecha_programacion >= \''.$date_start_c.'\'  
                               and o.fecha_programacion <= \''.$date_end_c.'\' )
                               GROUP BY a.idservicio) as baja_no_atendida_ED on baja_no_atendida_ED.idservicio = s.idservicio
                    left join (select a.idservicio, count(a.idservicio) as cant_baja_no_atendida_NUS
                               from ot_retiros o
                                    join activos a on o.idactivo = a.idactivo 
                               where o.idestado_ot = 11
                               and (o.fecha_programacion >= \''.$date_start_c.'\'  
                               and o.fecha_programacion <= \''.$date_end_c.'\' )
                               GROUP BY a.idservicio) as baja_no_atendida_NUS on baja_no_atendida_NUS.idservicio = s.idservicio
                    left join (select a.idservicio, count(a.idservicio) as cant_baja_no_atendida_IR
                               from ot_retiros o
                                    join activos a on o.idactivo = a.idactivo 
                               where o.idestado_ot = 12
                               and (o.fecha_programacion >= \''.$date_start_c.'\'  
                               and o.fecha_programacion <= \''.$date_end_c.'\' )
                               GROUP BY a.idservicio) as baja_no_atendida_IR on baja_no_atendida_IR.idservicio = s.idservicio
                    left join (select a.idservicio, count(a.idservicio) as cant_baja_no_atendida_ME
                               from ot_retiros o
                                    join activos a on o.idactivo = a.idactivo 
                               where o.idestado_ot = 13
                               and (o.fecha_programacion >= \''.$date_start_c.'\'  
                               and o.fecha_programacion <= \''.$date_end_c.'\' )
                               GROUP BY a.idservicio) as baja_no_atendida_ME on baja_no_atendida_ME.idservicio = s.idservicio
                    left join (select a.idservicio, count(a.idservicio) as cant_baja_no_atendida_RM
                               from ot_retiros o
                                    join activos a on o.idactivo = a.idactivo 
                               where o.idestado_ot = 25
                               and (o.fecha_programacion >= \''.$date_start_c.'\'  
                               and o.fecha_programacion <= \''.$date_end_c.'\' )
                               GROUP BY a.idservicio) as baja_no_atendida_RM on baja_no_atendida_RM.idservicio = s.idservicio
                where ((s.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((a.idgrupo = \''.$grupo.'\') or (\''.$grupo.'\' = 0))       
                    and ((ar.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0)) 
                group by s.idservicio';
        $bajas_no_atendidas = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($bajas_no_atendidas as $baja_no_atendida) {
            $i++;
            $data[$i][0] = $baja_no_atendida->servicio;
            $data[$i][1] = $baja_no_atendida->motivo1;           
            $data[$i][2] = $baja_no_atendida->motivo2;           
            $data[$i][3] = $baja_no_atendida->motivo3;           
            $data[$i][4] = $baja_no_atendida->motivo4;           
            $data[$i][5] = $baja_no_atendida->motivo5;           
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de Bajas No Atendidad";//nombre de la p'agin;
        $dataContainer->siderbar_type ="assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="bajas__no_atendidas_rep";
        $dataContainer->report_name="Indicador de Bajas No Atendidas";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.assets.5',compact('dataContainer'));   
    }

    public function a_6_post(Request $request)
    {
        //INICIALIZACION DE VARIABLES
        $servicio=null;
        $departamento=null;
        $grupo=null;

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $servicio =$request->search_servicio;
        $departamento= 0;
        $grupo = $request->search_grupo;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $costo_bajas_atendidas=null;

        $sql = 'select s.nombre as servicio,
                    if(costo_bajas_atendidas.cant_baja_atendida is null,\'-\',costo_bajas_atendidas.cant_baja_atendida) as "costo_bajas_atendidas"
                FROM servicios s 
                    left join activos a on s.idservicio = a.idservicio             
                    left join areas ar on ar.idarea = s.idarea
                    left join (select a.idservicio, sum(o.costo_total_personal) as cant_baja_atendida
                               from ot_retiros o
                                    join activos a on o.idactivo = a.idactivo 
                               where o.idestado_final = 8
                               and (o.fecha_conformidad >= \''.$date_start_c.'\'  
                               and o.fecha_conformidad <= \''.$date_end_c.'\' )
                               GROUP BY a.idservicio) as costo_bajas_atendidas on costo_bajas_atendidas.idservicio = s.idservicio
                where ((s.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                    and ((a.idgrupo = \''.$grupo.'\') or (\''.$grupo.'\' = 0))       
                    and ((ar.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0)) 
                group by s.idservicio';
        $costo_bajas_atendidas = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($costo_bajas_atendidas as $costo_baja_atendida) {
            $i++;
            $data[$i][0] = $costo_baja_atendida->servicio;
            $data[$i][1] = $costo_baja_atendida->costo_bajas_atendidas;           
        }
                        
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Costo de Mano de Obra de Baja Atendida";//nombre de la p'agin;
        $dataContainer->siderbar_type ="assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="costo_mano_de_obra_rep";
        $dataContainer->report_name="Costo de Mano de Obra de Baja Atendida";
        $dataContainer->service=true;
        $dataContainer->group=true;
        $dataContainer->departament=true;
        $dataContainer->data_table = $data_table;
        
        return view('indicators.assets.6',compact('dataContainer'));   
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

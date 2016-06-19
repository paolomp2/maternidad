<?php

namespace Maternidad\Http\Controllers;

use Illuminate\Http\Request;

use Maternidad\Http\Requests;
use Maternidad\Http\Controllers\Controller;
use Validator;
use Maternidad\OtCorrectivo;
use Maternidad\OtPreventivo;
use Maternidad\Activo;
use Carbon\Carbon;
use DB;
use Maternidad\Http\Controllers\dataContainer;

class rrhhController extends Controller
{

	public function r_1()
    {   
    	$dataContainer = new dataContainer;
        $dataContainer->page_name = "Diseño de Procesos ";//nombre de la p'agin;
        $dataContainer->siderbar_type ="rrhh";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="disenho_de_procesos_rep";
        $dataContainer->report_name="Diseño de Procesos";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }

    public function r_2()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Elaboración de Guías ";//nombre de la p'agin;
        $dataContainer->siderbar_type ="rrhh";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="elaboracion_de_guias_rep";
        $dataContainer->report_name="Elaboración de Guías";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }


    public function r_3()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Investigación";//nombre de la p'agin;
        $dataContainer->siderbar_type ="rrhh";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="investigacion_rep";
        $dataContainer->report_name="Investigación";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }

    public function r_4()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Proyectos";//nombre de la p'agin;
        $dataContainer->siderbar_type ="rrhh";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="proyectos_rep";
        $dataContainer->report_name="Proyectos";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }

    public function r_5()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Transferencia de TTSS";//nombre de la p'agin;
        $dataContainer->siderbar_type ="rrhh";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="transferencia_de_ttss_rep";
        $dataContainer->report_name="Transferencia de TTSS";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }

    public function r_6()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Lista de Capacitación";//nombre de la p'agin;
        $dataContainer->siderbar_type ="rrhh";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="lista_de_capacitacion_rep";
        $dataContainer->report_name="Lista de Capacitación";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }

    public function r_7()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicadores de Gestión";//nombre de la p'agin;
        $dataContainer->siderbar_type ="rrhh";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="indicadores_de_gestion_rep";
        $dataContainer->report_name="Indicadores de Gestión";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }

    public function r_8()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Gestión Logística";//nombre de la p'agin;
        $dataContainer->siderbar_type ="rrhh";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="gestion_logistica_rep";
        $dataContainer->report_name="Gestión Logística";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }


    public function r_1_post(Request $request)
    {

        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();

        
            $reportes= DB::table('reportes_desarrollo')
                        ->select(array('reportes_desarrollo.id_categoria as id', 
                            DB::raw('COUNT(reportes_desarrollo.id_categoria) as numReporte')))
                        ->where('reportes_desarrollo.fecha_ini','>=', $date_start_c)
                        ->where('reportes_desarrollo.fecha_ini','<=', $date_end_c)
                        ->groupby('reportes_desarrollo.id_categoria')
                        ->get();

         
        

        $categoria=DB::table('proyecto_categorias')
                        ->get();

        $data=array();

        $i=0;
        foreach ($categoria as $cat) {
            $data[$i][1]=$cat->nombre;
            $data[$i][2]=0;
            foreach ($reportes as $rep) {
                if ($cat->id==$rep->{'id'}) {
                $data[$i][2]=$rep->{'numReporte'};
                }
            
            }
            
            $i++;
  
        }


        $data_table=$data;
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Diseño de Procesos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "rrhh";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="disenho_de_procesos_rep";
        $dataContainer->report_name="Diseño de Procesos";
        $dataContainer->table=true;
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;
        $dataContainer->chart_title='Diseño de Procesos';
        $dataContainer->data_table=$data_table;
        
        return view('indicators.rrhh.1',compact('dataContainer'));

    }


    public function r_2_post(Request $request)
    {

        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();


        //programacion de guia practica
        $guiaP= DB::table('programacion_guia_gpc')
                ->select(array('programacion_guia_gpc.tipo as tipo',
                    DB::raw('COUNT(programacion_guia_gpc.tipo) as guia'),
                    'estado_programacion_reportes.nombre as estado'
                    ))
                ->leftJoin('estado_programacion_reportes', function($join){
                    $join->on('estado_programacion_reportes.idestado_programacion_reportes','=','programacion_guia_gpc.id_estado');
                })
                ->where('programacion_guia_gpc.fecha','>=', $date_start_c)
                ->where('programacion_guia_gpc.fecha','<=', $date_end_c)
                ->groupby('programacion_guia_gpc.tipo','estado_programacion_reportes.nombre')
                ->get();

        
        
        //programacion de guia tecnologica

        $guiaT= DB::table('programacion_guia_ts')
               -> select(array('subtipo_documentosinf.nombre as tipo',
                DB::raw('COUNT(programacion_guia_ts.id_tipo) as guia'),
                'estado_programacion_reportes.nombre as estado'
                ))
               ->leftJoin('subtipo_documentosinf',function($join)
               {
                $join->on('programacion_guia_ts.id_tipo','=','subtipo_documentosinf.id');
               })
               ->leftJoin('estado_programacion_reportes', function($join)
               {
                $join->on('estado_programacion_reportes.idestado_programacion_reportes','=','programacion_guia_ts.id_estado');
               })
               ->where('programacion_guia_ts.fecha','>=', $date_start_c)
                ->where('programacion_guia_ts.fecha','<=', $date_end_c)
                ->groupby('programacion_guia_ts.id_tipo', 'estado_programacion_reportes.nombre')
               ->get();


        //programacion de ETES

        $etes = DB::table('programacion_reporte_etes')
               -> select(array('tipo_reporte_etes.nombre as tipo',
                DB::raw('COUNT(programacion_reporte_etes.idtipo_reporte_ETES) as guia'),
                'estado_programacion_reportes.nombre as estado'
                ))
               ->leftJoin('tipo_reporte_etes',function($join)
               {
                $join->on('programacion_reporte_etes.idtipo_reporte_ETES','=','tipo_reporte_etes.idtipo_reporte_ETES');
               })
               ->leftJoin('estado_programacion_reportes', function($join)
               {
                $join->on('estado_programacion_reportes.idestado_programacion_reportes','=','programacion_reporte_etes.idestado_programacion_reportes');
               })
               ->where('programacion_reporte_etes.fecha','>=', $date_start_c)
                ->where('programacion_reporte_etes.fecha','<=', $date_end_c)
                ->groupby('programacion_reporte_etes.idtipo_reporte_ETES', 'estado_programacion_reportes.nombre')
               ->get();

        echo dd($etes);

    }


    public function r_3_post(Request $request)
    {
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();

        $invest= DB::table('reporte_investigacion')
                ->select(array('reporte_investigacion.nombre as tipo',
                    DB::raw('COUNT(reporte_investigacion.nombre) as nReporte'),
                    DB::raw('SUM(reporte_investigacion.costo) as costoTotal'),
                    DB::raw('SUM(reporte_investigacion.duracion) as duracion')))
                ->where('reporte_investigacion.fecha','>=', $date_start_c)
                ->where('reporte_investigacion.fecha','<=', $date_end_c)
                ->groupby('reporte_investigacion.nombre')
                ->get();
        

        if($invest!=null){

            $data=array();
            $i=0;

            foreach ($invest as $inv) {
                $data[$i][1]=$inv->{'tipo'};
                $data[$i][2]=$inv->{'nReporte'};
                $data[$i][3]=$inv->{'costoTotal'};
                $data[$i][4]=$inv->{'duracion'};
                $i++;
            }


            $data_table=$data;
            $dataContainer = new dataContainer;
            $dataContainer->page_name = "Investigación";//nombre de la p'agin;
            $dataContainer->siderbar_type = "rrhh";//Tipo de siderbar que se requere desplega;
            $dataContainer->method="post";
            $dataContainer->url_post="investigacion_rep";
            $dataContainer->report_name="Investigación";
            $dataContainer->table=true;
            $dataContainer->serial_number=false;
            $dataContainer->patrimonial_code=false;
            $dataContainer->chart_title='Investigación';
            $dataContainer->data_table=$data_table;
        
             return view('indicators.rrhh.2',compact('dataContainer'));        
    
        }   
    }



    //reporte 4
    public function r_4_post(Request $request)
    {
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();        


        //id categoria 4 -> proyectos de investigacion-> tabla proyectos

        $invest= DB::table('proyectos')
                ->select(array('proyectos.nombre as categoria',
                    DB::raw('COUNT(proyectos.nombre) as nProyectos'),
                    DB::raw('SUM(presupuestos.monto_restante) as presupuesto'),
                    'proyectos.descripcion as estado'))
                 ->leftJoin('presupuestos', function($join){
                    $join->on('proyectos.id_presupuesto','=','presupuestos.id');
                 })
                 ->where('proyectos.fecha_ini','>=', $date_start_c)
                 ->where('proyectos.fecha_ini','<=', $date_end_c)
                 ->groupby('proyectos.nombre')
                 ->get();

        if($invest!=null){

            $data=array();
            $i=0;

            foreach ($invest as $inv) {
                $data[$i][1]=$inv->{'categoria'};
                $data[$i][2]=$inv->{'nProyectos'};
                $data[$i][3]=$inv->{'presupuesto'};
                $data[$i][4]=$inv->{'estado'};
                $i++;
            }


            $data_table=$data;
            $dataContainer = new dataContainer;
            $dataContainer->page_name = "Proyectos";//nombre de la p'agin;
            $dataContainer->siderbar_type = "rrhh";//Tipo de siderbar que se requere desplega;
            $dataContainer->method="post";
            $dataContainer->url_post="proyectos_rep";
            $dataContainer->report_name="Proyectos";
            $dataContainer->table=true;
            $dataContainer->serial_number=false;
            $dataContainer->patrimonial_code=false;
            $dataContainer->chart_title='Proyectos';
            $dataContainer->data_table=$data_table;
        
             return view('indicators.rrhh.3',compact('dataContainer'));        
    
        }   
    }


    //reporte 5
    public function r_5_post(Request $request)
    {
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();        
        
        //reporte_financiamiento
        $reporte = DB::table('reporte_financiamiento')
                   ->select(array('reporte_financiamiento.id_categoria',
                    DB::raw('COUNT(reporte_financiamiento.id_categoria) as nReporte'),
                    'reporte_financiamiento.duracion as duracion',
                    'proyecto_categorias.nombre as categoria'))
                   -> leftJoin('proyecto_categorias', function($join){
                     $join->on('reporte_financiamiento.id_categoria','=','proyecto_categorias.id');
                   })
                   ->where('reporte_financiamiento.fecha','>=', $date_start_c)
                   ->where('reporte_financiamiento.fecha','<=', $date_end_c)
                   ->groupby('reporte_financiamiento.id_categoria')
                   ->get();

         
        if($reporte!=null){

            $data=array();
            $i=0;

            foreach ($reporte as $inv) {
                $data[$i][1]=$inv->{'nReporte'};
                $data[$i][2]=round($inv->{'duracion'}/30, 2);
                $data[$i][3]=$inv->{'categoria'};
                
                $i++;
            }


            $data_table=$data;
            $dataContainer = new dataContainer;
            $dataContainer->page_name = "Transferencia de TTS";//nombre de la p'agin;
            $dataContainer->siderbar_type = "rrhh";//Tipo de siderbar que se requere desplega;
            $dataContainer->method="post";
            $dataContainer->url_post="transferencia_de_ttss_rep";
            $dataContainer->report_name="Transferencia de TTS";
            $dataContainer->table=true;
            $dataContainer->serial_number=false;
            $dataContainer->patrimonial_code=false;
            $dataContainer->chart_title='Transferencia de TTS';
            $dataContainer->data_table=$data_table;
        
             return view('indicators.rrhh.4',compact('dataContainer'));        
    
        }   





    }

    //reporte 6
    public function r_6_post(Request $request)
    {
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();   

        $capacitacion= DB::table('reporte_investigacionxtipo_capacitacion')
                       ->select(array('reporte_investigacionxtipo_capacitacion.id as codigo',
                        'tipo_capacitacion_riesgos.nombre as tipo',
                        'reporte_investigacionxtipo_capacitacion.numero_sesiones as sesiones',
                        'reporte_investigacionxtipo_capacitacion.duracion as duracion',
                        'reporte_investigacionxtipo_capacitacion.numParticipantes as numParticipantes',
                        'reporte_investigacionxtipo_capacitacion.categoria as categoria',
                        'reporte_investigacionxtipo_capacitacion.equipos as equipos',
                        ))
                       ->leftJoin('tipo_capacitacion_riesgos', function($join){
                         $join->on('tipo_capacitacion_riesgos.id','=','reporte_investigacionxtipo_capacitacion.idtipo');
                       })
                        ->where('reporte_investigacionxtipo_capacitacion.fecha','>=', $date_start_c)
                        ->where('reporte_investigacionxtipo_capacitacion.fecha','<=', $date_end_c)
                        ->get();

        

         if($capacitacion!=null){

            $data=array();
            $i=0;

            foreach ($capacitacion as $cap) {
                $data[$i][1]=$cap->{'codigo'};
                $data[$i][2]=$cap->{'tipo'};
                $data[$i][3]=$cap->{'sesiones'};
                $data[$i][4]=$cap->{'duracion'};
                $data[$i][5]=$cap->{'numParticipantes'};
                $data[$i][6]=$cap->{'categoria'};
                $data[$i][7]=$cap->{'equipos'};

                
                $i++;
            }


            $data_table=$data;
            $dataContainer = new dataContainer;
            $dataContainer->page_name = "Lista de Capacitación";//nombre de la p'agin;
            $dataContainer->siderbar_type = "rrhh";//Tipo de siderbar que se requere desplega;
            $dataContainer->method="post";
            $dataContainer->url_post="lista_de_capacitacion_rep";
            $dataContainer->report_name="Lista de Capacitación";
            $dataContainer->table=true;
            $dataContainer->serial_number=false;
            $dataContainer->patrimonial_code=false;
            $dataContainer->chart_title='Lista de Capacitación';
            $dataContainer->data_table=$data_table;
        
             return view('indicators.rrhh.5',compact('dataContainer'));        
    
        }   
    }

    //reporte 7
    public function r_7_post(Request $request)
    {

    }

    //reporte 8
    public function r_8_post(Request $request)
    {

    }
}
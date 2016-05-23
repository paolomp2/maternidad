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
                    from reporte_retiros r 
                        join activos a on r.idactivo = a.idactivo
                        join servicios s on a.idservicio = s.idservicio
                        join areas ar on ar.idarea = s.idarea
                        left join (select a.idservicio, count(a.idservicio) as cant1
                               from reporte_retiros r 
                                join activos a on r.idactivo = a.idactivo 
                                join motivo_retiros m on r.idmotivo_retiro = m.idmotivo_retiro
                               where r.idmotivo_retiro = 1
                               and r.fecha_baja >= \''.$date_start_c.'\'
                               and r.fecha_baja <= \''.$date_end_c.'\'
                               group by a.idservicio) as motivo1 on motivo1.idservicio = a.idservicio
                        left join (select a.idservicio, count(a.idservicio) as cant2
                               from reporte_retiros r 
                                join activos a on r.idactivo = a.idactivo 
                                join motivo_retiros m on r.idmotivo_retiro = m.idmotivo_retiro
                               where r.idmotivo_retiro = 2
                               and r.fecha_baja >= \''.$date_start_c.'\'
                               and r.fecha_baja <= \''.$date_end_c.'\'                             
                               group by a.idservicio) as motivo2 on motivo2.idservicio = a.idservicio
                        left join (select a.idservicio, count(a.idservicio) as cant3
                               from reporte_retiros r 
                                join activos a on r.idactivo = a.idactivo 
                                join motivo_retiros m on r.idmotivo_retiro = m.idmotivo_retiro
                               where r.idmotivo_retiro = 3
                               and r.fecha_baja >= \''.$date_start_c.'\'
                               and r.fecha_baja <= \''.$date_end_c.'\'                           
                               group by a.idservicio) as motivo3 on motivo3.idservicio = a.idservicio
                        left join (select a.idservicio, count(a.idservicio) as cant4
                               from reporte_retiros r 
                                join activos a on r.idactivo = a.idactivo 
                                join motivo_retiros m on r.idmotivo_retiro = m.idmotivo_retiro
                               where r.idmotivo_retiro = 4
                               and r.fecha_baja >= \''.$date_start_c.'\'
                               and r.fecha_baja <= \''.$date_end_c.'\'
                               group by a.idservicio) as motivo4 on motivo4.idservicio = a.idservicio
                        left join (select a.idservicio, count(a.idservicio) as cant5
                               from reporte_retiros r 
                                join activos a on r.idactivo = a.idactivo 
                                join motivo_retiros m on r.idmotivo_retiro = m.idmotivo_retiro
                               where r.idmotivo_retiro = 5
                               and r.fecha_baja >= \''.$date_start_c.'\'
                               and r.fecha_baja <= \''.$date_end_c.'\'
                               group by a.idservicio) as motivo5 on motivo5.idservicio = a.idservicio
                    where ((a.idservicio = \''.$servicio.'\') or (\''.$servicio.'\' = 0))
                        and ((a.idgrupo = \''.$grupo.'\') or (\''.$grupo.'\' = 0))     
                        and ((ar.idarea = \''.$departamento.'\') or (\''.$departamento.'\' = 0))
                        and r.fecha_baja >= \''.$date_start_c.'\'
                        and r.fecha_baja <= \''.$date_end_c.'\'
                    group by a.idservicio';
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


    public function e_2_post(Request $request)
    {
       /*Validator section*/
         $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('disponibilidad')
                        ->withErrors($validator)
                        ->withInput();
        }

        //INICIALIZACION DE VARIABLES
        $codPatrimonio=null;
        $numSerie=null;

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $servicio = $request->search_servicio; //idservicio
        echo $servicio;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $otCorrectivos=null;
        $otPreventivos=null;

        

        if($servicio!=0){

            $label[0]=Servicio::where('idservicio','=',$servicio)->first()->nombre;
                
                 $otCorrectivos = DB::table('ot_correctivos')
                                     ->select(array(
                                        DB::raw('activos.idgrupo as Grupo'), 
                                        DB::raw('SUM(ot_correctivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(activos.idactivo) as Activo')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_correctivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.idservicio','=',$servicio)
                                        ->groupby('Grupo')
                                        ->orderBy('Grupo') 
                                        ->get();


                $otPreventivos = DB::table('ot_preventivos')
                                     ->select(array(
                                        DB::raw('activos.idgrupo as Grupo'), 
                                        DB::raw('SUM(ot_preventivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(activos.idactivo) as Activo')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_preventivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.idservicio','=',$servicio)
                                        ->groupby('Grupo')
                                        ->orderBy('Grupo') 
                                        ->get();


        }
        else{
            $label[0]="TODOS LOS SERVICIOS";
                
                $otCorrectivos = DB::table('ot_correctivos')
                                     ->select(array(
                                        DB::raw('activos.idgrupo as Grupo'), 
                                        DB::raw('SUM(ot_correctivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(activos.idactivo) as Activo')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_correctivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->groupby('Grupo')
                                        ->orderBy('Grupo') 
                                        ->get();


                $otPreventivos = DB::table('ot_preventivos')
                                     ->select(array(
                                        DB::raw('activos.idgrupo as Grupo'), 
                                        DB::raw('SUM(ot_preventivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(activos.idactivo) as Activo')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_preventivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->groupby('Grupo')
                                        ->orderBy('Grupo') 
                                        ->get();

        }      
       //echo dd($otCorrectivos);

        //PREPARACION DE ESTRUCTURA DE DATOS 
        $data_chart['year_beg']=$anhoInicio;
        $data_chart['year_end']=$anhoFin;
        $data_chart['month_beg']=$mesInicio;
        $data_chart['month_end']=$mesFin;
        
 
        $data_chart['labels']=json_encode($label);

        

        $numeroDiasTotales=0;
         while($date_start_c<$date_end_c)
        {   
            $end_current_month = $date_start_c->copy()->endOfMonth();
            $numeroDiasTotales=$numeroDiasTotales+$end_current_month->day;
            $date_start_c->addMonth();
        }
        
        $numGroup=0;
        while($numGroup<4)
        {   
            $numGroup++;

            //INICIALIZACION   
            //Disponibilidad Total
            $data_chart['data']['percentage'][$numGroup][0]=0;
            //Número de equipos
            $data_chart['data']['cant'][$numGroup][0]=0;
            $TiempoTotal=0;
            foreach ($otCorrectivos as $oc) {
                if($oc->{'Grupo'}==$numGroup){
                    $TiempoTotal=$TiempoTotal+($oc->{'Tiempo'})/(60*24);
                    $data_chart['data']['cant'][$numGroup][0]= $data_chart['data']['cant'][$numGroup][0]+ $oc->{'Activo'};
                    $data_chart['data']['percentage'][$numGroup][0]= 100*($TiempoTotal/$numeroDiasTotales)/($data_chart['data']['cant'][$numGroup][0]);
                     
                }
            }

            foreach ($otPreventivos as $op) {
                if($op->{'Grupo'}==$numGroup){
                    $TiempoTotal=$TiempoTotal+($op->{'Tiempo'})/(60*24);
                    $data_chart['data']['cant'][$numGroup][0]= $data_chart['data']['cant'][$numGroup][0]+ $op->{'Activo'};
                    $data_chart['data']['percentage'][$numGroup][0]= 100* ($TiempoTotal/$numeroDiasTotales)/($data_chart['data']['cant'][$numGroup][0]);

                }
            }


            
        }
        


        $data_chart['num_months']=$numGroup;
        
      //  echo dd($data_chart);

        $data_chart['data']=json_encode($data_chart['data']);

    
        
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de ejecución";//nombre de la p'agin;
        $dataContainer->siderbar_type = "assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="disponibilidad_total_rep";
        $dataContainer->report_name="Indicador de Disponibilidad Total";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;
        $dataContainer->chart=true;
        $dataContainer->chart_model='assets.time.1';
        $dataContainer->chart_title='Disponibilidad Total';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.assets.10',compact('dataContainer'));        
    }



    public function e_3_post(Request $request)
    {
        
        /*Validator section*/
         $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('disponibilidad')
                        ->withErrors($validator)
                        ->withInput();
        }

        //INICIALIZACION DE VARIABLES
        $codPatrimonio=null;
        $numSerie=null;

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $codPatrimonio =$request->search_codigo_patrimonial;
        $numSerie= $request->search_numero_serie;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $otCorrectivos=null;
        $otPreventivos=null;

        //$codigoPatrimonial="532269990015";
        if($codPatrimonio!=null){
            $label[0]=$codPatrimonio;
                 $otCorrectivos = DB::table('ot_correctivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_correctivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_correctivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ot_correctivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(ot_correctivos.idot_correctivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_correctivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.codigo_patrimonial','=',$codPatrimonio)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();


                $otPreventivos = DB::table('ot_preventivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_preventivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_preventivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ot_preventivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(ot_preventivos.idot_preventivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_preventivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.codigo_patrimonial','=',$codPatrimonio)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();
        }
        else{
            $label[0]=$numSerie;
                     $otCorrectivos = DB::table('ot_correctivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_correctivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_correctivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ot_correctivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(ot_correctivos.idot_correctivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_correctivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.numero_serie','=',$numSerie)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();


                $otPreventivos = DB::table('ot_preventivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_preventivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_preventivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ot_preventivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(ot_preventivos.idot_preventivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_preventivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.numero_serie','=',$numSerie)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();

        }      
       //echo dd($otCorrectivos);

        //PREPARACION DE ESTRUCTURA DE DATOS 
        $data_chart['year_beg']=$anhoInicio;
        $data_chart['year_end']=$anhoFin;
        $data_chart['month_beg']=$mesInicio;
        $data_chart['month_end']=$mesFin;
        
        /*if($anhoFin==$anhoInicio){
            $data_chart['num_months']=$mesFin-$mesInicio+1;
        }
        else{
            if($anhoFin-$anhoInicio==1){
                $data_chart['num_months']=13-$mesInicio+$mesFin;
            }else{
               $veces=$anhoFin-$anhoInicio+1; 
               $data_chart['num_months'] =12*$veces + 13-$mesInicio+$mesFin;
            }
        }*/

        
        $data_chart['labels']=json_encode($label);
        $numeroMes=0;
        while($date_start_c<$date_end_c)
        {   
            $numeroMes++;
            $mesTemp=$date_start_c->month;
            $anhoTemp=$date_start_c->year;

            $end_current_month = $date_start_c->copy()->endOfMonth();
            //cantidad de dias de mes
           
            //INICIALIZACION   
            $data_chart['data']['percentage'][$numeroMes][0]=100;
            $data_chart['data']['hours'][$numeroMes][0]=($end_current_month->day)*24;

            foreach ($otCorrectivos as $oc) {
                if(($mesTemp==$oc->{'Mes'}) && ($anhoTemp==$oc->{'Ahno'})){
                    $data_chart['data']['hours'][$numeroMes][0]=$data_chart['data']['hours'][$numeroMes][0]- ($oc->{'Tiempo'})/60;                    
                    $data_chart['data']['percentage'][$numeroMes][0]=$data_chart['data']['percentage'][$numeroMes][0]- $data_chart['data']['hours'][$numeroMes][0]*100/($end_current_month->day*24);
                }
            }

            foreach ($otPreventivos as $op) {
                if(($mesTemp==$op->{'Mes'}) && ($anhoTemp==$op->{'Ahno'})){
                    $data_chart['data']['hours'][$numeroMes][0]=$data_chart['data']['hours'][$numeroMes][0]+($op->{'Tiempo'})/60;                    
                    $data_chart['data']['percentage'][$numeroMes][0]= $data_chart['data']['percentage'][$numeroMes][0]-$data_chart['data']['hours'][$numeroMes][0]*100/($end_current_month->day*24);
                }
            }


            $date_start_c->addMonth();
        }
        

        $data_chart['num_months']=$numeroMes;
        

        $data_chart['data']=json_encode($data_chart['data']);

        


        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de ejecución";//nombre de la p'agin;
        $dataContainer->siderbar_type = "assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="disponibilidad_por_averia_rep";
        $dataContainer->report_name="Indicador de Disponibilidad por Avería";
        $dataContainer->group=false;
        $dataContainer->service=false;
        $dataContainer->serial_number=true;
        $dataContainer->patrimonial_code=true;
        $dataContainer->chart=true;
        $dataContainer->chart_model='assets.time.1';
        $dataContainer->chart_title='Disponibilidad';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.assets.1',compact('dataContainer'));
    }

    public function e_4_post(Request $request)
    {
              /*Validator section*/
         $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('disponibilidad')
                        ->withErrors($validator)
                        ->withInput();
        }

        //INICIALIZACION DE VARIABLES
        $codPatrimonio=null;
        $numSerie=null;

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $codPatrimonio =$request->search_codigo_patrimonial;
        $numSerie= $request->search_numero_serie;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $otCorrectivos=null;
        $otPreventivos=null;

        //$codigoPatrimonial="532269990015";
        if($codPatrimonio!=null){
            $label[0]=$codPatrimonio;
                 $otCorrectivos = DB::table('ot_correctivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_correctivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_correctivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ot_correctivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(ot_correctivos.idot_correctivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_correctivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.codigo_patrimonial','=',$codPatrimonio)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();


                $otPreventivos = DB::table('ot_preventivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_preventivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_preventivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ot_preventivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(ot_preventivos.idot_preventivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_preventivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.codigo_patrimonial','=',$codPatrimonio)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();
        }
        else{
            $label[0]=$numSerie;
                     $otCorrectivos = DB::table('ot_correctivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_correctivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_correctivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ot_correctivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(ot_correctivos.idot_correctivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_correctivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.numero_serie','=',$numSerie)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();


                $otPreventivos = DB::table('ot_preventivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_preventivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_preventivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ot_preventivos.tiempo_ejecucion) as Tiempo'), 
                                        DB::raw('COUNT(ot_preventivos.idot_preventivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_preventivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.numero_serie','=',$numSerie)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();

        }      
       //echo dd($otCorrectivos);

        //PREPARACION DE ESTRUCTURA DE DATOS 
        $data_chart['year_beg']=$anhoInicio;
        $data_chart['year_end']=$anhoFin;
        $data_chart['month_beg']=$mesInicio;
        $data_chart['month_end']=$mesFin;
        
        /*if($anhoFin==$anhoInicio){
            $data_chart['num_months']=$mesFin-$mesInicio+1;
        }
        else{
            if($anhoFin-$anhoInicio==1){
                $data_chart['num_months']=13-$mesInicio+$mesFin;
            }else{
               $veces=$anhoFin-$anhoInicio+1; 
               $data_chart['num_months'] =12*$veces + 13-$mesInicio+$mesFin;
            }
        }*/

        //echo dd($otCorrectivos);

        
        $data_chart['labels']=json_encode($label);
        $numeroMes=0;
        while($date_start_c<$date_end_c)
        {   
            $numeroMes++;
            $mesTemp=$date_start_c->month;
            $anhoTemp=$date_start_c->year;

            $end_current_month = $date_start_c->copy()->endOfMonth();
            //cantidad de dias de mes
           
            //INICIALIZACION   
            $data_chart['data']['percentage'][$numeroMes][0]=($end_current_month->day)*24;//tiempo
            $data_chart['data']['hours'][$numeroMes][0]=0;//fallas
            $logico=0;
            foreach ($otCorrectivos as $oc) {
                if(($mesTemp==$oc->{'Mes'}) && ($anhoTemp==$oc->{'Ahno'})){
                    $data_chart['data']['hours'][$numeroMes][0]=$data_chart['data']['hours'][$numeroMes][0]+ $oc->{'NumeroOt'};                    
                    $data_chart['data']['percentage'][$numeroMes][0]= ($end_current_month->day)*24/($oc->{'NumeroOt'}+1); 
                    $logico=1;
                }
            }

            foreach ($otPreventivos as $op) {
                if(($mesTemp==$op->{'Mes'}) && ($anhoTemp==$op->{'Ahno'})){
                    $data_chart['data']['hours'][$numeroMes][0]=$data_chart['data']['hours'][$numeroMes][0]+($op->{'Tiempo'})/60;                    
                    
                    if($logico==0){
                        $data_chart['data']['percentage'][$numeroMes][0]= ($end_current_month->day)*24/($op->{'NumeroOt'}+1); 

                    }else{
                        $data_chart['data']['percentage'][$numeroMes][0]= $data_chart['data']['percentage'][$numeroMes][0] + ($end_current_month->day)*24/($op->{'NumeroOt'}+1);                         
                    }
                }
            }


            $date_start_c->addMonth();
        }
        

        $data_chart['num_months']=$numeroMes;


        $data_chart['data']=json_encode($data_chart['data']);

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de ejecución";//nombre de la p'agin;
        $dataContainer->siderbar_type = "assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="disponibilidad_rep";
        $dataContainer->report_name="Indicador de Tiempo Medio entre Fallos";
        $dataContainer->group=false;
        $dataContainer->service=false;
        $dataContainer->serial_number=true;
        $dataContainer->patrimonial_code=true;
        $dataContainer->chart=true;
        $dataContainer->chart_model='assets.time.1';
        $dataContainer->chart_title='Tiempo medio entre fallos';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.assets.11',compact('dataContainer'));
        
    }

    public function e_5_post(Request $request)
    {
           /*Validator section*/
         $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('disponibilidad')
                        ->withErrors($validator)
                        ->withInput();
        }

        //INICIALIZACION DE VARIABLES
        $codPatrimonio=null;
        $numSerie=null;

        //DATOS OBTENIDOS POR REQUEST
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $codPatrimonio =$request->search_codigo_patrimonial;
        $numSerie= $request->search_numero_serie;
        
        //TRASNFORMACION DE LAS FECHAS
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        
        $anhoInicio =$date_start_c->year;
        $mesInicio =$date_start_c->month;
        $anhoFin=$date_end_c->year;
        $mesFin=$date_end_c->month;

        $label=array();

        $otCorrectivos=null;
        $otPreventivos=null;

        //$codigoPatrimonial="532269990015";
        if($codPatrimonio!=null){
            $label[0]=$codPatrimonio;
                 $otCorrectivos = DB::table('ot_correctivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_correctivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_correctivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ABS(TIMESTAMPDIFF(MINUTE,ot_correctivos.fecha_inicio_ejecucion,ot_correctivos.created_at ))) as Tiempo'), 
                                        DB::raw('COUNT(ot_correctivos.idot_correctivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_correctivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.codigo_patrimonial','=',$codPatrimonio)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();


                $otPreventivos = DB::table('ot_preventivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_preventivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_preventivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ABS(TIMESTAMPDIFF(MINUTE,ot_preventivos.fecha_inicio_ejecucion,ot_preventivos.created_at ))) as Tiempo'), 
                                        DB::raw('COUNT(ot_preventivos.idot_preventivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_preventivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.codigo_patrimonial','=',$codPatrimonio)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();


        }
        else{
            $label[0]=$numSerie;
                     $otCorrectivos = DB::table('ot_correctivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_correctivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_correctivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ABS(TIMESTAMPDIFF(MINUTE,ot_correctivos.fecha_inicio_ejecucion,ot_correctivos.created_at ))) as Tiempo'), 
                                        DB::raw('COUNT(ot_correctivos.idot_correctivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_correctivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.numero_serie','=',$numSerie)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();


                $otPreventivos = DB::table('ot_preventivos')
                                     ->select(array(
                                        DB::raw('YEAR(ot_preventivos.fecha_inicio_ejecucion) as Ahno'),
                                        DB::raw('MONTH(ot_preventivos.fecha_inicio_ejecucion) as Mes'), 
                                        DB::raw('SUM(ABS(TIMESTAMPDIFF(MINUTE,ot_preventivos.fecha_inicio_ejecucion,ot_preventivos.created_at ))) as Tiempo'), 
                                        DB::raw('COUNT(ot_preventivos.idot_preventivo) as NumeroOt')))
                                     ->leftJoin('activos', function($join)
                                         {
                                             $join->on('ot_preventivos.idactivo', '=', 'activos.idactivo');
                                          
                                         })
                                        ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                        ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                        ->where('activos.numero_serie','=',$numSerie)
                                        ->groupby('Ahno','Mes')
                                        ->orderBy('Ahno', 'Mes') 
                                        ->get();


        }      
       

        //PREPARACION DE ESTRUCTURA DE DATOS 
        $data_chart['year_beg']=$anhoInicio;
        $data_chart['year_end']=$anhoFin;
        $data_chart['month_beg']=$mesInicio;
        $data_chart['month_end']=$mesFin;
        
        /*if($anhoFin==$anhoInicio){
            $data_chart['num_months']=$mesFin-$mesInicio+1;
        }
        else{
            if($anhoFin-$anhoInicio==1){
                $data_chart['num_months']=13-$mesInicio+$mesFin;
            }else{
               $veces=$anhoFin-$anhoInicio+1; 
               $data_chart['num_months'] =12*$veces + 13-$mesInicio+$mesFin;
            }
        }*/

        //echo dd($otCorrectivos);

        
        $data_chart['labels']=json_encode($label);
        $numeroMes=0;
        while($date_start_c<$date_end_c)
        {   
            $numeroMes++;
            $mesTemp=$date_start_c->month;
            $anhoTemp=$date_start_c->year;

            $end_current_month = $date_start_c->copy()->endOfMonth();
            //cantidad de dias de mes
           
            //INICIALIZACION   
            $data_chart['data']['percentage'][$numeroMes][0]=0;//tiempo Medio de atención SOT
            $data_chart['data']['hours'][$numeroMes][0]=0;//número de averias SOT
            $logico=0;
            $tiempoMinutos=0;
            foreach ($otCorrectivos as $oc) {
                if(($mesTemp==$oc->{'Mes'}) && ($anhoTemp==$oc->{'Ahno'})){
                    $data_chart['data']['hours'][$numeroMes][0]=$data_chart['data']['hours'][$numeroMes][0]+ $oc->{'NumeroOt'};                    
                    $tiempoMinutos+=$oc->{'Tiempo'};
                    break;
                }
            }

            foreach ($otPreventivos as $op) {
                if(($mesTemp==$op->{'Mes'}) && ($anhoTemp==$op->{'Ahno'})){
                    $data_chart['data']['hours'][$numeroMes][0]=$data_chart['data']['hours'][$numeroMes][0]+ $op->{'NumeroOt'};                    
                    $tiempoMinutos+=$op->{'Tiempo'};
                    break;
                }
            }
            if($data_chart['data']['hours'][$numeroMes][0]==0){
                $data_chart['data']['percentage'][$numeroMes][0]=$tiempoMinutos/60;
            }else{
                $data_chart['data']['percentage'][$numeroMes][0]=$tiempoMinutos/(60*$data_chart['data']['hours'][$numeroMes][0]);
            }

            $date_start_c->addMonth();
        }
        

        $data_chart['num_months']=$numeroMes;


        $data_chart['data']=json_encode($data_chart['data']);

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador medio de atención SOT";//nombre de la p'agin;
        $dataContainer->siderbar_type = "assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="tiempo_medio_de_atención_de_sot_rep";
        $dataContainer->report_name="Indicador de tiempo medio de atención SOT";
        $dataContainer->chart=true;
        $dataContainer->chart_model='assets.time.1';
        $dataContainer->chart_title='Tiempo medio de Atención de SOT';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.assets.12',compact('dataContainer'));
    }

    public function e_6_post(Request $request)
    {
        $validator = Validator::make($request->all(),$this->getValidations(true));

        if ($validator->fails()) {
            return redirect('numero_otm_generados')->withErrors($validator)->withInput();
        }

        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;

        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();                                 

        $otCorrectivos = DB::table('servicios')
                         ->select(array('servicios.idservicio', 'servicios.nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as correctivo')))
                         ->leftJoin('ot_correctivos', function($join){
                                $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_correctivos.fecha_programacion','>=', $date_start_c)
                            ->where('ot_correctivos.fecha_programacion','<=', $date_end_c)
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();                        
        //ot_vmetrologicas
        $otPreventivos = DB::table('servicios')
                         ->select(array('servicios.idservicio', 'servicios.nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as preventivo')))
                         ->leftJoin('ot_preventivos', function($join) {
                                 $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_preventivos.fecha_programacion','>=', $date_start_c)
                            ->where('ot_preventivos.fecha_programacion','<=', $date_end_c)                               
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();

        $otMetrologicas = DB::table('servicios')
                         ->select(array('servicios.idservicio', 'servicios.nombre', DB::raw('COUNT(ot_vmetrologicas.idot_vmetrologica) as metrologica')))
                         ->leftJoin('ot_vmetrologicas', function($join) {
                                 $join->on('ot_vmetrologicas.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_vmetrologicas.fecha_programacion','>=', $date_start_c)
                            ->where('ot_vmetrologicas.fecha_programacion','<=', $date_end_c)                               
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();   
                             
        $otInspecciones = DB::table('servicios')
                         ->select(array('servicios.idservicio', 'servicios.nombre', DB::raw('COUNT(ot_inspec_equipos.idot_inspec_equipo) as inspeccion')))
                         ->leftJoin('ot_inspec_equipos', function($join) {
                                 $join->on('ot_inspec_equipos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_inspec_equipos.fecha_inicio','>=', $date_start_c)
                            ->where('ot_inspec_equipos.fecha_inicio','<=', $date_end_c)                               
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get(); 
                             
        $services_aux = Servicio::all();

        $data = array();
        $i=0;
        foreach($services_aux as $s) {
            $i++;
            $data[$i][0] = $s->idServicio; //idServicios
            $data[$i][1] = $s->nombre; //nombreServicios
            $data[$i][2] = 0;
            foreach($otCorrectivos as $oc) {                    
                if ($oc->idservicio==$s->idservicio) {
                    $data[$i][2] = $oc->correctivo; //correctivos
                    break;
                }
            }
            $data[$i][3] = 0;
            foreach($otPreventivos as $op) {                
                if ($op->idservicio==$s->idservicio) {                        
                    $data[$i][3] = $op->preventivo; //preventivo
                    break;
                }
            }
            $data[$i][4] = 0;
            foreach($otMetrologicas as $om) {                
                if ($om->idservicio==$s->idservicio) {                        
                    $data[$i][4] = $om->metrologica; //metrologicas
                    break;
                }
            }
            $data[$i][5] = 0; //inspecciones
            foreach($otInspecciones as $oi) {                
                if ($oi->idservicio==$s->idservicio) {                        
                    $data[$i][5] = $oi->inspeccion; //metrologicas
                    break;
                }
            }
        }
                        
        $data_table=$data;
       
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "assets";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="numero_otm_generados_rep";
        $dataContainer->report_name="Número de OTM generados";
        $dataContainer->table=true;
        $dataContainer->data_table=$data_table;
        
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

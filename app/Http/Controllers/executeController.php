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

class executeController extends Controller
{

    public function e_1()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de ejecución";//nombre de la p'agin;
        $dataContainer->siderbar_type ="execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="disponibilidad_rep";
        $dataContainer->report_name="Indicador de Disponibilidad";
        $dataContainer->serial_number=true;
        $dataContainer->patrimonial_code=true;
        
        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_2()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de ejecución total";//nombre de la p'agin;
        $dataContainer->siderbar_type ="execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="disponibilidad_total_rep";
        $dataContainer->report_name="Indicador de Disponibilidad Total";
        $dataContainer->service=true;
        $dataContainer->group=false;
        $dataContainer->departament=true;

        return view('indicators.execute.2',compact('dataContainer'));
    }

    public function e_3()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Disponibilidad por avería";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="disponibilidad_por_averia_rep";
        $dataContainer->report_name="Indicador de Disponibilidad por Avería";
        $dataContainer->serial_number=true;
        $dataContainer->patrimonial_code=true;
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=true;
        

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_4()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="tiempo_medio_entre_fallos_rep";
        $dataContainer->report_name="Indicador de Tiempo Medio entre Fallos";
        $dataContainer->serial_number=true;
        $dataContainer->patrimonial_code=true;
        $dataContainer->service=false;
        $dataContainer->group=false;
        $dataContainer->departament=true;

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_5()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio de Atención de SOT";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="tiempo_medio_de_atención_de_sot_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";
        $dataContainer->serial_number=true;
        $dataContainer->patrimonial_code=true;

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_6()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="numero_otm_generados_rep";
        $dataContainer->report_name="Número de OTM generados";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_7()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="numero_otm_acabados_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_8()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="numero_otm_pendiente_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_9()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="numero_de_otm_no_atendido_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_10()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="solicitudes_de_trabajo_generados_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_11()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="solicitudes_de_trabajo_atendidos_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_12()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="solicitudes_de_trabajo_no_atendidos_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_13()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de solicitudes OTM pendientes";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="solicitudes_de_trabajo_pendientes_rep";
        $dataContainer->report_name="Número de solicitudes OTM pendientes";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_14()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="tiempo_medio_de_respuesta_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_15()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="cumplimiento_de_planificación_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_16()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="desviación_media_de_tiempo_planificado_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_17()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="desviación_media_de_tiempo_planificado_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_18()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo medio entre fallos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="tiempo_medio_de_resolución_de_otm_rep";
        $dataContainer->report_name="Indicador de tiempo medio entre fallos";

        return view('indicators.execute.1',compact('dataContainer'));
    }

    public function e_1_post(Request $request)
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
            $data_chart['data']['percentage'][$numeroMes][0]=0;
            $data_chart['data']['hours'][$numeroMes][0]=0;

            foreach ($otCorrectivos as $oc) {
                if(($mesTemp==$oc->{'Mes'}) && ($anhoTemp==$oc->{'Ahno'})){
                    $data_chart['data']['hours'][$numeroMes][0]=$data_chart['data']['hours'][$numeroMes][0]+ ($oc->{'Tiempo'})/60;                    
                    $data_chart['data']['percentage'][$numeroMes][0]= $data_chart['data']['hours'][$numeroMes][0]*100/($end_current_month->day*24);
                }
            }

            foreach ($otPreventivos as $op) {
                if(($mesTemp==$op->{'Mes'}) && ($anhoTemp==$op->{'Ahno'})){
                    $data_chart['data']['hours'][$numeroMes][0]=$data_chart['data']['hours'][$numeroMes][0]+($op->{'Tiempo'})/60;                    
                    $data_chart['data']['percentage'][$numeroMes][0]= $data_chart['data']['hours'][$numeroMes][0]*100/($end_current_month->day*24);
                }
            }


            $date_start_c->addMonth();
        }
        

        $data_chart['num_months']=$numeroMes;
        

        $data_chart['data']=json_encode($data_chart['data']);

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de ejecución";//nombre de la p'agin;
        $dataContainer->siderbar_type ="execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="disponibilidad_rep";
        $dataContainer->report_name="Indicador de Disponibilidad";
        $dataContainer->serial_number=true;
        $dataContainer->patrimonial_code=true;
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Disponibilidad';
        $dataContainer->data_chart=$data_chart;
        
        return view('indicators.execute.1',compact('dataContainer'));

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
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="disponibilidad_total_rep";
        $dataContainer->report_name="Indicador de Disponibilidad Total";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Disponibilidad Total';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.execute.10',compact('dataContainer'));        
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
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="disponibilidad_por_averia_rep";
        $dataContainer->report_name="Indicador de Disponibilidad por Avería";
        $dataContainer->group=false;
        $dataContainer->service=false;
        $dataContainer->serial_number=true;
        $dataContainer->patrimonial_code=true;
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Disponibilidad';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.execute.1',compact('dataContainer'));
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
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="disponibilidad_rep";
        $dataContainer->report_name="Indicador de Tiempo Medio entre Fallos";
        $dataContainer->group=false;
        $dataContainer->service=false;
        $dataContainer->serial_number=true;
        $dataContainer->patrimonial_code=true;
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Tiempo medio entre fallos';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.execute.11',compact('dataContainer'));
        
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
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="tiempo_medio_de_atención_de_sot_rep";
        $dataContainer->report_name="Indicador de tiempo medio de atención SOT";
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Tiempo medio de Atención de SOT';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.execute.12',compact('dataContainer'));
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
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="numero_otm_generados_rep";
        $dataContainer->report_name="Número de OTM generados";
        $dataContainer->table=true;
        $dataContainer->data_table=$data_table;
        
        return view('indicators.execute.6',compact('dataContainer'));
    }

    public function e_7_post(Request $request)
    {
     /*Validator section*/
        $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('disponibilidad')
                        ->withErrors($validator)
                        ->withInput();
        }
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
      

        
        $otCorrectivos=null;
        $OtPreventivos=null;
        $otMetrologicas=null;
        $otRetiros=null;
     
            
            $otCorrectivos = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
              $OtPreventivos = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                             ->leftJoin('ot_preventivos', function($join)
                                 {
                                     $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            
             
            $otMetrologicas = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_vmetrologicas.idot_vmetrologica) as Metrologica')))
                             ->leftJoin('ot_vmetrologicas', function($join)
                                 {
                                     $join->on('ot_vmetrologicas.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_vmetrologicas.fecha_programacion','>=', $date_start_c)
                                ->where('ot_vmetrologicas.fecha_programacion','<=', $date_end_c)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            
            $otRetiros = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_retiros.idot_retiro) as Retiro')))
                             ->leftJoin('ot_retiros', function($join)
                                 {
                                     $join->on('ot_retiros.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_retiros.fecha_programacion','>=', $date_start_c)
                                ->where('ot_retiros.fecha_programacion','<=', $date_end_c)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

        $servicios = Servicio::all();

        $data = array();
        $i=0;
        foreach($servicios as $ser) {
            $i++;
            
            $data[$i][1] = $ser->nombre; //nombreServicios
            $data[$i][2] = 0;
            foreach($otCorrectivos as $oc) {                    
                if ($oc->{'Nombre'}==$ser->nombre) {
                    $data[$i][2] = $oc->{'Correctivo'}; //correctivos
                    break;
                }
            }
            $data[$i][3] = 0;
            foreach($OtPreventivos as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][3] = $op->{'Preventivo'}; //preventivo
                    break;
                }
            }
            $data[$i][4] = 0;
            foreach($otMetrologicas as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][4] = $op->{'Metrologica'}; //metrologica
                    break;
                }
            }
            
            $data[$i][5] = 0; 
            foreach($otRetiros as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][5] = $op->{'Retiro'}; //inspeccion
                    break;
                }
            }
        }
           
         $data_table=$data;



        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de ejecución";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="numero_otm_acabados_rep";
        $dataContainer->report_name="Número de OTM acabados";
        $dataContainer->table=true;
        $dataContainer->data_table=$data_table;
        
        return view('indicators.execute.6',compact('dataContainer'));
    }

    public function e_8_post(Request $request)//PENDIENTE
  {
  /*Validator section*/
     $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('disponibilidad')
                        ->withErrors($validator)
                        ->withInput();
        }
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
      

        
        $otCorrectivos=null;
        $OtPreventivos=null;
        $otMetrologicas=null;
        $otRetiros=null;

            
            $otCorrectivos = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->where('ot_correctivos.idestado_final','=',9)//Significa estado pendiente, revisar tabla de estado para corroborar
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            $OtPreventivos = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                             ->leftJoin('ot_preventivos', function($join)
                                 {
                                     $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->where('ot_preventivos.idestado_final','=',9)//Significa estado pendiente, revisar tabla de estado para corroborar
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

            $otMetrologicas = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_vmetrologicas.idot_vmetrologica) as Metrologica')))
                             ->leftJoin('ot_vmetrologicas', function($join)
                                 {
                                     $join->on('ot_vmetrologicas.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_vmetrologicas.fecha_programacion','>=', $date_start_c)
                                ->where('ot_vmetrologicas.fecha_programacion','<=', $date_end_c)
                                ->where('ot_vmetrologicas.idestado_final','=',9)//Significa estado pendiente, revisar tabla de estado para corroborar
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            
            $otRetiros = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_retiros.idot_retiro) as Retiro')))
                             ->leftJoin('ot_retiros', function($join)
                                 {
                                     $join->on('ot_retiros.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_retiros.fecha_programacion','>=', $date_start_c)
                                ->where('ot_retiros.fecha_programacion','<=', $date_end_c)
                                ->where('ot_retiros.idestado_final','=',9)//Significa estado pendiente, revisar tabla de estado para corroborar
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();


        
        $servicios = Servicio::all();

        $data = array();
        $i=0;
        foreach($servicios as $ser) {
            $i++;
            
            $data[$i][1] = $ser->nombre; //nombreServicios
            $data[$i][2] = 0;
            foreach($otCorrectivos as $oc) {                    
                if ($oc->{'Nombre'}==$ser->nombre) {
                    $data[$i][2] = $oc->{'Correctivo'}; //correctivos
                    break;
                }
            }
            $data[$i][3] = 0;
            foreach($OtPreventivos as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][3] = $op->{'Preventivo'}; //preventivo
                    break;
                }
            }
            $data[$i][4] = 0;
            foreach($otMetrologicas as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][4] = $op->{'Metrologica'}; //metrologica
                    break;
                }
            }
            
            $data[$i][5] = 0; 
            foreach($otRetiros as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][5] = $op->{'Retiro'}; //inspeccion
                    break;
                }
            }
        }
           
         $data_table=$data;



        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="numero_otm_pendiente_rep";
        $dataContainer->report_name="Número de OTM generados";
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Número de OTM generados';
        $dataContainer->data_table=$data_table;
        
        return view('indicators.execute.6',compact('dataContainer'));

  }

    public function e_9_post(Request $request)
    {

        /*Validator section*/
        $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('disponibilidad')
                        ->withErrors($validator)
                        ->withInput();
        }
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
       
        
        $otCorrectivos=null;
        $OtPreventivos=null;
        $otMetrologicas=null;
        $otRetiros=null;
            
           
            $otCorrectivos = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)       
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->whereNull('ot_correctivos.idestado_final')//No atendido
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
              $OtPreventivos = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                             ->leftJoin('ot_preventivos', function($join)
                                 {
                                     $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)  
                                ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->whereNull('ot_preventivos.idestado_final')//No atendido
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
              $otMetrologicas = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_vmetrologicas.idot_vmetrologica) as Metrologica')))
                             ->leftJoin('ot_vmetrologicas', function($join)
                                 {
                                     $join->on('ot_vmetrologicas.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_vmetrologicas.fecha_programacion','>=', $date_start_c)
                                ->where('ot_vmetrologicas.fecha_programacion','<=', $date_end_c)
                                ->whereNull('ot_vmetrologicas.idestado_final') //No atendido
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            
            $otRetiros = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_retiros.idot_retiro) as Retiro')))
                             ->leftJoin('ot_retiros', function($join)
                                 {
                                     $join->on('ot_retiros.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_retiros.fecha_programacion','>=', $date_start_c)
                                ->where('ot_retiros.fecha_programacion','<=', $date_end_c)
                                ->whereNull('ot_retiros.idestado_final')//No atendido
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();


        
        $servicios = Servicio::all();

        $data = array();
        $i=0;
        foreach($servicios as $ser) {
            $i++;
            
            $data[$i][1] = $ser->nombre; //nombreServicios
            $data[$i][2] = 0;
            foreach($otCorrectivos as $oc) {                    
                if ($oc->{'Nombre'}==$ser->nombre) {
                    $data[$i][2] = $oc->{'Correctivo'}; //correctivos
                    break;
                }
            }
            $data[$i][3] = 0;
            foreach($OtPreventivos as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][3] = $op->{'Preventivo'}; //preventivo
                    break;
                }
            }
            $data[$i][4] = 0;
            foreach($otMetrologicas as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][4] = $op->{'Metrologica'}; //metrologica
                    break;
                }
            }
            
            $data[$i][5] = 0; 
            foreach($otRetiros as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][5] = $op->{'Retiro'}; //inspeccion
                    break;
                }
            }
        }
           
         $data_table=$data;




        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="numero_otm_generados_rep";
        $dataContainer->report_name="Número de OTM generados";
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Número de OTM generados';
        $dataContainer->data_table=$data_table;
        
        return view('indicators.execute.6',compact('dataContainer'));
    }

    public function e_10_post(Request $request) //SOLICITUDES DE TRABAJO GENERADAS
    {
        /*Validator section*/
        $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('disponibilidad')
                        ->withErrors($validator)
                        ->withInput();
        }
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
   
        
        
        $otCorrectivos=null;
        
     
           
            $otCorrectivos = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_correctivos.idsolicitud_orden_trabajo) as ordenDeTrabajo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

         $servicios = Servicio::all();

        $data = array();
        $i=0;
        foreach($servicios as $ser) {
            $i++;
            
            $data[$i][1] = $ser->nombre; //nombreServicios
            $data[$i][2] = 0;
            foreach($otCorrectivos as $oc) {                    
                if ($oc->{'Nombre'}==$ser->nombre) {
                    $data[$i][2] = $oc->{'ordenDeTrabajo'}; //correctivos
                    break;
                }
            }
        }

        $data_table=$data;

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="solicitudes_de_trabajo_generados_rep";
        $dataContainer->report_name="Número de trabajos generados";
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Número de OTM generados';
        $dataContainer->data_table=$data_table;
        
        return view('indicators.execute.7',compact('dataContainer'));

    }

    public function e_11_post(Request $request)
    {
        /*Validator section*/
        $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('disponibilidad')
                        ->withErrors($validator)
                        ->withInput();
        }
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
       
        $otCorrectivos=null;
        $OtPreventivos=null;
        $otMetrologicas=null;
        $otRetiros=null;
       
           
            $otCorrectivos = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->where('ot_correctivos.idestado_final','=',19)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            $OtPreventivos = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                             ->leftJoin('ot_preventivos', function($join)
                                 {
                                     $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->where('ot_preventivos.idestado_final','=',19)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

           $otMetrologicas = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_vmetrologicas.idot_vmetrologica) as Metrologica')))
                             ->leftJoin('ot_vmetrologicas', function($join)
                                 {
                                     $join->on('ot_vmetrologicas.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_vmetrologicas.fecha_programacion','>=', $date_start_c)
                                ->where('ot_vmetrologicas.fecha_programacion','<=', $date_end_c)
                                ->where('ot_vmetrologicas.idestado_final','=',19)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            
            $otRetiros = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_retiros.idot_retiro) as Retiro')))
                             ->leftJoin('ot_retiros', function($join)
                                 {
                                     $join->on('ot_retiros.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_retiros.fecha_programacion','>=', $date_start_c)
                                ->where('ot_retiros.fecha_programacion','<=', $date_end_c)
                                ->where('ot_retiros.idestado_final','=',19)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();


         $servicios = Servicio::all();

        $data = array();
        $i=0;
        foreach($servicios as $ser) {
            $i++;
            
            $data[$i][1] = $ser->nombre; //nombreServicios
            $data[$i][2] = 0;
            foreach($otCorrectivos as $oc) {                    
                if ($oc->{'Nombre'}==$ser->nombre) {
                    $data[$i][2] =$data[$i][2]+ $oc->{'Correctivo'}; //correctivos
                    break;
                }
            }
            
            foreach($OtPreventivos as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][2] =$data[$i][2]+ $op->{'Preventivo'}; //preventivo
                    break;
                }
            }
            
            foreach($otMetrologicas as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][2] =$data[$i][2] + $op->{'Metrologica'}; //metrologica
                    break;
                }
            }
            
            
            foreach($otRetiros as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][2] =$data[$i][2]+ $op->{'Retiro'}; //inspeccion
                    break;
                }
            }
        }
           
         $data_table=$data;

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM atendidos";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="solicitudes_de_trabajo_atendidos_rep";
        $dataContainer->report_name="Número de OTM atendidos";
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Número de OTM atendidos';
        $dataContainer->data_table=$data_table;
        
        return view('indicators.execute.7',compact('dataContainer'));
    }

    public function e_12_post(Request $request)
    {
     /*Validator section*/
        $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('disponibilidad')
                        ->withErrors($validator)
                        ->withInput();
        }
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
       
        $otCorrectivosF=null;
        $OtPreventivosF=null;
        $otMetrologicasF=null;
        $otRetirosF=null;
        $otCorrectivosM=null;
        $OtPreventivosM=null;
        $otMetrologicasM=null;
        $otRetirosM=null;
       
           //FALSA ALARMA
            $otCorrectivosF = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->where('ot_correctivos.idestado_final','=',16)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            $OtPreventivosF = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                             ->leftJoin('ot_preventivos', function($join)
                                 {
                                     $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->where('ot_preventivos.idestado_final','=',16)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

           $otMetrologicasF = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_vmetrologicas.idot_vmetrologica) as Metrologica')))
                             ->leftJoin('ot_vmetrologicas', function($join)
                                 {
                                     $join->on('ot_vmetrologicas.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_vmetrologicas.fecha_programacion','>=', $date_start_c)
                                ->where('ot_vmetrologicas.fecha_programacion','<=', $date_end_c)
                                ->where('ot_vmetrologicas.idestado_final','=',16)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            
            $otRetirosF = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_retiros.idot_retiro) as Retiro')))
                             ->leftJoin('ot_retiros', function($join)
                                 {
                                     $join->on('ot_retiros.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_retiros.fecha_programacion','>=', $date_start_c)
                                ->where('ot_retiros.fecha_programacion','<=', $date_end_c)
                                ->where('ot_retiros.idestado_final','=',16)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

            //MAL INGRESO
             $otCorrectivosM = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->where('ot_correctivos.idestado_final','=',26)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            $OtPreventivosM = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                             ->leftJoin('ot_preventivos', function($join)
                                 {
                                     $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->where('ot_preventivos.idestado_final','=',26)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

           $otMetrologicasM = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_vmetrologicas.idot_vmetrologica) as Metrologica')))
                             ->leftJoin('ot_vmetrologicas', function($join)
                                 {
                                     $join->on('ot_vmetrologicas.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_vmetrologicas.fecha_programacion','>=', $date_start_c)
                                ->where('ot_vmetrologicas.fecha_programacion','<=', $date_end_c)
                                ->where('ot_vmetrologicas.idestado_final','=',26)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            
            $otRetirosM = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_retiros.idot_retiro) as Retiro')))
                             ->leftJoin('ot_retiros', function($join)
                                 {
                                     $join->on('ot_retiros.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_retiros.fecha_programacion','>=', $date_start_c)
                                ->where('ot_retiros.fecha_programacion','<=', $date_end_c)
                                ->where('ot_retiros.idestado_final','=',26)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();




         $servicios = Servicio::all();

        $data = array();
        $i=0;
        foreach($servicios as $ser) {
            $i++;
            
            $data[$i][1] = $ser->nombre; //nombreServicios
            $data[$i][2] = 0;
            foreach($otCorrectivosF as $oc) {                    
                if ($oc->{'Nombre'}==$ser->nombre) {
                    $data[$i][2] =$data[$i][2]+ $oc->{'Correctivo'}; //correctivos
                    break;
                }
            }
            
            foreach($OtPreventivosF as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][2] =$data[$i][2]+ $op->{'Preventivo'}; //preventivo
                    break;
                }
            }
            
            foreach($otMetrologicasF as $om) {                
                if ($om->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][2] =$data[$i][2] + $om->{'Metrologica'}; //metrologica
                    break;
                }
            }
            
            
            foreach($otRetirosF as $or) {                
                if ($or->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][2] =$data[$i][2]+ $or->{'Retiro'}; //inspeccion
                    break;
                }
            }

            $data[$i][3] = 0;
            foreach($otCorrectivosM as $oc) {                    
                if ($oc->{'Nombre'}==$ser->nombre) {
                    $data[$i][3] =$data[$i][3]+ $oc->{'Correctivo'}; //correctivos
                    break;
                }
            }
            
            foreach($OtPreventivosM as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][3] =$data[$i][3]+ $op->{'Preventivo'}; //preventivo
                    break;
                }
            }
            
            foreach($otMetrologicasM as $om) {                
                if ($om->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][3] =$data[$i][3] + $om->{'Metrologica'}; //metrologica
                    break;
                }
            }
            
            
            foreach($otRetirosM as $or) {                
                if ($or->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][3] =$data[$i][3]+ $or->{'Retiro'}; //inspeccion
                    break;
                }
            }
        }
           
        $data_table=$data;
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="solicitudes_de_trabajo_no_atendidos_rep";
        $dataContainer->report_name="Número de OTM no atendidos";
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Número de OTM no atendidos';
        $dataContainer->data_table=$data_table;
        
        return view('indicators.execute.8',compact('dataContainer'));

        
    }

    public function e_13_post(Request $request)
    {
        $validator = Validator::make($request->all(),$this->getValidations(true));

        if ($validator->fails()) {
            return redirect('solicitudes_de_trabajo_pendientes')->withErrors($validator)->withInput();
        }

        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;

        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
        
        $sotCorrectivos = DB::table('servicios')
                         ->select(array('servicios.idservicio', 'servicios.nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as correctivo')))
                         ->leftJoin('ot_correctivos', function($join){
                                $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_correctivos.fecha_programacion','>=', $date_start_c)
                            ->where('ot_correctivos.fecha_programacion','<=', $date_end_c)
                            ->where('ot_correctivos.idestado_ot','=', 9)           
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();                        
        //ot_vmetrologicas
        $sotPreventivos = DB::table('servicios')
                         ->select(array('servicios.idservicio', 'servicios.nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as preventivo')))
                         ->leftJoin('ot_preventivos', function($join) {
                                 $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_preventivos.fecha_programacion','>=', $date_start_c)
                            ->where('ot_preventivos.fecha_programacion','<=', $date_end_c)
                            ->where('ot_correctivos.idestado_ot','=', 9)  
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();

        $sotMetrologicas = DB::table('servicios')
                         ->select(array('servicios.idservicio', 'servicios.nombre', DB::raw('COUNT(ot_vmetrologicas.idot_vmetrologica) as metrologica')))
                         ->leftJoin('ot_vmetrologicas', function($join) {
                                 $join->on('ot_vmetrologicas.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_vmetrologicas.fecha_programacion','>=', $date_start_c)
                            ->where('ot_vmetrologicas.fecha_programacion','<=', $date_end_c)   
                            ->where('ot_correctivos.idestado_ot','=', 9)           
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();   
                             
        $sotInspecciones = DB::table('servicios')
                         ->select(array('servicios.idservicio', 'servicios.nombre', DB::raw('COUNT(ot_inspec_equipos.idot_inspec_equipo) as inspeccion')))
                         ->leftJoin('ot_inspec_equipos', function($join) {
                                 $join->on('ot_inspec_equipos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_inspec_equipos.fecha_inicio','>=', $date_start_c)
                            ->where('ot_inspec_equipos.fecha_inicio','<=', $date_end_c)                               
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();       
                             
                             
        //idestado_ot=9 //ots pendientes
        $services_aux = Servicio::all();
        
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="solicitudes_de_trabajo_pendientes_rep";
        $dataContainer->report_name="Número de solicitudes OTM pendientes";
        $dataContainer->table=true;
        $dataContainer->data_table=$data_table;

        return view('indicators.execute.13',compact('dataContainer'));
    }

    public function e_14_post(Request $request)
    {

          /*Validator section*/
        $validator = Validator::make($request->all(),$this->getValidations(true));
        if ($validator->fails()) {
            return redirect('disponibilidad')
                        ->withErrors($validator)
                        ->withInput();
        }
        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
       
        $otCorrectivos=null;
        $OtPreventivos=null;
        $otMetrologicas=null;
        $otRetiros=null;

       
           //FALSA ALARMA
            $otCorrectivos = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo'), DB::raw('COUNT(ot_correctivos.tiempo_ejecucion) as TiempoEjecucion')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            $OtPreventivos = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo'), DB::raw('COUNT(ot_preventivos.tiempo_ejecucion) as TiempoEjecucion')))
                             ->leftJoin('ot_preventivos', function($join)
                                 {
                                     $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

           $otMetrologicas = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_vmetrologicas.idot_vmetrologica) as Metrologica'), DB::raw('COUNT(ot_vmetrologicas.tiempo_ejecucion) as TiempoEjecucion')))
                             ->leftJoin('ot_vmetrologicas', function($join)
                                 {
                                     $join->on('ot_vmetrologicas.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_vmetrologicas.fecha_programacion','>=', $date_start_c)
                                ->where('ot_vmetrologicas.fecha_programacion','<=', $date_end_c)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            
            $otRetiros = DB::table('servicios')
                             ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_retiros.idot_retiro) as Retiro'), DB::raw('COUNT(ot_retiros.tiempo_ejecucion) as TiempoEjecucion')))
                             ->leftJoin('ot_retiros', function($join)
                                 {
                                     $join->on('ot_retiros.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_retiros.fecha_programacion','>=', $date_start_c)
                                ->where('ot_retiros.fecha_programacion','<=', $date_end_c)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

            


         $servicios = Servicio::all();

        $data = array();
        $i=0;
        foreach($servicios as $ser) {
            $i++;
            
            $data[$i][1] = $ser->nombre; //nombreServicios
            $data[$i][2] = 0;
            foreach($otCorrectivos as $oc) {                    
                if ($oc->{'Nombre'}==$ser->nombre) {
                    $data[$i][2] =$data[$i][2]+ ($oc->{'TiempoEjecucion'})/(60*($oc->{'Correctivo'})); //correctivos
                    break;
                }
            }
            
            foreach($OtPreventivos as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][2] =$data[$i][2]+ ($op->{'TiempoEjecucion'})/(60*($op->{'Preventivo'})); //preventivo
                    break;
                }
            }
            
            foreach($otMetrologicas as $om) {                
                if ($om->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][2] =$data[$i][2] +($om->{'TiempoEjecucion'})/(60*($om->{'Metrologica'})); //metrologica
                    break;
                }
            }
            
            
            foreach($otRetiros as $or) {                
                if ($or->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][2] =$data[$i][2]+ ($or->{'TiempoEjecucion'})/(60*($or->{'Retiro'})); //inspeccion
                    break;
                }
            }

        }
           
        $data_table=$data;

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="tiempo_medio_de_respuesta_rep";
        $dataContainer->report_name="Número de OTM generados";
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Indicador de tiempo medio entre fallos';
        $dataContainer->data_table=$data_table;
        
        return view('indicators.execute.9',compact('dataContainer'));
    }

    public function e_15_post(Request $request)
    {
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="numero_otm_generados_rep";
        $dataContainer->report_name="Número de OTM generados";
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Número de OTM generados';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.execute.6',compact('dataContainer'));
    }

    public function e_16_post(Request $request)
    {
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="numero_otm_generados_rep";
        $dataContainer->report_name="Número de OTM generados";
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Número de OTM generados';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.execute.6',compact('dataContainer'));
    }

    public function e_17_post(Request $request)
    {
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="numero_otm_generados_rep";
        $dataContainer->report_name="Número de OTM generados";
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Número de OTM generados';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.execute.6',compact('dataContainer'));
    }

    public function e_18_post(Request $request)
    {
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Número de OTM generados";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="numero_otm_generados_rep";
        $dataContainer->report_name="Número de OTM generados";
        $dataContainer->chart=true;
        $dataContainer->chart_model='execute.time.1';
        $dataContainer->chart_title='Número de OTM generados';
        $dataContainer->data_chart=$data_chart;

        return view('indicators.execute.6',compact('dataContainer'));
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

    private function getValidations($insert)
    {
        $validations = array(
            'search_fecha_ini' => 'required',
            'search_fecha_fin' => 'required'
            );

        return $validations;
    }
}

<?php

namespace Maternidad\Http\Controllers;

use Illuminate\Http\Request;

use Maternidad\Http\Requests;
use Maternidad\Http\Controllers\Controller;
use Validator;
use Maternidad\OtCorrectivo;
use Maternidad\OtPreventivo;
use Maternidad\Activo;
use Maternidad\Servicio;
use Carbon\Carbon;
use DB;

class executeController extends Controller
{

    public function e_1()
    {        
        $data=[
            'page_name' => "Indicador de ejecución",//nombre de la p'agina
            'siderbar_type' => "execute",//Tipo de siderbar que se requere desplegar
            'method' => "get",//M'etodo que se esta ejecutando
            'url_post' => "disponibilidad_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Indicador de Disponibilidad",
            'chart' => 'false',
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_2()
    {
        $data=[
            'page_name' => "Indicador de ejecución total",//nombre de la p'agina
            'siderbar_type' => "execute",//Tipo de siderbar que se requere desplegar
            'method' => "get",//M'etodo que se esta ejecutando
            'url_post' => "disponibilidad_total_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Indicador de Disponibilidad Total",
            'chart' => 'false',
        ];

        return view('indicators.execute.6',compact('data'));
    }

    public function e_3()
    {
        $data=[
            'page_name' => "Disponibilidad por avería",//nombre de la p'agina
            'siderbar_type' => "execute",//Tipo de siderbar que se requere desplegar
            'method' => "get",//M'etodo que se esta ejecutando
            'url_post' => "disponibilidad_por_averia_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Indicador de disponibilidad por avería",
            'chart' => 'false',
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_4()
    {
        $data=[
            'page_name' => "Tiempo medio entre fallos",//nombre de la p'agina
            'siderbar_type' => "execute",//Tipo de siderbar que se requere desplegar
            'method' => "get",//M'etodo que se esta ejecutando
            'url_post' => "tiempo_medio_entre_fallos_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Indicador de tiempo medio entre fallos",
            'chart' => 'false',
        ];

        return view('indicators.execute.2',compact('data'));
    }

    public function e_5()
    {
        $data=[
            'page_name' => "Indicador medio de atención SOT",
            'siderbar_type' => "execute",
            'method' => "get",
            'url_post' => "tiempo_medio_de_atención_de_sot_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Indicador de tiempo medio de atención SOT",
            'chart' => 'false',
        ];

        return view('indicators.execute.3',compact('data'));
    }



    public function e_6()
    {
        $data=[
            'page_name' => "Número de OTM generados",//nombre de la p'agina
            'siderbar_type' => "execute",//Tipo de siderbar que se requere desplegar
            'method' => "get",//M'etodo que se esta ejecutando
            'url_post' => "numero_otm_generados_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Número de OTM generados",
            'chart' => 'false',
        ];

        return view('indicators.execute.6',compact('data'));
    }

    public function e_7()
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
             'url_post' => "numero_otm_acabados_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Número de OTM acabados",
            'chart' => 'false',
        ];

        return view('indicators.execute.6',compact('data'));
    }

    public function e_8()
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
            'url_post' => "numero_otm_pendiente_rep",// Ot No atendido
            'report_name' => "Número de OTM no atendido",
            'chart' => 'false',
        ];

        return view('indicators.execute.6',compact('data'));
    }

    public function e_9()
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
            'url_post' => "numero_de_otm_no_atendido_rep",// Ot Pendiente
            'report_name' => "Número de OTM Pendiente",
            'chart' => 'false',
        ];

        return view('indicators.execute.6',compact('data'));
    }

    public function e_10()
    {
        $data=[
           'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
            'url_post' => "solicitudes_de_trabajo_generados_rep",// Ot Pendiente
            'report_name' => "Número de trabajos generados",
            'chart' => 'false',
        ];

        return view('indicators.execute.6',compact('data'));
    }

    public function e_11()
    {
         $data=[
           'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
            'url_post' => "solicitudes_de_trabajo_atendidos_rep",// Ot Pendiente
            'report_name' => "Número de trabajos atendidos",
            'chart' => 'false',
        ];
        return view('indicators.execute.6',compact('data'));
    }

    public function e_12()
    {
         $data=[
           'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
            'url_post' => "solicitudes_de_trabajo_no_atendidos_rep",// Ot Pendiente
            'report_name' => "Número de trabajos atendidos",
            'chart' => 'false',
        ];
        return view('indicators.execute.6',compact('data'));
    }

    public function e_13()
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_14()
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_15()
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_16()
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_17()
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_18()
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
        ];

        return view('indicators.execute.1',compact('data'));
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

        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $codPatrimonio=null;
        $numSerie=null;
        $modelo=null;
        $codPatrimonio =$request->search_codigo_patrimonial;
        $numSerie= $request->search_numero_serie;
        $modelo= $request->search_modelo;
        

        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();


        $data_chart=null;
        $data_chart['year_beg']=$date_start_c->year;
        $data_chart['year_end']=$date_end_c->year;
        $data_chart['month_beg']=$date_start_c->month;
        $data_chart['month_end']=$date_end_c->month;

        //->toDateTimeString();
        $data_chart['num_months']=0;
        $data_procces=array();//Array que contiene la data a procesar
        $id_assets=array();//contiene las ids de los activos
        $name_assets=array();//contiene las ids de los activos
        $count_month=array();//d'ias de un mes
        
        $validaCodigoPatrimonio=null;
        $validaNumeroSerie=null;
        $validaCodigoModelo=null;

         if($codPatrimonio != null){
                 $validaCodigoPatrimonio = Activo::where('codigo_patrimonial', '=', $codPatrimonio)->first();
                    
         }elseif ($numSerie!=null) {
                 $validaNumeroSerie = Activo::where('numero_serie', '=', $numSerie)->first();
                    
         }elseif ($modelo!=null) {
                $validaCodigoModelo = Activo::where('idmodelo_equipo', '=', $modelo)->first();
                    
        }

        
        $otCorrectivos=null;
        $OtPreventivos=null;

        while($date_start_c<$date_end_c)
        {
            $data_chart['num_months']++;
            $data_procces[$data_chart['num_months']]=null;

            //Preparing 
            $end_current_month = $date_start_c->copy()->endOfMonth();
            //cantidad de dias de mes
            $count_month[$data_chart['num_months']]=$end_current_month->day;

            

                    if($validaCodigoPatrimonio != null){
                             $otCorrectivos = OtCorrectivo::withTrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoPatrimonio->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                             $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoPatrimonio->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                             
                    }
                    elseif ($validaNumeroSerie!=null) {
                             $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaNumeroSerie->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                             $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaNumeroSerie->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                            
                            
                    }elseif ($validaCodigoModelo!=null) {
                             $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoModelo->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                             $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoModelo->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                                
                            
                    }
                    else{
                            $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->orderBy('idot_correctivo', 'DESC')->get();
                            $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->orderBy('idot_preventivo', 'DESC')->get();       
                            $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->orderBy('idot_preventivo', 'DESC')->get();   
                    }

          
                $ots_array[0]=$otCorrectivos;
                $ots_array[1]=$OtPreventivos;

                if($otCorrectivos!=null || $OtPreventivos!=null){
                    foreach ($ots_array as $ots_collection) {
                        $last_id_assets = -1;//Activo
                        $ind_activos=-1;//Indice de activos para el array de datos 
                        foreach ($ots_collection as $current_ot)
                        {
                            if ($last_id_assets!=$current_ot->idactivo) {
                                
                                for ($ind_activos=0; $ind_activos < count($id_assets) ; $ind_activos++) { 
                                    if($id_assets[$ind_activos]==$current_ot->idactivo)
                                        break;
                                }
                                if($ind_activos==count($id_assets)){
                                    $id_assets[$ind_activos] = $current_ot->idactivo;
                                    $name_assets[$ind_activos] = Activo::find($current_ot->idactivo)->codigo_patrimonial;
                                }                      

                                $last_id_assets=$current_ot->idactivo;

                                $data_procces[$data_chart['num_months']][$ind_activos]['id']=$current_ot->idactivo;
                                $data_procces[$data_chart['num_months']][$ind_activos]['minutes']=0;//Inicializando en cero
                                                
                            }
                            $ot_star = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->fecha_inicio_ejecucion);                                
                            $ot_end = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->fecha_termino_ejecucion);
                            $data_procces[$data_chart['num_months']][$ind_activos]['minutes']+=$ot_star->diffInMinutes($ot_end);                           
                        }
                    }
                     $date_start_c->addMonth();
                }
            //Adding months
           
        }


         
         
         $data_chart['labels']=json_encode($name_assets);
        $data_chart['data']['percentage']=[];
        for ($i=1; $i <= $data_chart['num_months'] ; $i++) { 
            if (!is_null($data_procces[$i])) {
                for ($j=0; $j < count($id_assets) ; $j++) {


                    if(array_key_exists($j,$data_procces[$i]))
                    {
                        $data_chart['data']['percentage'][$i][$j]=($data_procces[$i][$j]['minutes']/($count_month[$i]*1440))*100;
                        $data_chart['data']['hours'][$i][$j]= $count_month[$i]-$data_chart['data']['percentage'][$i][$j]*($count_month[$i]*24/100);
                    }else{
                        $data_chart['data']['percentage'][$i][$j]=0;
                        $data_chart['data']['hours'][$i][$j]=0;
                    }                    
                }
            }else{
                for ($j=0; $j < count($id_assets) ; $j++) {
                    $data_chart['data']['percentage'][$i][$j]=0;
                    $data_chart['data']['hours'][$i][$j]=0;
                }
            }
        }

        
        $data_chart['data']=json_encode($data_chart['data']);

        echo dd($data_chart);

        $data=[
            'page_name' => "Indicador de ejecución",//nombre de la p'agina
            'siderbar_type' => "execute",//Tipo de siderbar que se requere desplegar
            'method' => "post",//M'etodo que se esta ejecutando
            'url_post' => "disponibilidad_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Indicador de Disponibilidad",
            'chart' => 'true',
            'chart_model' => 'execute.time.1',
            'chart_title' => 'Disponibilidad',
            'data_chart' => $data_chart,
            ];

        return view('indicators.execute.1',compact('data'));
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

        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        
        $grupo = $request->search_grupo;
        $servicio = $request ->search_servicio;

        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();

        echo $date_start_c;
        echo $date_end_c;
        $data_chart['year_beg']=$date_start_c->year;
        $data_chart['year_end']=$date_end_c->year;
        $data_chart['month_beg']=1;
        $data_chart['month_end']=4;


        //->toDateTimeString();
        $data_chart['num_months']=0;
        $data_procces=array();//Array que contiene la data a procesar
        $id_assets=array();//contiene las ids de los activos
        $name_assets=array();//contiene las ids de los activos
        $count_month=array();//d'ias de un mes

        $existFilter=0;

        if($grupo != 0 && $servicio == 0){
            $existFilter=1;

        }
        elseif ($servicio != 0 && $grupo == 0) {
            $existFilter=2;
        }

        echo $existFilter;

        $otCorrectivos=null;
        $OtPreventivos=null;


        $countGroup =4;
        $indGroup=1;
        while($indGroup<=$countGroup)
        {

            

            $data_chart['num_months']++;
            $data_procces[$data_chart['num_months']]=null;

            //Preparing 
            $end_current_month = $date_start_c->copy()->endOfMonth();
            $count_month[$data_chart['num_months']]=$end_current_month->day;

            if($existFilter==1){
                    $otCorrectivos = DB::table('ot_correctivos')
                             ->distinct()
                             ->join('activos', function($join)
                                 {
                                     $join->on('ot_correctivos.idactivo', '=', 'activos.idactivo');
                                     
                                 })
                             ->where('activos.idgrupo', '=', $indGroup)
                             ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                             ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                             ->get();

                    $OtPreventivos = DB::table('ot_preventivos')
                             ->distinct()
                             ->join('activos', function($join)
                                 {
                                     $join->on('ot_preventivos.idactivo', '=', 'activos.idactivo');
                                     
                                 })
                             ->where('activos.idgrupo', '=', $indGroup)
                             ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                             ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                             ->get();
            }
          /*  elseif ($existFilter==2) {

                $otCorrectivos=OtCorrectivo::withTrashed()
                ->where('idservicio','=',$servicio)
                ->where('fecha_inicio_ejecucion','>=',$date_start_c)
                ->where('fecha_termino_ejecucion','<=',$date_end_c)
                ->orderBy('idot_correctivo','DESC')->get();

                $OtPreventivos=OtPreventivo::withTrashed()
                ->where('idservicio','=',$servicio)
                ->where('fecha_inicio_ejecucion','>=',$date_start_c)
                ->where('fecha_termino_ejecucion','<=',$date_end_c)
                ->orderBy('idot_preventivo','DESC')->get();
            }*/
            
            
            

            $ots_array[0]=$otCorrectivos;
            $ots_array[1]=$OtPreventivos;



             if($otCorrectivos!=null || $OtPreventivos!=null){
                     $temp= DB::table('grupos')->where('grupos.idgrupo','=',$indGroup)->first();
                     $name_assets[$indGroup-1] =$temp->nombre;

                    foreach ($ots_array as $ots_collection) {
                        $last_id_assets = -1;//Activo
                        $ind_activos=-1;//Indice de activos para el array de datos 
                        //primero busca en otcorrectivos y luego en otpreventivos
                         


                        foreach ($ots_collection as $current_ot)
                        {
                            if ($last_id_assets!=$current_ot->idactivo) {
                                
                                                  

                                $last_id_assets=$current_ot->idactivo;
                                

                                $data_procces[$data_chart['num_months']][$indGroup-1]['id']=$current_ot->idactivo;
                                $data_procces[$data_chart['num_months']][$indGroup-1]['minutes']=0;//Inicializando en cero
                                $data_procces[$data_chart['num_months']][$indGroup-1]['cantidadActivos']=count($ots_collection);
                                                
                            }
                            $ot_star = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->fecha_inicio_ejecucion);                                
                            $ot_end = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->fecha_termino_ejecucion);
                          
                            $data_procces[$data_chart['num_months']][$indGroup-1]['minutes']+=$ot_star->diffInMinutes($ot_end);  
                                               
                        }
                    }
                    //Adding months
                    $indGroup++;
            }

          
        }

        
        echo dd($data_procces);
        $data_chart['labels']=json_encode($name_assets);
        $data_chart['data']['percentage']=[];
        for ($i=1; $i <= $data_chart['num_months'] ; $i++) { 
            if (!is_null($data_procces[$i])) {
                for ($j=0; $j < count($countGroup) ; $j++) {


                    if(array_key_exists($j,$data_procces[$i]))
                    {
                        $data_chart['data']['percentage'][$i][$j]=$data_procces[$i][$j]['minutes']/$count_month[$i];
                        $data_chart['data']['hours'][$i][$j]=$data_procces[$i][$j]['minutes']/60;
                    }else{
                        $data_chart['data']['percentage'][$i][$j]=[];
                        $data_chart['data']['percentage'][$i][$j]=0;
                        $data_chart['data']['hours'][$i][$j]=0;
                    }                    
                }
            }else{
                for ($j=0; $j < count($countGroup) ; $j++) {
                    $data_chart['data']['percentage'][$i][$j]=[];
                    $data_chart['data']['percentage'][$i][$j]=0;
                    $data_chart['data']['hours'][$i][$j]=0;
                }
            }
        }


       
        $data_chart['data']=json_encode($data_chart['data']);

       // echo dd($data_chart);
        
        $data=[
            'page_name' => "Indicador de ejecución",//nombre de la p'agina
            'siderbar_type' => "execute",//Tipo de siderbar que se requere desplegar
            'method' => "post",//M'etodo que se esta ejecutando
            'url_post' => "disponibilidad_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Indicador de Disponibilidad",
            'chart' => 'true',
            'chart_model' => 'execute.time.1',
            'chart_title' => 'Disponibilidad total',
            'data_chart' => $data_chart,
            ];

        return view('indicators.execute.1',compact('data'));
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

        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $codPatrimonio=null;
        $numSerie=null;
        $modelo=null;
        $codPatrimonio =$request->search_codigo_patrimonial;
        $numSerie= $request->search_numero_serie;
        $modelo= $request->search_modelo;
        

        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();


        $data_chart=null;
        $data_chart['year_beg']=$date_start_c->year;
        $data_chart['year_end']=$date_end_c->year;
        $data_chart['month_beg']=$date_start_c->month;
        $data_chart['month_end']=$date_end_c->month;

        //->toDateTimeString();
        $data_chart['num_months']=0;
        $data_procces=array();//Array que contiene la data a procesar
        $id_assets=array();//contiene las ids de los activos
        $name_assets=array();//contiene las ids de los activos
        $count_month=array();//d'ias de un mes
        
        $validaCodigoPatrimonio=null;
        $validaNumeroSerie=null;
        $validaCodigoModelo=null;

                 if($codPatrimonio != null){
                         $validaCodigoPatrimonio = Activo::where('codigo_patrimonial', '=', $codPatrimonio)->first();
                            
                 }elseif ($numSerie!=null) {
                         $validaNumeroSerie = Activo::where('numero_serie', '=', $numSerie)->first();
                            
                 }elseif ($modelo!=null) {
                        $validaCodigoModelo = Activo::where('idmodelo_equipo', '=', $modelo)->first();
                            
                }

        
        $otCorrectivos=null;
        $OtPreventivos=null;

        while($date_start_c<$date_end_c)
        {
            $data_chart['num_months']++;
            $data_procces[$data_chart['num_months']]=null;

            //Preparing 
            $end_current_month = $date_start_c->copy()->endOfMonth();
            //cantidad de dias de mes
            $count_month[$data_chart['num_months']]=$end_current_month->day;

            

                    if($validaCodigoPatrimonio != null){
                             $otCorrectivos = OtCorrectivo::withTrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoPatrimonio->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                             $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoPatrimonio->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                             
                    }
                    elseif ($validaNumeroSerie!=null) {
                             $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaNumeroSerie->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                             $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaNumeroSerie->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                            
                            
                    }elseif ($validaCodigoModelo!=null) {
                             $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoModelo->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                             $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoModelo->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                                
                            
                    }
                    else{
                            $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->orderBy('idot_correctivo', 'DESC')->get();
                            $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->orderBy('idot_preventivo', 'DESC')->get();       
                    }

          

             

          
                $ots_array[0]=$otCorrectivos;
                $ots_array[1]=$OtPreventivos;

                if($otCorrectivos!=null || $OtPreventivos!=null){
                    foreach ($ots_array as $ots_collection) {
                        $last_id_assets = -1;//Activo
                        $ind_activos=-1;//Indice de activos para el array de datos 
                        foreach ($ots_collection as $current_ot)
                        {
                            if ($last_id_assets!=$current_ot->idactivo) {
                                
                                for ($ind_activos=0; $ind_activos < count($id_assets) ; $ind_activos++) { 
                                    if($id_assets[$ind_activos]==$current_ot->idactivo)
                                        break;
                                }
                                if($ind_activos==count($id_assets)){
                                    $id_assets[$ind_activos] = $current_ot->idactivo;
                                    $name_assets[$ind_activos] = Activo::find($current_ot->idactivo)->codigo_patrimonial;
                                }                      

                                $last_id_assets=$current_ot->idactivo;

                                $data_procces[$data_chart['num_months']][$ind_activos]['id']=$current_ot->idactivo;
                                $data_procces[$data_chart['num_months']][$ind_activos]['minutes']=0;//Inicializando en cero
                                                
                            }
                            $ot_star = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->fecha_inicio_ejecucion);                                
                            $ot_end = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->fecha_termino_ejecucion);
                            $data_procces[$data_chart['num_months']][$ind_activos]['minutes']+=$ot_star->diffInMinutes($ot_end);                           
                        }
                    }
                     $date_start_c->addMonth();
                }
            //Adding months
           
        }


         
         
         $data_chart['labels']=json_encode($name_assets);
        $data_chart['data']['percentage']=[];
        for ($i=1; $i <= $data_chart['num_months'] ; $i++) { 
            if (!is_null($data_procces[$i])) {
                for ($j=0; $j < count($id_assets) ; $j++) {


                    if(array_key_exists($j,$data_procces[$i]))
                    {
                        $data_chart['data']['percentage'][$i][$j]=100-($data_procces[$i][$j]['minutes']/($count_month[$i]*1440))*100;
                        $data_chart['data']['hours'][$i][$j]= $count_month[$i]*24-$data_chart['data']['percentage'][$i][$j]*($count_month[$i]*24/100);
                    }else{
                        $data_chart['data']['percentage'][$i][$j]=100;
                        $data_chart['data']['hours'][$i][$j]=$count_month[$i]*24;
                    }                    
                }
            }else{
                for ($j=0; $j < count($id_assets) ; $j++) {
                    $data_chart['data']['percentage'][$i][$j]=100;
                    $data_chart['data']['hours'][$i][$j]=$count_month[$i]*24;
                }
            }
        }
        
        $data_chart['data']=json_encode($data_chart['data']);       

        $data=[
            'page_name' => "Indicador de ejecución",//nombre de la p'agina
            'siderbar_type' => "execute",//Tipo de siderbar que se requere desplegar
            'method' => "post",//M'etodo que se esta ejecutando
            'url_post' => "disponibilidad_por_averia_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Indicador de Disponibilidad",
            'chart' => 'true',
            'chart_model' => 'execute.time.1',
            'chart_title' => 'Disponibilidad por averías',
            'data_chart' => $data_chart,
            ];

        //print_r($data_chart);
        
        return view('indicators.execute.1',compact('data')); 
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

        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;
        $codPatrimonio=null;
        $numSerie=null;
        $modelo=null;
        $codPatrimonio =$request->search_codigo_patrimonial;
        $numSerie= $request->search_numero_serie;
        $modelo= $request->search_modelo;
        

        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();


        $data_chart=null;
        $data_chart['year_beg']=$date_start_c->year;
        $data_chart['year_end']=$date_end_c->year;
        $data_chart['month_beg']=$date_start_c->month;
        $data_chart['month_end']=$date_end_c->month;

        //->toDateTimeString();
        $data_chart['num_months']=0;
        $data_procces=array();//Array que contiene la data a procesar
        $id_assets=array();//contiene las ids de los activos
        $name_assets=array();//contiene las ids de los activos
        $count_month=array();//d'ias de un mes
        
        $validaCodigoPatrimonio=null;
        $validaNumeroSerie=null;
        $validaCodigoModelo=null;

                 if($codPatrimonio != null){
                         $validaCodigoPatrimonio = Activo::where('codigo_patrimonial', '=', $codPatrimonio)->first();
                            
                 }elseif ($numSerie!=null) {
                         $validaNumeroSerie = Activo::where('numero_serie', '=', $numSerie)->first();
                            
                 }elseif ($modelo!=null) {
                        $validaCodigoModelo = Activo::where('idmodelo_equipo', '=', $modelo)->first();
                            
                }

        
        $otCorrectivos=null;
        $OtPreventivos=null;

        while($date_start_c<$date_end_c)
        {
            $data_chart['num_months']++;
            $data_procces[$data_chart['num_months']]=null;

            //Preparing 
            $end_current_month = $date_start_c->copy()->endOfMonth();
            //cantidad de dias de mes
            $count_month[$data_chart['num_months']]=$end_current_month->day;

            

                    if($validaCodigoPatrimonio != null){
                             $otCorrectivos = OtCorrectivo::withTrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoPatrimonio->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                             $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoPatrimonio->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                             
                    }
                    elseif ($validaNumeroSerie!=null) {
                             $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaNumeroSerie->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                             $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaNumeroSerie->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                            
                            
                    }elseif ($validaCodigoModelo!=null) {
                             $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoModelo->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                             $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoModelo->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                                
                            
                    }
                    else{
                            $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->orderBy('idot_correctivo', 'DESC')->get();
                            $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->orderBy('idot_preventivo', 'DESC')->get();       
                    }

          

             

          
                $ots_array[0]=$otCorrectivos;
                $ots_array[1]=$OtPreventivos;

                if($otCorrectivos!=null || $OtPreventivos!=null){
                    foreach ($ots_array as $ots_collection) {
                        $last_id_assets = -1;//Activo
                        $ind_activos=-1;//Indice de activos para el array de datos 
                        foreach ($ots_collection as $current_ot)
                        {
                            if ($last_id_assets!=$current_ot->idactivo) {
                                
                                for ($ind_activos=0; $ind_activos < count($id_assets) ; $ind_activos++) { 
                                    if($id_assets[$ind_activos]==$current_ot->idactivo)
                                        break;
                                }
                                if($ind_activos==count($id_assets)){
                                    $id_assets[$ind_activos] = $current_ot->idactivo;
                                    $name_assets[$ind_activos] = Activo::find($current_ot->idactivo)->codigo_patrimonial;
                                }                      

                                $last_id_assets=$current_ot->idactivo;

                                $data_procces[$data_chart['num_months']][$ind_activos]['id']=$current_ot->idactivo;
                                $data_procces[$data_chart['num_months']][$ind_activos]['minutes']=0;//Inicializando en cero
                                                
                            }
                            $ot_star = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->fecha_inicio_ejecucion);                                
                            $ot_end = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->fecha_termino_ejecucion);
                            $data_procces[$data_chart['num_months']][$ind_activos]['minutes']+=$ot_star->diffInMinutes($ot_end);                           
                        }
                    }
                     $date_start_c->addMonth();
                }
            //Adding months
           
        }


       //echo dd($data_procces);

  
         $data_chart['labels']=json_encode($name_assets);
        $data_chart['data']['percentage']=[];
        for ($i=1; $i <= $data_chart['num_months'] ; $i++) { 
            if (!is_null($data_procces[$i])) {
                for ($j=0; $j < count($id_assets) ; $j++) {


                    if(array_key_exists($j,$data_procces[$i]))
                    {
                        $data_chart['data']['percentage'][$i][$j]=($data_procces[$i][$j]['minutes']/($count_month[$i]*1440))*100;
                        $data_chart['data']['hours'][$i][$j]=$count_month[$i]*24/(1+ $data_chart['data']['percentage'][$i][$j]);
                    }else{
                        $data_chart['data']['percentage'][$i][$j]=100;
                        $data_chart['data']['hours'][$i][$j]=$count_month[$i]*24;
                    }                    
                }
            }else{
                for ($j=0; $j < count($id_assets) ; $j++) {
                    $data_chart['data']['percentage'][$i][$j]=100;
                    $data_chart['data']['hours'][$i][$j]=$count_month[$i]*24;
                }
            }
        }

        
        $data_chart['data']=json_encode($data_chart['data']);

        

        $data=[
            'page_name' => "Indicador de ejecución",//nombre de la p'agina
            'siderbar_type' => "execute",//Tipo de siderbar que se requere desplegar
            'method' => "post",//M'etodo que se esta ejecutando
            'url_post' => "disponibilidad_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Indicador de Disponibilidad",
            'chart' => 'true',
            'chart_model' => 'execute.time.1',
            'chart_title' => 'Tiempo medio por Averia',
            'data_chart' => $data_chart,
            ];

        return view('indicators.execute.2',compact('data')); 
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

                $fechamin = $request->search_fecha_ini;
         $fechamax = $request->search_fecha_fin;
         $codPatrimonio=null;
         $numSerie=null;
         $modelo=null;
         $codPatrimonio =$request->search_codigo_patrimonial;
         $numSerie= $request->search_numero_serie;
         $modelo= $request->search_modelo;
         
 
         echo $numSerie;
 
         $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
         $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();
 
 
         $data_chart=null;
         $data_chart['year_beg']=$date_start_c->year;
         $data_chart['year_end']=$date_end_c->year;
         $data_chart['month_beg']=$date_start_c->month;
         $data_chart['month_end']=$date_end_c->month;
 
         //->toDateTimeString();
         $data_chart['num_months']=0;
         $data_procces=array();//Array que contiene la data a procesar
         $id_assets=array();//contiene las ids de los activos
         $name_assets=array();//contiene las ids de los activos
         $count_month=array();//d'ias de un mes
         
         $validaCodigoPatrimonio=null;
         $validaNumeroSerie=null;
         $validaCodigoModelo=null;
 
                  if($codPatrimonio != null){
                          $validaCodigoPatrimonio = Activo::where('codigo_patrimonial', '=', $codPatrimonio)->first();
                             
                  }elseif ($numSerie!=null) {
                          $validaNumeroSerie = Activo::where('numero_serie', '=', $numSerie)->first();
                             
                  }elseif ($modelo!=null) {
                         $validaCodigoModelo = Activo::where('idmodelo_equipo', '=', $modelo)->first();
                             
                 }
 
         
         $otCorrectivos=null;
         $OtPreventivos=null;
 
         while($date_start_c<$date_end_c)
         {
             $data_chart['num_months']++;
             $data_procces[$data_chart['num_months']]=null;
 
             //Preparing 
             $end_current_month = $date_start_c->copy()->endOfMonth();
             //cantidad de dias de mes
             $count_month[$data_chart['num_months']]=$end_current_month->day;
 
             
 
                     if($validaCodigoPatrimonio != null){
                              $otCorrectivos = OtCorrectivo::withTrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoPatrimonio->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                              $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoPatrimonio->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                              
                     }
                     elseif ($validaNumeroSerie!=null) {
                              $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaNumeroSerie->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                              $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaNumeroSerie->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                             
                             
                     }elseif ($validaCodigoModelo!=null) {
                              $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoModelo->idactivo)->orderBy('idot_correctivo', 'DESC')->get();
                              $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->where('idactivo','=',$validaCodigoModelo->idactivo)->orderBy('idot_preventivo', 'DESC')->get();       
                                 
                             
                     }
                     else{
                             $otCorrectivos = OtCorrectivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->orderBy('idot_correctivo', 'DESC')->get();
                             $OtPreventivos = OtPreventivo::withtrashed()->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$end_current_month)->orderBy('idot_preventivo', 'DESC')->get();       
                     }
 
           
 
              
 
           
                 $ots_array[0]=$otCorrectivos;
                 $ots_array[1]=$OtPreventivos;
 
                 if($otCorrectivos!=null || $OtPreventivos!=null){
                     foreach ($ots_array as $ots_collection) {
                         $last_id_assets = -1;//Activo
                         $ind_activos=-1;//Indice de activos para el array de datos 
                         foreach ($ots_collection as $current_ot)
                         {
                             if ($last_id_assets!=$current_ot->idactivo) {
                                 
                                 for ($ind_activos=0; $ind_activos < count($id_assets) ; $ind_activos++) { 
                                     if($id_assets[$ind_activos]==$current_ot->idactivo)
                                         break;
                                 }
                                 if($ind_activos==count($id_assets)){
                                     $id_assets[$ind_activos] = $current_ot->idactivo;
                                     $name_assets[$ind_activos] = Activo::find($current_ot->idactivo)->codigo_patrimonial;
                                 }                      
 
                                 $last_id_assets=$current_ot->idactivo;
 
                                 $data_procces[$data_chart['num_months']][$ind_activos]['id']=$current_ot->idactivo;
                                 $data_procces[$data_chart['num_months']][$ind_activos]['minutes']=0;//Inicializando en cero
                                                 
                             }
                             $ot_created = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->created_at);                                
                             $ot_end = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->fecha_termino_ejecucion);
                             $data_procces[$data_chart['num_months']][$ind_activos]['minutes']+=$ot_created->diffInMinutes($ot_end);                           
                         }
                     }
                      $date_start_c->addMonth();
                 }
             //Adding months
            
         }

         // echo dd($data_procces);


            $data_chart['labels']=json_encode($name_assets);
         $data_chart['data']['percentage']=[];
         for ($i=1; $i <= $data_chart['num_months'] ; $i++) { 
             if (!is_null($data_procces[$i])) {
                    for ($j=0; $j < count($id_assets); $j++) {
                         if(array_key_exists($j,$data_procces[$i]))
                     {
                        $data_chart['data']['percentage'][$i][$j]=($data_procces[$i][$j]['minutes']/60)/count($data_procces[$i][$j]);
                        $data_chart['data']['hours'][$i][$j]=$data_procces[$i][$j]['minutes']/60;
                        }else{
                         $data_chart['data']['percentage'][$i][$j]=0;
                         $data_chart['data']['hours'][$i][$j]=0;
                     }                    
                 }
             }else{
                 for ($j=0; $j < count($id_assets) ; $j++) {
                    $data_chart['data']['percentage'][$i][$j]=0;
                     $data_chart['data']['hours'][$i][$j]=0;
                 }
             }
         }
 
          $data_chart['data']=json_encode($data_chart['data']);

          //echo dd($data_chart);

           $data=[
             'page_name' => "Indicador medio de atención SOT",
             'siderbar_type' => "execute",
             'method' => "get",
             'url_post' => "tiempo_medio_de_atención_de_sot_rep",//url post al que apunta el formulario de rangos de fecha
             'report_name' => "Indicador de tiempo medio de atención SOT",
             'chart' => 'false',
             'chart_model' => 'execute.time.1',
             'chart_title' => 'Tiempo medio de Atención de SOT',
             'data_chart' => $data_chart,
             ];
 
         return view('indicators.execute.3',compact('data')); 
     }

    public function e_6_post(Request $request) {
              /*Validator section*/
        $validator = Validator::make($request->all(),$this->getValidations(true));

        if ($validator->fails()) {
            return redirect('disponibilidad')->withErrors($validator)->withInput();
        }

        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;

        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();

        $data_chart=null;
        $data_chart['year_beg']=$date_start_c->year;
        $data_chart['year_end']=$date_end_c->year;
        $data_chart['month_beg']=$date_start_c->month;
        $data_chart['month_end']=$date_end_c->month;

        //->toDateTimeString();
        $data_chart['num_months']=0;
        $data_procces=array();//Array que contiene la data a procesar
        $id_assets=array();//contiene las ids de los activos
        $name_assets=array();//contiene las ids de los activos
        $count_month=array();//d'ias de un mes
                
        $otCorrectivos=null;
        $otPreventivos=null;

        $services_aux = Servicio::all();
        $i=0;
        foreach($services_aux as $s) {
            $i++;
            $nombresServicios[$i] = $s->nombre;
            $idServicios[$i] = $s->idServicio;
        }
        
        $data_chart['nombresServicios'] = $nombresServicios;
        $data_chart['idServicios'] = $idServicios;                
        
        echo " fecha de inicio ".$date_start_c;
        echo " fecha de fin ".$date_end_c;
        
        //while($date_start_c<$date_end_c) {
            
            $data_chart['num_months']++;
            //$data_procces[$data_chart['num_months']]=null;

            //Preparing 
            
            $end_current_month = $date_start_c->copy()->endOfMonth();
            echo "fin de mes: ".$end_current_month."<br>";
            //cantidad de dias de mes
            $count_month[$data_chart['num_months']]=$end_current_month->day;

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
            
            $idPreventivos = array();
            $nombrePreventivos = array();
            $preventivos = array();
            echo "numero de meses ";  
            $i=0;
            foreach ($otCorrectivos as $o) {
                $i++;
                $idCorrectivos[$i]=$o->idservicio;
                $nombreCorrectivos[$i]=$o->nombre;
                $correctivos[$i]=$o->correctivo;
                //echo " ".$o->idservicio." ".$o->nombre. " ".$o->correctivo."<br>";
            }
            $i=0;
            foreach ($otPreventivos as $o) {
                $i++;
                $idPreventivos[$i]=$o->idservicio;
                $nombrePreventivos[$i]=$o->nombre;
                $preventivos[$i]=$o->preventivo;                
                //echo " ".$o->idservicio." ".$o->nombre. " ".$o->preventivo."<br>";
            }
            
            $data_chart['idCorrectivos']=$idCorrectivos;
            $data_chart['nombreCorrectivos']=$nombreCorrectivos;
            $data_chart['correctivos']=$correctivos;
            $data_chart['idPreventivos']=$idPreventivos;
            $data_chart['nombrePreventivos']=$nombrePreventivos;
            $data_chart['preventivos']=$preventivos;
                    
            //$ots_array[0]=$otCorrectivos;
            //$ots_array[1]=$otPreventivos;            
            $date_start_c->addMonth();
        //}
        echo " ots ";
        print_r($ots_array);
        
        $data=[
            'page_name' => "Número de OTM generados",//nombre de la p'agina
            'siderbar_type' => "execute",//Tipo de siderbar que se requere desplegar
            'method' => "get",//M'etodo que se esta ejecutando
            'url_post' => "numero_otm_generados_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Número de OTM generados",
            'chart' => 'true',
            'chart_model' => 'execute.time.1',
            'chart_title' => 'Número de OTM generados',
            'data_chart' => $data_chart,
        ];
        
        return view('indicators.execute.6',compact('data'));
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


        $data_chart=null;
        $data_chart['year_beg']=$date_start_c->year;
        $data_chart['year_end']=$date_end_c->year;
        $data_chart['month_beg']=$date_start_c->month;
        $data_chart['month_end']=$date_end_c->month;

        //->toDateTimeString();
        $data_chart['num_months']=0;
        $data_procces=array();//Array que contiene la data a procesar
        $id_assets=array();//contiene las ids de los activos
        $name_assets=array();//contiene las ids de los activos
        $count_month=array();//d'ias de un mes
        
        
        $otCorrectivos=null;
        $OtPreventivos=null;

        while($date_start_c<$date_end_c)
        {
            echo $date_start_c;
            echo $date_end_c;
            $data_chart['num_months']++;
            $data_procces[$data_chart['num_months']]=null;

            //Preparing 
            $end_current_month = $date_start_c->copy()->endOfMonth();
            //cantidad de dias de mes
            $count_month[$data_chart['num_months']]=$end_current_month->day;


            $otCorrectivos = DB::table('servicios')
                             ->select(array('servicios.nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $end_current_month)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

              $OtPreventivos = DB::table('servicios')
                             ->select(array('servicios.nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                             ->leftJoin('ot_preventivos', function($join)
                                 {
                                     $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_preventivos.fecha_termino_ejecucion','<=', $end_current_month)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

             $ots_array[0]=$otCorrectivos;
             $ots_array[1]=$OtPreventivos;
            
            $date_start_c->addMonth();

        }

        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
            'url_post' => "numero_otm_acabados_rep",//url post al que apunta el formulario de rangos de fecha
            'report_name' => "Número de OTM acabados",
            'chart' => 'true',
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_8_post(Request $request)
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


        $data_chart=null;
        $data_chart['year_beg']=$date_start_c->year;
        $data_chart['year_end']=$date_end_c->year;
        $data_chart['month_beg']=$date_start_c->month;
        $data_chart['month_end']=$date_end_c->month;

        //->toDateTimeString();
        $data_chart['num_months']=0;
        $data_procces=array();//Array que contiene la data a procesar
        $id_assets=array();//contiene las ids de los activos
        $name_assets=array();//contiene las ids de los activos
        $count_month=array();//d'ias de un mes
        
        
        $otCorrectivos=null;
        $OtPreventivos=null;

        while($date_start_c<$date_end_c)
        {
            echo $date_start_c;
            echo $date_end_c;
            $data_chart['num_months']++;
            $data_procces[$data_chart['num_months']]=null;

            //Preparing 
            $end_current_month = $date_start_c->copy()->endOfMonth();
            //cantidad de dias de mes
            $count_month[$data_chart['num_months']]=$end_current_month->day;


            $otCorrectivos = DB::table('servicios')
                             ->select(array('servicios.nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $end_current_month)
                                ->whereNull('ot_correctivos.idestado_final')
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

              $OtPreventivos = DB::table('servicios')
                             ->select(array('servicios.nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                             ->leftJoin('ot_preventivos', function($join)
                                 {
                                     $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_preventivos.fecha_termino_ejecucion','<=', $end_current_month)
                                ->whereNull('ot_preventivos.idestado_final') //deberia ser No activo pero no hay en BD
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

             $ots_array[0]=$otCorrectivos;
             $ots_array[1]=$OtPreventivos;
            
            $date_start_c->addMonth();

        }


         $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
            'url_post' => "numero_otm_pendiente_rep",// Ot No atendido
            'report_name' => "Número de OTM no atendido",
            'chart' => 'true',
        ];


        return view('indicators.execute.1',compact('data'));
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


        $data_chart=null;
        $data_chart['year_beg']=$date_start_c->year;
        $data_chart['year_end']=$date_end_c->year;
        $data_chart['month_beg']=$date_start_c->month;
        $data_chart['month_end']=$date_end_c->month;

        //->toDateTimeString();
        $data_chart['num_months']=0;
        $data_procces=array();//Array que contiene la data a procesar
        $id_assets=array();//contiene las ids de los activos
        $name_assets=array();//contiene las ids de los activos
        $count_month=array();//d'ias de un mes
        
        
        $otCorrectivos=null;
        $OtPreventivos=null;

        while($date_start_c<$date_end_c)
        {
            echo $date_start_c;
            echo $date_end_c;
            $data_chart['num_months']++;
            $data_procces[$data_chart['num_months']]=null;

            //Preparing 
            $end_current_month = $date_start_c->copy()->endOfMonth();
            //cantidad de dias de mes
            $count_month[$data_chart['num_months']]=$end_current_month->day;


            $otCorrectivos = DB::table('servicios')
                             ->select(array('servicios.nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)       
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $end_current_month)
                                ->where('ot_correctivos.idestado_final','=',9)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

              $OtPreventivos = DB::table('servicios')
                             ->select(array('servicios.nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                             ->leftJoin('ot_preventivos', function($join)
                                 {
                                     $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)  
                                ->where('ot_preventivos.fecha_termino_ejecucion','<=', $end_current_month)
                                ->where('ot_preventivos.idestado_final','=',9)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

             $ots_array[0]=$otCorrectivos;
             $ots_array[1]=$OtPreventivos;
            
            $date_start_c->addMonth();

        }


        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
            'url_post' => "numero_de_otm_no_atendido_rep",// Ot Pendiente
            'report_name' => "Número de OTM Pendiente",
            'chart' => 'true',
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_10_post(Request $request)
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


        $data_chart=null;
        $data_chart['year_beg']=$date_start_c->year;
        $data_chart['year_end']=$date_end_c->year;
        $data_chart['month_beg']=$date_start_c->month;
        $data_chart['month_end']=$date_end_c->month;

        //->toDateTimeString();
        $data_chart['num_months']=0;
        $data_procces=array();//Array que contiene la data a procesar
        $id_assets=array();//contiene las ids de los activos
        $name_assets=array();//contiene las ids de los activos
        $count_month=array();//d'ias de un mes
        
        
        $otCorrectivos=null;
        $OtPreventivos=null;

        while($date_start_c<$date_end_c)
        {
            echo $date_start_c;
            echo $date_end_c;
            $data_chart['num_months']++;
            $data_procces[$data_chart['num_months']]=null;

            //Preparing 
            $end_current_month = $date_start_c->copy()->endOfMonth();
            //cantidad de dias de mes
            $count_month[$data_chart['num_months']]=$end_current_month->day;


            $otCorrectivos = DB::table('servicios')
                             ->select(array('servicios.nombre', DB::raw('COUNT(ot_correctivos.idsolicitud_orden_trabajo) as ordenDeTrabajo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $end_current_month)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();

           
            echo dd($otCorrectivos);

             $ots_array[0]=$otCorrectivos;
             $ots_array[1]=$OtPreventivos;
            
            $date_start_c->addMonth();

        }


        $data=[
           'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "get",
            'url_post' => "solicitudes_de_trabajo_generados_rep",// Ot Pendiente
            'report_name' => "Número de trabajos generados",
            'chart' => 'true',
        ];
        return view('indicators.execute.1',compact('data'));
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


        $data_chart=null;
        $data_chart['year_beg']=$date_start_c->year;
        $data_chart['year_end']=$date_end_c->year;
        $data_chart['month_beg']=$date_start_c->month;
        $data_chart['month_end']=$date_end_c->month;

        //->toDateTimeString();
        $data_chart['num_months']=0;
        $data_procces=array();//Array que contiene la data a procesar
        $id_assets=array();//contiene las ids de los activos
        $name_assets=array();//contiene las ids de los activos
        $count_month=array();//d'ias de un mes
        
        
        $otCorrectivos=null;
        $OtPreventivos=null;

        while($date_start_c<$date_end_c)
        {
            echo $date_start_c;
            echo $date_end_c;
            $data_chart['num_months']++;
            $data_procces[$data_chart['num_months']]=null;

            //Preparing 
            $end_current_month = $date_start_c->copy()->endOfMonth();
            //cantidad de dias de mes
            $count_month[$data_chart['num_months']]=$end_current_month->day;


            $otCorrectivos = DB::table('servicios')
                             ->select(array('servicios.nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                             ->leftJoin('ot_correctivos', function($join)
                                 {
                                     $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_correctivos.fecha_termino_ejecucion','<=', $end_current_month)
                                ->where('ot_correctivos.idestado_final','=',19)
                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            $OtPreventivos = DB::table('servicios')
                             ->select(array('servicios.nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                             ->leftJoin('ot_preventivos', function($join)
                                 {
                                     $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');
                                  
                                 })
                                ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                                ->where('ot_preventivos.fecha_termino_ejecucion','<=', $end_current_month)
                                ->where('ot_preventivos.idestado_final','=',19)

                                ->groupby('servicios.nombre')
                                ->orderBy('servicios.nombre')
                                ->get();
            echo dd($otCorrectivos);

             $ots_array[0]=$otCorrectivos;
             $ots_array[1]=$OtPreventivos;
            
            $date_start_c->addMonth();

        }


        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "POST",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_12_post(Request $request)
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "POST",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_13_post(Request $request)
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "POST",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_14_post(Request $request)
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "POST",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_15_post(Request $request)
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "POST",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_16_post(Request $request)
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "POST",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_17_post(Request $request)
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "POST",
        ];

        return view('indicators.execute.1',compact('data'));
    }

    public function e_18_post(Request $request)
    {
        $data=[
            'page_name' => "Indicador de ejecución",
            'siderbar_type' => "execute",
            'method' => "POST",
        ];

        return view('indicators.execute.1',compact('data'));
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

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

class requestController extends Controller
{

	public function r_1()
    {   
    	$dataContainer = new dataContainer;
        $dataContainer->page_name = "Tipo de Requerimiento ";//nombre de la p'agin;
        $dataContainer->siderbar_type ="request";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="tipo_de_requerimiento_rep";
        $dataContainer->report_name="Tipo de Requerimiento";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }

    public function r_2()
    {   
    	$dataContainer = new dataContainer;
        $dataContainer->page_name = "Eficiencia de Cumplimiento de Pedido ";//nombre de la p'agin;
        $dataContainer->siderbar_type ="request";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eficiencia_de_cumplimiento_de_pedido_rep";
        $dataContainer->report_name="Eficiencia de Cumplimiento de Pedido";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }

    public function r_3()
    {   
    	$dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo Promedio de Compra ";//nombre de la p'agin;
        $dataContainer->siderbar_type ="request";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="tiempo_promedio_de_compra_rep";
        $dataContainer->report_name="Tiempo Promedio de Compra";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }

    public function r_4()
    {   
    	$dataContainer = new dataContainer;
        $dataContainer->page_name = "Consumo Real ";//nombre de la p'agin;
        $dataContainer->siderbar_type ="request";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="consumo_real_rep";
        $dataContainer->report_name="Consumo Real";
        $dataContainer->serial_number=false;
        $dataContainer->group=true;
        $dataContainer->service=true;

        return view('indicators.request.1',compact('dataContainer'));
    }

    public function r_5()
    {   
    	$dataContainer = new dataContainer;
        $dataContainer->page_name = "Porcentaje de Servicios que Experimentaron Desabastecimiento";//nombre de la p'agin;
        $dataContainer->siderbar_type ="request";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="porcentaje_de_servicios_que_experimentaron_desabastecimiento_rep";
        $dataContainer->report_name="Porcentaje de Servicios que Experimentaron Desabastecimiento";
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;

        return view('indicators.request.1',compact('dataContainer'));
    }


    public function r_1_post(Request $request)
    {
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
      

        
   
            
            //ALMACEN id tipo de compra 1(repuesto), 2(insumo), 3(accesorios) y 4 (equipo)

            

            
            $ARepuestos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',1)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();



            $AInsumos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',2)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

             $AAccesorios = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',3)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();


             $AEquipos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',4)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

            //COMPRA id tipo de compra 5(repuesto), 6 (insumo), 7 (accesorios) y 8 (equipo)

            $CRepuestos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',5)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

            $CInsumos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',6)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

            $CAccesorios = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',7)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();


            $CEquipos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',8)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();


         $servicios = Servicio::all();

                $data = array();
                $i=0;
                foreach($servicios as $ser) {
                    $i++;
                    $data[$i][1]=$ser->nombre;
                    //data de solicitudes de compra
                    $data[$i][2]=0;
                    $data[$i][3]=0;
                    $data[$i][4]=0;
                    $data[$i][5]=0;
                    $data[$i][6]=0;
                    $data[$i][7]=0;
                    $data[$i][8]=0;
                    $data[$i][9]=0;
                    foreach($ARepuestos as $ar) {                    
                        if ($ar->{'Codigo'}==$ser->idservicio) {
                            $data[$i][2] = $ar->{'TipoSolicitud'}; //correctivos
                            break;
                        }
                    }

                    foreach($AInsumos as $ai) {                    
                        if ($ai->{'Codigo'}==$ser->idservicio) {
                            $data[$i][3] = $ai->{'TipoSolicitud'}; //correctivos
                            break;
                        }
                    }

                    foreach($AAccesorios as $aa) {                    
                        if ($aa->{'Codigo'}==$ser->idservicio) {
                            $data[$i][4] = $aa->{'TipoSolicitud'}; //correctivos
                            break;
                        }
                    }

                    foreach($AEquipos as $ae) {                    
                        if ($ae->{'Codigo'}==$ser->idservicio) {
                            $data[$i][5] = $ae->{'TipoSolicitud'}; //correctivos
                            break;
                        }
                    }

                    //Compras
                    foreach($CRepuestos as $ar) {                    
                        if ($ar->{'Codigo'}==$ser->idservicio) {
                            $data[$i][6] = $ar->{'TipoSolicitud'}; //correctivos
                            break;
                        }
                    }

                    foreach($CInsumos as $ai) {                    
                        if ($ai->{'Codigo'}==$ser->idservicio) {
                            $data[$i][7] = $ai->{'TipoSolicitud'}; //correctivos
                            break;
                        }
                    }

                    foreach($CAccesorios as $aa) {                    
                        if ($aa->{'Codigo'}==$ser->idservicio) {
                            $data[$i][8] = $aa->{'TipoSolicitud'}; //correctivos
                            break;
                        }
                    }

                    foreach($CEquipos as $ae) {                    
                        if ($ae->{'Codigo'}==$ser->idservicio) {
                            $data[$i][9] = $ae->{'TipoSolicitud'}; //correctivos
                            break;
                        }
                    }


                }

      //print
         $data_table=$data;

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tipo de Requerimiento";//nombre de la p'agin;
        $dataContainer->siderbar_type = "request";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="tipo_de_requerimiento_rep";
        $dataContainer->report_name="Tipo de Requerimiento";
        $dataContainer->table=true;
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;
        $dataContainer->chart_title='Tipo de Requerimiento';
        $dataContainer->data_table=$data_table;
        
        return view('indicators.request.2',compact('dataContainer'));
             

    }


    public function r_2_post(Request $request){

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
      

        
   
            
            //ALMACEN id tipo de compra 1(repuesto), 2(insumo), 3(accesorios) y 4 (equipo)

            

            
            $ARepuestos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',1)
                                ->where('solicitud_compras.idestado','=',2 )
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

              $AInsumos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',2)
                                ->where('solicitud_compras.idestado','=',2 )
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

             $AAccesorios = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',3)
                                ->where('solicitud_compras.idestado','=',2 )
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();


             $AEquipos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',4)
                                ->where('solicitud_compras.idestado','=',2 )
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

            //COMPRA id tipo de compra 5(repuesto), 6 (insumo), 7 (accesorios) y 8 (equipo)

            $CRepuestos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',5)
                                ->where('solicitud_compras.idestado','=',2 )
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

            $CInsumos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',6)
                                ->where('solicitud_compras.idestado','=',2 )
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

            $CAccesorios = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',7)
                                ->where('solicitud_compras.idestado','=',2 )
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();


            $CEquipos = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',8)
                                ->where('solicitud_compras.idestado','=',2 )
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

            //***************all request*****************************************

              $ARepuestosT = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',1)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();



            $AInsumosT = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',2)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

             $AAccesoriosT = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',3)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();


             $AEquiposT = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',4)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

            //COMPRA id tipo de compra 5(repuesto), 6 (insumo), 7 (accesorios) y 8 (equipo)

            $CRepuestosT = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',5)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

            $CInsumosT = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',6)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();

            $CAccesoriosT = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',7)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();


            $CEquiposT = DB::table('solicitud_compras')
                             ->select(array('solicitud_compras.idservicio as Codigo', DB::raw('COUNT(solicitud_compras.idtipo_solicitud_compra) as TipoSolicitud')))
                                ->where('solicitud_compras.fecha','>=', $date_start_c)
                                ->where('solicitud_compras.fecha','<=', $date_end_c)
                                ->where('solicitud_compras.idtipo_solicitud_compra','=',8)
                                ->groupby('solicitud_compras.idservicio')
                                ->orderBy('solicitud_compras.idservicio')
                                ->get();


         $servicios = Servicio::all();

                $data = array();
                $i=0;
                foreach($servicios as $ser) {
                    $i++;
                    $data[$i][1]=$ser->nombre;
                    //data de solicitudes de compra
                    $data[$i][2]=100;
                    $data[$i][3]=100;
                    $data[$i][4]=100;
                    $data[$i][5]=100;
                    $data[$i][6]=100;
                    $data[$i][7]=100;
                    $data[$i][8]=100;
                    $data[$i][9]=100;

                    $dom=0;
                    foreach($ARepuestos as $ar) {                    
                        if ($ar->{'Codigo'}==$ser->idservicio) {
                            $data[$i][2] = $ar->{'TipoSolicitud'}; 
                            $dom=$data[$i][2];
                            break;
                        }
                    }

                    foreach($ARepuestosT as $ar) {                    
                        if ($ar->{'Codigo'}==$ser->idservicio) {
                            $data[$i][2] =100-($dom/($ar->{'TipoSolicitud'}))*100; 
                            break;
                        }
                    }

                    $dom=0;
                    foreach($AInsumos as $ai) {                    
                        if ($ai->{'Codigo'}==$ser->idservicio) {
                            $data[$i][3] = $ai->{'TipoSolicitud'};
                             $dom=$data[$i][3];
                            break;
                        }
                    }

                    
                    foreach($AInsumosT as $ai) {                    
                        if ($ai->{'Codigo'}==$ser->idservicio) {
                             $data[$i][3] =100-($dom/($ai->{'TipoSolicitud'}))*100; 
                            break;
                        }
                    }


                    $dom=0;
                    foreach($AAccesorios as $aa) {                    
                        if ($aa->{'Codigo'}==$ser->idservicio) {
                            $data[$i][4] = $aa->{'TipoSolicitud'};
                            $dom=$data[$i][4];
                            break;
                        }
                    }

                     
                    foreach($AAccesoriosT as $aa) {                    
                        if ($aa->{'Codigo'}==$ser->idservicio) {
                            $data[$i][4] =100-($dom/($aa->{'TipoSolicitud'}))*100; 
                            break;
                        }
                    }

                    $dom=0;
                    foreach($AEquipos as $ae) {                    
                        if ($ae->{'Codigo'}==$ser->idservicio) {
                            $data[$i][5] = $ae->{'TipoSolicitud'};
                            $dom=$data[$i][5];
                            break;
                        }
                    }

                     
                    foreach($AEquiposT as $ae) {                    
                        if ($ae->{'Codigo'}==$ser->idservicio) {
                             $data[$i][5] =100-($dom/($ae->{'TipoSolicitud'}))*100; 
                            break;
                        }
                    }

                    //Compras
                    $dom=0;
                    foreach($CRepuestos as $ar) {                    
                        if ($ar->{'Codigo'}==$ser->idservicio) {
                            $data[$i][6] = $ar->{'TipoSolicitud'}; 
                            $dom=$data[$i][6];
                            break;
                        }
                    }

                     
                    foreach($CRepuestosT as $ar) {                    
                        if ($ar->{'Codigo'}==$ser->idservicio) {
                             $data[$i][6] =100-($dom/($ar->{'TipoSolicitud'}))*100; 
                            break;
                        }
                    }

                    $dom=0;
                    foreach($CInsumos as $ai) {                    
                        if ($ai->{'Codigo'}==$ser->idservicio) {
                            $data[$i][7] = $ai->{'TipoSolicitud'};
                            $dom=$data[$i][7];
                            break;
                        }
                    }

                     
                    foreach($CInsumosT as $ai) {                    
                        if ($ai->{'Codigo'}==$ser->idservicio) {
                            $data[$i][7] =(1-$data[$i][7]/($ai->{'TipoSolicitud'}))*100; 
                            break;
                        }
                    }

                    $dom=0;
                    foreach($CAccesorios as $aa) {                    
                        if ($aa->{'Codigo'}==$ser->idservicio) {
                            $data[$i][8] = $aa->{'TipoSolicitud'}; 
                            $dom=$data[$i][8];
                            break;
                        }
                    }

                     
                    foreach($CAccesoriosT as $aa) {                    
                        if ($aa->{'Codigo'}==$ser->idservicio) {
                           $data[$i][8] =100-($dom/($aa->{'TipoSolicitud'}))*100; 
                            break;
                        }
                    }

                    $dom=0;
                    foreach($CEquipos as $ae) {                    
                        if ($ae->{'Codigo'}==$ser->idservicio) {
                            $data[$i][9] = $ae->{'TipoSolicitud'}; 
                            $dom=$data[$i][9];
                            break;
                        }
                    }

                     
                    foreach($CEquiposT as $ae) {                    
                        if ($ae->{'Codigo'}==$ser->idservicio) {
                           $data[$i][9
                           ] =100-($dom/($ar->{'TipoSolicitud'}))*100; 
                            break;
                        }
                    }


                }

      //print
         $data_table=$data;

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eficiencia de Cumplimiento de Pedido ";//nombre de la p'agin;
        $dataContainer->siderbar_type = "request";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="eficiencia_de_cumplimiento_de_pedido_rep";
        $dataContainer->report_name="Eficiencia de Cumplimiento de Pedido"; 
        $dataContainer->table=true;
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;
        $dataContainer->chart_title='Tipo de Requerimiento';
        $dataContainer->data_table=$data_table;
        
        return view('indicators.request.2',compact('dataContainer'));



    }



    public function r_3_post(Request $request){
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
      

        
   
            
            //ALMACEN id tipo de compra 1(repuesto), 2(insumo), 3(accesorios) y 4 (equipo)

            $TiempoAdquisicion =  DB::table('programacion_compra_adquisicion')
                             ->select(array('programacion_compra_adquisicion.idservicio as Codigo', 
                                DB::raw('SUM(ABS(TIMESTAMPDIFF(DAY,programacion_compra_adquisicion.fecha_inicio_evaluacion,programacion_compra_adquisicion.fecha_aproximada_adquisicion ))) as Tiempo')))
                                ->where('programacion_compra_adquisicion.fecha_inicio_evaluacion','>=', $date_start_c)
                                ->where('programacion_compra_adquisicion.fecha_inicio_evaluacion','<=', $date_end_c)
                                ->groupby('programacion_compra_adquisicion.idservicio')
                                ->orderBy('programacion_compra_adquisicion.idservicio')
                                ->get();
 

            
            $TotalComprasProgramadas= DB::table('programacion_compra_adquisicion')
                             ->select(array('programacion_compra_adquisicion.idservicio as Codigo', DB::raw('COUNT(programacion_compra_adquisicion.idprogramacion_compra) as Total')))
                                ->where('programacion_compra_adquisicion.fecha_inicio_evaluacion','>=', $date_start_c)
                                ->where('programacion_compra_adquisicion.fecha_inicio_evaluacion','<=', $date_end_c)
                                ->groupby('programacion_compra_adquisicion.idservicio')
                                ->orderBy('programacion_compra_adquisicion.idservicio')
                                ->get();

        

         $servicios = Servicio::all();

                $data = array();
                $i=0;
                foreach($servicios as $ser) {
                    $i++;
                    $data[$i][1]=$ser->nombre;
                    $data[$i][2]=0;
                   foreach ($TiempoAdquisicion as $ta) {
                        if ($ser->idservicio==$ta->{'Codigo'}) {
                            $data[$i][2]=$ta->{'Tiempo'};
                            break;
                        }

                    }
                   foreach ($TotalComprasProgramadas as $tcp) {
                        if ($ser->idservicio==$tcp->{'Codigo'}) {
                            $data[$i][2]=$data[$i][2]/(1+ $tcp->{'Total'});
                        }
                    }     
                }               

        $data_table=$data;
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Tiempo Promedio de Compra ";//nombre de la p'agin;
        $dataContainer->siderbar_type = "request";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="post";
        $dataContainer->url_post="tiempo_promedio_de_compra_rep";
        $dataContainer->report_name="Tiempo Promedio de Compra";
        $dataContainer->table=true;
        $dataContainer->serial_number=false;
        $dataContainer->patrimonial_code=false;
        $dataContainer->chart_title='Tipo de Requerimiento';
        $dataContainer->data_table=$data_table;
        
        return view('indicators.request.3',compact('dataContainer'));

    }

    public function r_4_post(Request $request){

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
        $service=null;
        $group=null;

        $service= $request->search_servicio;
        $group= $request ->search_grupo;
      
        
        //Costo de Ot realizado  y filtrar por servicio o por grupo
        //caso ambos filtro servicio y grupo

         if($service!=0 && $group!=0){
          $ot_correctivos = DB::table('ot_correctivos')
                            ->select(array(
                                DB::raw('activos.codigo_patrimonial as patrimonio'),
                                DB::raw('ot_correctivos.costo_total_repuestos as costoRepuesto'),
                                DB::raw('ot_correctivos.costo_total_personal as costoPersonal')))  
                            ->leftJoin('activos', function($join)
                            {
                                $join->on('ot_correctivos.idactivo','=','activos.idactivo');
                            })
                            ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                            ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                            ->where('activos.idservicio','=',$service)
                            ->where('activos.idgrupo','=',$group)
                            ->groupby('patrimonio')
                            ->get();

           

         }
         elseif ($service!=0 && $group==0) {
                //caso por servicio
             $ot_correctivos = DB::table('ot_correctivos')
                            ->select(array(
                                DB::raw('activos.codigo_patrimonial as patrimonio'),
                                DB::raw('ot_correctivos.costo_total_repuestos as costoRepuesto'),
                               
                            ))
                            ->leftJoin('activos', function($join)
                            {
                                $join->on('ot_correctivos.idactivo','=','activos.idactivo');
                            })
                            ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                            ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                            ->where('activos.idservicio','=',$service)
                            ->groupby('patrimonio')
                            ->get();
            
     
         }
         elseif ($group!=0 && $service==0) {
             $ot_correctivos = DB::table('ot_correctivos')
                            ->select(array(
                                DB::raw('activos.codigo_patrimonial as patrimonio'),
                                DB::raw('ot_correctivos.costo_total_repuestos as costoRepuesto'),
                                DB::raw('ot_correctivos.costo_total_personal as costoPersonal')
                            ))
                            ->leftJoin('activos', function($join)
                            {
                                $join->on('ot_correctivos.idactivo','=','activos.idactivo');
                            })
                            ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                            ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                            ->where('activos.idgrupo','=',$group)
                            ->groupby('patrimonio')
                            ->get();
            
            

         }

         if($ot_correctivos==null){
            echo "vacio";

         }
         else{


            $data=array();
            $i=0;
            foreach ($ot_correctivos as $ot) {
                $data[$i][1]=$ot->{'patrimonio'};
                $data[$i][2]=$ot->{'costoRepuesto'}+ $ot->{'costoPersonal'};
                $i++;
            }




        
        
     
                $data_table=$data;
                $dataContainer = new dataContainer;
                $dataContainer->page_name = "Consumo Real";//nombre de la p'agin;
                $dataContainer->siderbar_type = "request";//Tipo de siderbar que se requere desplega;
                $dataContainer->method="post";
                $dataContainer->url_post="consumo_real_rep";
                $dataContainer->report_name="Consumo Real";
                $dataContainer->table=true;
                $dataContainer->serial_number=false;
                $dataContainer->patrimonial_code=false;
                $dataContainer->chart_title='Consumo Real';
                $dataContainer->data_table=$data_table;

                return view('indicators.request.4',compact('dataContainer'));


         }

    }


    public function r_5_post(Request $request){
        $validator = Validator::make($request->all(),$this->getValidations(true));

        if ($validator->fails()) {
            return redirect('solicitudes_de_trabajo_pendientes')->withErrors($validator)->withInput();
        }

        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;

        /*Fecha de inicio y fecha fin*/
        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();

         $otCorrectivos = DB::table('servicios')
                         ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                         ->leftJoin('ot_correctivos', function($join){
                                $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                            ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                            ->where('ot_correctivos.idestado_final','=', 5) //inactivo por falta de repuesto o insumo          
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();                        
        //ot_vmetrologicas
        $otPreventivos = DB::table('servicios')
                         ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                         ->leftJoin('ot_preventivos', function($join) {
                                 $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                            ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                            ->where('ot_preventivos.idestado_final','=', 5)//inactivo por falta de repuesto o insumo            
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();

        $otMetrologicas = DB::table('servicios')
                         ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_vmetrologicas.idot_vmetrologica) as Metrologica')))
                         ->leftJoin('ot_vmetrologicas', function($join) {
                                 $join->on('ot_vmetrologicas.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_vmetrologicas.fecha_programacion','>=', $date_start_c)
                            ->where('ot_vmetrologicas.fecha_programacion','<=', $date_end_c)   
                            ->where('ot_vmetrologicas.idestado_final','=', 5)//inactivo por falta de repuesto o insumo                     
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();   
                             
        $otInspecciones = DB::table('servicios')
                         ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_inspec_equipos.idot_inspec_equipo) as Inspeccion')))
                         ->leftJoin('ot_inspec_equipos', function($join) {
                                 $join->on('ot_inspec_equipos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_inspec_equipos.fecha_inicio','>=', $date_start_c)
                            ->where('ot_inspec_equipos.fecha_fin','<=', $date_end_c)
                            ->where('ot_inspec_equipos.idestado','=', 5) //inactivo por falta de repuesto o insumo                                          
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();    

        //TOTAL
         $otCorrectivosT = DB::table('servicios')
                         ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_correctivos.idot_correctivo) as Correctivo')))
                         ->leftJoin('ot_correctivos', function($join){
                                $join->on('ot_correctivos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_correctivos.fecha_inicio_ejecucion','>=', $date_start_c)
                            ->where('ot_correctivos.fecha_termino_ejecucion','<=', $date_end_c)
                                   
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();                        
        //ot_vmetrologicas
        $otPreventivosT = DB::table('servicios')
                         ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_preventivos.idot_preventivo) as Preventivo')))
                         ->leftJoin('ot_preventivos', function($join) {
                                 $join->on('ot_preventivos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_preventivos.fecha_inicio_ejecucion','>=', $date_start_c)
                            ->where('ot_preventivos.fecha_termino_ejecucion','<=', $date_end_c)
                                      
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();

        $otMetrologicasT = DB::table('servicios')
                         ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_vmetrologicas.idot_vmetrologica) as Metrologica')))
                         ->leftJoin('ot_vmetrologicas', function($join) {
                                 $join->on('ot_vmetrologicas.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_vmetrologicas.fecha_programacion','>=', $date_start_c)
                            ->where('ot_vmetrologicas.fecha_programacion','<=', $date_end_c)   
                                                
                            ->groupby('servicios.nombre')
                            ->orderBy('servicios.nombre')
                            ->get();   
                             
        $otInspeccionesT = DB::table('servicios')
                         ->select(array('servicios.nombre as Nombre', DB::raw('COUNT(ot_inspec_equipos.idot_inspec_equipo) as Inspeccion')))
                         ->leftJoin('ot_inspec_equipos', function($join) {
                                 $join->on('ot_inspec_equipos.idservicio', '=', 'servicios.idservicio');                                  
                             })
                            ->where('ot_inspec_equipos.fecha_inicio','>=', $date_start_c)
                            ->where('ot_inspec_equipos.fecha_fin','<=', $date_end_c)
                                                                     
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
            $data[$i][3]=0;
            foreach($otCorrectivos as $oc) {                    
                if ($oc->{'Nombre'}==$ser->nombre) {
                    $data[$i][2] =$data[$i][2]+ $oc->{'Correctivo'}; //correctivos
                    break;
                }
            }
            
            foreach($otPreventivos as $op) {                
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
            
            
            foreach($otInspecciones as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][2] =$data[$i][2]+ $op->{'Inspeccion'}; //inspeccion
                    break;
                }
            }

            //Totales

            foreach($otCorrectivosT as $oc) {                    
                if ($oc->{'Nombre'}==$ser->nombre) {
                    $data[$i][3] =$data[$i][3]+ $oc->{'Correctivo'}; //correctivos
                    break;
                }
            }
            
            foreach($otPreventivosT as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][3] =$data[$i][3]+ $op->{'Preventivo'}; //preventivo
                    break;
                }
            }
            
            foreach($otMetrologicasT as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][3] =$data[$i][3] + $op->{'Metrologica'}; //metrologica
                    break;
                }
            }
            
            
            foreach($otInspeccionesT as $op) {                
                if ($op->{'Nombre'}==$ser->nombre) {                        
                    $data[$i][3] =$data[$i][3]+ $op->{'Inspeccion'}; //inspeccion
                    break;
                }
            }

            $data[$i][2]=round($data[$i][2]/($data[$i][3])*100, 3);


        }
           

         $data_table=$data;
          $dataContainer = new dataContainer;
                $dataContainer->page_name = "Porcentaje de Servicios que Experimentaron Desabastecimiento";//nombre de la p'agin;
                $dataContainer->siderbar_type = "request";//Tipo de siderbar que se requere desplega;
                $dataContainer->method="post";
                $dataContainer->url_post="porcentaje_de_servicios_que_experimentaron_desabastecimiento_rep";
                $dataContainer->report_name="Porcentaje de Servicios que Experimentaron Desabastecimiento";
                $dataContainer->table=true;
                $dataContainer->serial_number=false;
                $dataContainer->patrimonial_code=false;
                $dataContainer->chart_title='Porcentaje de Servicios que Experimentaron Desabastecimiento';
                $dataContainer->data_table=$data_table;

        return view('indicators.request.5',compact('dataContainer'));

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

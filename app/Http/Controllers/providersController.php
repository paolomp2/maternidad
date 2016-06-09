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

class providersController extends Controller
{

    public function p_1()
    {   
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eficiencia de Ejecución de OTM";//nombre de la p'agin;
        $dataContainer->siderbar_type ="providers";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eficiencia_ejecucion_otm_rep";
        $dataContainer->report_name="Eficiencia de Ejecución de OTM";
        
        return view('indicators.providers.1',compact('dataContainer'));
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

        $eficiencia_ejecucion=null;

        $sql = 'select "Preventivo" as tipo_ot, ROUND(ejecutadas.cant_ot / generadas.cant_ot*100,2) as Eficiencia
                FROM (SELECT COUNT(ot_preventivos.idot_preventivo) AS cant_ot 
                        FROM ot_preventivos
                        WHERE (ot_preventivos.fecha_programacion >= \''.$date_start_c.'\'  
                               and ot_preventivos.fecha_programacion <= \''.$date_end_c.'\' )) as generadas, 
                     (SELECT COUNT(ot_preventivos.idot_preventivo) AS cant_ot 
                        FROM ot_preventivos 
                        WHERE ot_preventivos.idestado_final=13
                            and (ot_preventivos.fecha_programacion >= \''.$date_start_c.'\'  
                            and ot_preventivos.fecha_programacion <= \''.$date_end_c.'\' )) AS ejecutadas
                UNION
                select "Correctivo" as tipo_ot, ROUND(ejecutadas.cant_ot / generadas.cant_ot*100,2) as Eficiencia
                FROM (SELECT COUNT(ot_correctivos.idot_correctivo) AS cant_ot 
                        FROM ot_correctivos
                        WHERE (ot_correctivos.fecha_programacion >= \''.$date_start_c.'\'  
                               and ot_correctivos.fecha_programacion <= \''.$date_end_c.'\' )) as generadas, 
                     (SELECT COUNT(ot_correctivos.idot_correctivo) AS cant_ot 
                        FROM ot_correctivos 
                        WHERE ot_correctivos.idestado_final=13
                            and (ot_correctivos.fecha_programacion >= \''.$date_start_c.'\'  
                            and ot_correctivos.fecha_programacion <= \''.$date_end_c.'\' )) AS ejecutadas
                UNION
                select "Metrológica" as tipo_ot, ROUND(ejecutadas.cant_ot / generadas.cant_ot*100,2) as Eficiencia
                FROM (SELECT COUNT(ot_vmetrologicas.idot_vmetrologica) AS cant_ot 
                        FROM ot_vmetrologicas
                        WHERE (ot_vmetrologicas.fecha_programacion >= \''.$date_start_c.'\'  
                               and ot_vmetrologicas.fecha_programacion <= \''.$date_end_c.'\' )) as generadas, 
                     (SELECT COUNT(ot_vmetrologicas.idot_vmetrologica) AS cant_ot 
                        FROM ot_vmetrologicas 
                        WHERE ot_vmetrologicas.idestado_final=13
                            and (ot_vmetrologicas.fecha_programacion >= \''.$date_start_c.'\'  
                            and ot_vmetrologicas.fecha_programacion <= \''.$date_end_c.'\' )) AS ejecutadas        
                ';
        $eficiencia_ejecucion = DB::select(DB::raw($sql)); 

        $data = array();
        $i=0;
        foreach($eficiencia_ejecucion as $eficiencia_ot) {
            $i++;
            $data[$i][0] = $eficiencia_ot->tipo_ot;
            $data[$i][1] = $eficiencia_ot->Eficiencia;            
        }
                                                
        $data_table=$data;

        

        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Eficiencia de Ejecucion de OTM";//nombre de la p'agin;
        $dataContainer->siderbar_type ="providers";//Tipo de siderbar que se requere desplega;
        $dataContainer->method="get";
        $dataContainer->url_post="eficiencia_ejecucion_otm_rep";
        $dataContainer->report_name="Eficiencia de Ejecucion de OTM";
        $dataContainer->data_table = $data_table;
        
        return view('indicators.providers.1',compact('dataContainer'));

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

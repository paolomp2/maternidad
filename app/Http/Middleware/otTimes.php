<?php

namespace Maternidad\Http\Middleware;

use Closure;
use Maternidad\OtCorrectivo;
use Maternidad\OtPreventivo;
use Maternidad\Activo;
use Carbon\Carbon;

class otTimes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!isset($request->search_fecha_ini)||!isset($request->search_fecha_fin)){
            return $next($request);
        }

        $fechamin = $request->search_fecha_ini;
        $fechamax = $request->search_fecha_fin;

        $date_start_c = Carbon::createFromFormat('m-Y', $fechamin)->startOfMonth();
        $date_end_c = Carbon::createFromFormat('m-Y', $fechamax)->endOfMonth();

        $otCorrectivos = OtCorrectivo::withtrashed()->where('tiempo_ejecucion',0)->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$date_end_c)->get();
        $OtPreventivos = OtPreventivo::withtrashed()->where('tiempo_ejecucion',0)->where('fecha_inicio_ejecucion','>=',$date_start_c)->where('fecha_termino_ejecucion','<=',$date_end_c)->get();
        

        $ots_array[0]=$otCorrectivos;
        $ots_array[1]=$OtPreventivos;
        
        foreach ($ots_array as $ots_collection) {
            foreach ($ots_collection as $current_ot)
            {
                $ot_star = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->fecha_inicio_ejecucion);                                
                $ot_end = Carbon::createFromFormat('Y-m-d H:i:s', $current_ot->fecha_termino_ejecucion);
                $current_ot->tiempo_ejecucion=$ot_star->diffInMinutes($ot_end);
                $current_ot->save();
            }
        }

        return $next($request);
    }
}

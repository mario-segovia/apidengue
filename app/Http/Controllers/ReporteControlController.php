<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class ReporteControlController extends Controller
{
    public function reportecontrol()
   {
      if (Auth::user()->hasrole('admin')){
             $control=DB::table('caso_positivos')
                ->join('pacientes','pacientes.id','=', 'caso_positivos.paciente_id')
                ->join('controls','controls.paciente_id','=', 'caso_positivos.id')
                ->select('controls.id','caso_positivos.paciente_id','pacientes.nombre_apellido','controls.fecha_analisis','controls.estado_paciente','controls.recomendacion','controls.fecha_alta','controls.created_at','controls.updated_at')
                    ->where('caso_positivos.deleted_at',null)
                    ->get();
                   return response()->json($control);
      }
      else {
        $control=DB::table('caso_positivos')
           ->join('pacientes','pacientes.id','=', 'caso_positivos.paciente_id')
           ->join('controls','controls.paciente_id','=', 'caso_positivos.id')
           ->select('controls.id','caso_positivos.paciente_id','pacientes.nombre_apellido','controls.fecha_analisis','controls.estado_paciente','controls.recomendacion','controls.fecha_alta','controls.created_at','controls.updated_at')
               ->where('caso_positivos.deleted_at',null)
               ->where('pacientes.user_id', Auth::user()->id)
               ->get();
              return response()->json($control);
      }

    }
}

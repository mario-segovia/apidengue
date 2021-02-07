<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ReporteControlController extends Controller
{
    public function reportecontrol()
   {
     $control=DB::table('caso_positivos')
        ->join('pacientes','pacientes.id','=', 'caso_positivos.paciente_id')
        ->join('controls','controls.paciente_id','=', 'caso_positivos.id')
        ->select('controls.id','caso_positivos.paciente_id','pacientes.nombre_apellido','controls.fecha_analisis','controls.estado_paciente','controls.recomendacion','controls.fecha_alta','controls.created_at','controls.updated_at')
            ->where('caso_positivos.deleted_at',null)
            ->get();
           return response()->json($control);
    }
}

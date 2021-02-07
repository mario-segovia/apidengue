<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GraficoPersonalisadoController extends Controller
{
    public function personalizado()
    {
      $grafico_pacientes=DB::table('pacientes')
        ->join('tipo_pruebas','tipo_pruebas.id','=', 'pacientes.tipo_prueba_id')
        ->select('pacientes.id','pacientes.nombre_apellido','pacientes.barrio','pacientes.genero','pacientes.resultado','pacientes.tipo_prueba_id','pacientes.fechanac','pacientes.ci','pacientes.telefono','pacientes.grupo_sanguineo','pacientes.email','pacientes.edad','pacientes.enfermedad_referencial','pacientes.usuario','pacientes.latitud','pacientes.longitud','tipo_pruebas.nombre')
            ->where('pacientes.deleted_at',null)
            ->get();
           return response()->json($grafico_pacientes);
    }
}

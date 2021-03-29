<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use DB;
class ReportePacienteController extends Controller
{
     public function reporte_paciente()
     {
      $reporte=DB::table('pacientes')
         ->join('tipo_pruebas','tipo_pruebas.id','=', 'pacientes.tipo_prueba_id')
        ->select('pacientes.id','pacientes.nombre_apellido','pacientes.barrio','pacientes.genero','pacientes.resultado','pacientes.tipo_prueba_id','pacientes.fechanac','pacientes.ci','pacientes.telefono','pacientes.grupo_sanguineo','pacientes.email','pacientes.edad','pacientes.enfermedad_referencial','pacientes.usuario','tipo_pruebas.nombre','pacientes.latitud','pacientes.longitud','pacientes.created_at','pacientes.updated_at')
            ->where('pacientes.deleted_at',null)
            ->get();
           return response()->json($reporte);
    }
}

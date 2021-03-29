<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Paciente;
class GeneroController extends Controller
{
    public function masculino(){
    $masculino = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.genero','Masculino')
                    ->where('pacientes.resultado','Positivo')
                    ->pluck('count');
                    return $masculino;
    }
     public function femenino(){
    $femenino = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.genero','Femenino')
                    ->where('pacientes.resultado','Positivo')
                    ->pluck('count');
                    return $femenino;
    }
     public function otro(){
    $otro = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.genero','Otro')
                    ->where('pacientes.resultado','Positivo')
                    ->pluck('count');
                    return $otro;
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Control;
use App\Caso_Positivo;
class DashboardController extends Controller
{
    public function muertos(){
        //Cantidad de muertos
     $muertos = Control::select(\DB::raw("COUNT(*) as count"))
                    ->where('controls.estado_paciente','Fallecido')
                    ->pluck('count');
                    return $muertos;
    }
    public function infectados(){
        //Cantidad de infectados
    $infectados = Control::select(\DB::raw("COUNT(*) as count"))
                    ->where('controls.estado_paciente','Activo')
                    ->pluck('count');
                    return $infectados;
    }
    public function recuperados(){
        //Cantidad de recuperados
     $recuperados = Control::select(\DB::raw("COUNT(*) as count"))
                    ->where('controls.estado_paciente','Inactivo')
                    ->pluck('count');
                    return $recuperados;
    }
    public function pacientes(){
        //Cantiadad de Pacientes
     $pacientes = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->pluck('count');
                    return $pacientes;
    }
    public function caso_positivos(){
        //Cantiadad de casos positivos
        $caso_positivos = Caso_Positivo::select(\DB::raw("COUNT(*) as count"))
                    ->pluck('count');
                    return $caso_positivos;
    }
    public function nuevo_casos(){
        //Todos los nuevos casos
        $nuevo_casos = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.resultado','Positivo')
                    ->pluck('count');
                    return $nuevo_casos;
  	}
}
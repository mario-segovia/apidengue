<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Paciente;
class MapaController extends Controller
{
    public function encarnacion(){
      				$encarnacion = Paciente::select(\DB::raw("COUNT(*) as count"))
        			->where('pacientes.barrio','Encarnacion')
                    ->pluck('count')
                    ->first();
                    return $encarnacion;
    }
    public function chaipe(){
    $chaipe = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','Chaipe')
                    ->pluck('count')
                    ->first();
                    return $chaipe;
    }
      public function cambyreta(){
    $cambyreta = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','Cambyreta')
                    ->pluck('count')
                    ->first();
                    return $cambyreta;
    }
    public function santo_domingo(){
    $santo_domingo = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','Santo_Domingo')
                    ->pluck('count')
                    ->first();
                    return $santo_domingo;
    }
    public function mboikae(){
    $mboikae = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','Mboi_Ka_e')
                    ->pluck('count')
                    ->first();
                    return $mboikae;
    }
     public function sanisidro(){
    $sanisidro = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','San_Isidro')
                    ->pluck('count')
                    ->first();
                    return $sanisidro;
    }
    public function sagradafamilia(){
    $sagradafamilia = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','Sagrada_Familia')
                    ->pluck('count')
                    ->first();
                    return $sagradafamilia;
    }
     public function ciudadnueva(){
     $ciudadnueva = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','Ciudad_Nueva')
                    ->pluck('count')
                    ->first();
                    return $ciudadnueva;
    }
    public function santamaria(){
    $santamaria = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','Santa_Maria')
                    ->pluck('count')
                    ->first();
                    return $santamaria;
    }
    public function itapaso(){
    $itapaso = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','Ita_Paso')
                    ->pluck('count')
                    ->first();
                    return $itapaso;
    }
     public function buenavista(){
    $buenavista = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','Buena_Vista')
                    ->pluck('count')
                    ->first();
                    return $buenavista;
    }
     public function de_diciembre(){
    $de_diciembre = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','8de_diciembre')
                    ->pluck('count')
                    ->first();
                    return $de_diciembre;
    }
     public function fatima(){
    $fatima = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','Fatima')
                    ->pluck('count')
                    ->first();
                    return $fatima;
     }
      public function nueva_alborada(){
    $nueva_alborada = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.barrio','Nueva_Alborada')
                    ->pluck('count')
                    ->first();
                    return $nueva_alborada;
    }
   

 }


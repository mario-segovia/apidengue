<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use DB;
use Carbon\Carbon;
use App\Control;
class GraficoController extends Controller
{
    public function encarnacion(){
    $encarnacion = Paciente::select(\DB::raw("COUNT(*) as count"))
    ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
                    ->where('pacientes.barrio','Encarnacion')
                     ->get()->toArray();
    $encarnacion = array_column($encarnacion, 'count');
    return $encarnacion;
    }
     public function chaipe(){
    $chaipe = Paciente::select(\DB::raw("COUNT(*) as count"))
     ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
                    ->where('pacientes.barrio','Chaipe')
                    ->get()->toArray();
    $chaipe = array_column($chaipe, 'count');
    return $chaipe;
    }

     public function cambyreta(){
    $cambyreta = Paciente::select(\DB::raw("COUNT(*) as count"))
     ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
                    ->where('pacientes.barrio','Cambyreta')
                     ->get()->toArray();
    $cambyreta = array_column($cambyreta, 'count');
    return $cambyreta;
    }
     public function mboikae(){
    $mboikae = Paciente::select(\DB::raw("COUNT(*) as count"))
     ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
                    ->where('pacientes.barrio','Mboi_Ka_e')
                     ->get()->toArray();
    $mboikae = array_column($mboikae, 'count');
    return $mboikae;
    }
     public function sanisidro(){
    $sanisidro = Paciente::select(\DB::raw("COUNT(*) as count"))
     ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
                    ->where('pacientes.barrio','San_Isidro')
                    ->get()->toArray();
    $sanisidro = array_column($sanisidro, 'count');
    return $sanisidro;
    }
     public function sagradafamilia(){
    $sagradafamilia = Paciente::select(\DB::raw("COUNT(*) as count"))
     ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
                    ->where('pacientes.barrio','Sagrada_Familia')
                    ->get()->toArray();
    $sagradafamilia = array_column($sagradafamilia, 'count');
    return $sagradafamilia;
    }
     public function ciudadnueva(){
    $ciudadnueva = Paciente::select(\DB::raw("COUNT(*) as count"))
     ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
                    ->where('pacientes.barrio','Ciudad_Nueva')
                    ->get()->toArray();
    $ciudadnueva = array_column($ciudadnueva, 'count');
    return $ciudadnueva;
    }
     public function santamaria(){
    $santamaria = Paciente::select(\DB::raw("COUNT(*) as count"))
     ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
                    ->where('pacientes.barrio','Santa_Maria')
                    ->get()->toArray();
    $santamaria = array_column($santamaria, 'count');
    return $santamaria;
    }
     public function itapaso(){
    $itapaso = Paciente::select(\DB::raw("COUNT(*) as count"))
     ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
                    ->where('pacientes.barrio','Ita_Paso')
                    ->get()->toArray();
    $itapaso = array_column($itapaso, 'count');
    return $itapaso;
    }
     public function buenavista(){
    $buenavista = Paciente::select(\DB::raw("COUNT(*) as count"))
     ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
                    ->where('pacientes.barrio','Buena_Vista')
                    ->get()->toArray();
    $buenavista = array_column($buenavista, 'count');
    return $buenavista;
    }
     public function fatima(){
    $fatima = Paciente::select(\DB::raw("COUNT(*) as count"))
     ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
                    ->where('pacientes.barrio','Fatima')
                    ->get()->toArray();
    $fatima = array_column($fatima, 'count');
    return $fatima;
 }
    public function muertos(){
    $muertos = Control::select(DB::raw("COUNT(*) as count"))
        ->where('controls.estado_paciente','Fallecido')
        ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
        ->get()->toArray();
    $muertos = array_column($muertos, 'count');
    return $muertos;
    }
    public function infectados(){
    $infectados = Control::select(DB::raw("COUNT(*) as count"))
        ->where('controls.estado_paciente','Activo')
        ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
        ->get()->toArray();
    $infectados = array_column($infectados, 'count');
    return $infectados;
    }
    public function recuperados(){
     $recuperados = Control::select(DB::raw("COUNT(*) as count"))
        ->where('controls.estado_paciente','Inactivo')
        ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
        ->get()->toArray();
    $recuperados = array_column($recuperados, 'count');
    return $recuperados;
    }
    public function eleccion(){
    $eleccion = Control::select(DB::raw("COUNT(*) as count"))
        ->where('controls.estado_paciente','Sin eleccion')
        ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
        ->get()->toArray();
    $eleccion = array_column($eleccion, 'count');
    return $eleccion;
    }
    public function otro_estado(){
     $otro_estado = Control::select(DB::raw("COUNT(*) as count"))
        ->where('controls.estado_paciente','Otro')
        ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
        ->get()->toArray();
    $otro_estado = array_column($otro_estado, 'count');
    return $otro_estado;
    }
    public function positivos(){
    $positivos = Paciente::select(DB::raw("COUNT(*) as count"))
        ->where('pacientes.resultado','Positivo')
        ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
        ->get()->toArray();
    $positivos = array_column($positivos, 'count');
    return $positivos;
    }
    public function negativos(){
    $negativos = Paciente::select(DB::raw("COUNT(*) as count"))
        ->where('pacientes.resultado','Negativo')
       ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
        ->get()->toArray();
    $negativos = array_column($negativos, 'count');
    return $negativos;
    }
    public function positotal(){
    $positotal = Paciente::select(\DB::raw("COUNT(*) as count"))
    ->where('pacientes.resultado','Positivo')
                    ->pluck('count');
                    return $positotal;
    }
    public function negatotal(){
    $negatotal = Paciente::select(\DB::raw("COUNT(*) as count"))
    ->where('pacientes.resultado','Negativo')
                    ->pluck('count');
                    return $negatotal;
    }
    public function promedio(){
        //Edad promedio
       $promedio = DB::table('pacientes')
       ->where('pacientes.resultado','Positivo')
       ->avg('edad');
       return $promedio;
    }
       //Edad maxima
    public function max(){
       $max = DB::table('pacientes')
       ->where('pacientes.resultado','Positivo')
       ->max('edad');
       return $max;
     }
       //Edad minima
    public function minima(){
      $min = DB::table('pacientes')
       ->where('pacientes.resultado','Positivo')
       ->min('edad');
       return $min;
    }

    // funciones para ortal de $noticias

    public function paciente(){
    $paciente = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->pluck('count');
                    return $paciente;
    }
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
    public function positivo(){
    $positivo = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.resultado','Positivo')
                    ->pluck('count');
                    return $positivo;
    }
    public function negativo(){
    $negativo = Paciente::select(\DB::raw("COUNT(*) as count"))
                    ->where('pacientes.resultado','Negativo')
                    ->pluck('count');
                    return $negativo;
    }
    public function fallecido(){
    $fallecido = Control::select(DB::raw("COUNT(*) as count"))
        ->where('controls.estado_paciente','Fallecido')
        ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
        ->get()->toArray();
    $fallecido = array_column($fallecido, 'count');
    return $fallecido;

    }public function activo(){
    $activo = Control::select(DB::raw("COUNT(*) as count"))
        ->where('controls.estado_paciente','Activo')
        ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
        ->get()->toArray();
    $activo = array_column($activo, 'count');
    return $activo;

    }public function inactivo(){
     $inactivo = Control::select(DB::raw("COUNT(*) as count"))
        ->where('controls.estado_paciente','Inactivo')
        ->groupBy(\DB::raw("extract(MONTH from created_at)", "=", Carbon::now()->month))
        ->get()->toArray();
    $inactivo = array_column($inactivo, 'count');
    return $inactivo;
    }
}

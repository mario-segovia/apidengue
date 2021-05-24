<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Caso_positivos;
class ReportePositivoController extends Controller
{
    public function caso_positivos()
     {
           if (Auth::user()->hasrole('admin')){
              $casos=DB::table('caso_positivos')
                ->join('pacientes','pacientes.id','=', 'caso_positivos.paciente_id')
                ->select('pacientes.id','pacientes.nombre_apellido','pacientes.barrio','pacientes.genero', 'pacientes.id','pacientes.resultado','pacientes.tipo_prueba_id','pacientes.fechanac','pacientes.ci','pacientes.telefono','pacientes.grupo_sanguineo','pacientes.email','pacientes.edad','pacientes.enfermedad_referencial','pacientes.user_id','pacientes.longitud','pacientes.latitud','caso_positivos.codigo','caso_positivos.region','caso_positivos.codigo_distrito','caso_positivos.distrito','caso_positivos.fecha_notificacion','caso_positivos.medico','caso_positivos.media_edad','caso_positivos.residente','caso_positivos.hospedaje','caso_positivos.telefono_verificado','caso_positivos.codigo_departamento','caso_positivos.departamento','caso_positivos.zona','caso_positivos.personal_de_blanco','caso_positivos.albergue','caso_positivos.lugar_albergue','caso_positivos.sintomas_fiebre','caso_positivos.hospitalizado','caso_positivos.signo_sintoma','caso_positivos.vacuna_para_la_influenza','caso_positivos.fecha_vacunacion','caso_positivos.viajo_reciente','caso_positivos.centro_asistencia_covid','caso_positivos.centro_asistencia_pais','caso_positivos','caso_positivos.centro_asistencia_ciudad','caso_positivos.nombre_centro_asistencia','caso_positivos.fecha_asistida','caso_positivos.contacto_con_animales','caso_positivos.dato_de_contacto','caso_positivos.tipo_contacto','caso_positivos.contacto_otro','caso_positivos.contacto_con_infectado','caso_positivos.contacto_persona','caso_positivos.toma_de_muestra','caso_positivos.laboratorio','caso_positivos.nro_planilla','caso_positivos.anho','caso_positivos.responsable_de_carga','caso_positivos.usuario_lugar')
                    ->where('caso_positivos.deleted_at',null)
                    ->get();
                   return response()->json($casos);
          }
          else {
            $casos=DB::table('caso_positivos')
              ->join('pacientes','pacientes.id','=', 'caso_positivos.paciente_id')
              ->select('pacientes.id','pacientes.nombre_apellido','pacientes.barrio','pacientes.genero', 'pacientes.id','pacientes.resultado','pacientes.tipo_prueba_id','pacientes.fechanac','pacientes.ci','pacientes.telefono','pacientes.grupo_sanguineo','pacientes.email','pacientes.edad','pacientes.enfermedad_referencial','pacientes.user_id','pacientes.longitud','pacientes.latitud','caso_positivos.codigo','caso_positivos.region','caso_positivos.codigo_distrito','caso_positivos.distrito','caso_positivos.fecha_notificacion','caso_positivos.medico','caso_positivos.media_edad','caso_positivos.residente','caso_positivos.hospedaje','caso_positivos.telefono_verificado','caso_positivos.codigo_departamento','caso_positivos.departamento','caso_positivos.zona','caso_positivos.personal_de_blanco','caso_positivos.albergue','caso_positivos.lugar_albergue','caso_positivos.sintomas_fiebre','caso_positivos.hospitalizado','caso_positivos.signo_sintoma','caso_positivos.vacuna_para_la_influenza','caso_positivos.fecha_vacunacion','caso_positivos.viajo_reciente','caso_positivos.centro_asistencia_covid','caso_positivos.centro_asistencia_pais','caso_positivos','caso_positivos.centro_asistencia_ciudad','caso_positivos.nombre_centro_asistencia','caso_positivos.fecha_asistida','caso_positivos.contacto_con_animales','caso_positivos.dato_de_contacto','caso_positivos.tipo_contacto','caso_positivos.contacto_otro','caso_positivos.contacto_con_infectado','caso_positivos.contacto_persona','caso_positivos.toma_de_muestra','caso_positivos.laboratorio','caso_positivos.nro_planilla','caso_positivos.anho','caso_positivos.responsable_de_carga','caso_positivos.usuario_lugar')
                  ->where('caso_positivos.deleted_at',null)
                  ->where('pacientes.user_id', Auth::user()->id)
                  ->get();
                 return response()->json($casos);
          };

    }
}

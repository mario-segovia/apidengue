<?php

namespace App\Http\Controllers;

use App\Caso_positivo;
use Illuminate\Http\Request;
use App\Paciente;
use DB;
class CasoPositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $casoPositivo=DB::table('caso_positivos')
        ->join('pacientes','pacientes.id','=', 'caso_positivos.paciente_id')
        ->select('caso_positivos.id','pacientes.nombre_apellido','caso_positivos.codigo','caso_positivos.region','caso_positivos.codigo_distrito','caso_positivos.distrito','caso_positivos.fecha_notificacion','caso_positivos.medico','caso_positivos.media_edad','caso_positivos.residente','caso_positivos.telefono_verificado')
            ->where('caso_positivos.deleted_at',null)
            ->get();
           return response()->json($casoPositivo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          //Consulta de el listado de pacientes con un especificacion de solo los pacientes positivos con una clausula where y usando el pluck para debolver solo el nombre.
        $pacientes= Paciente::where('resultado','=','Positivo')->pluck('nombre_apellido','id');
        return $pacientes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $caso_positivo = Caso_positivo::create($request->all());
      return $caso_positivo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caso_positivo  $caso_positivo
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
      $casoPositivo=DB::table('caso_positivos')
        ->join('pacientes','pacientes.id','=', 'caso_positivos.paciente_id')
        ->select('pacientes.id','pacientes.nombre_apellido','pacientes.barrio','pacientes.genero', 'pacientes.id','pacientes.resultado','pacientes.tipo_prueba_id','pacientes.fechanac','pacientes.ci','pacientes.telefono','pacientes.grupo_sanguineo','pacientes.email','pacientes.edad','pacientes.enfermedad_referencial','pacientes.usuario','pacientes.longitud','pacientes.latitud','caso_positivos.codigo','caso_positivos.region','caso_positivos.codigo_distrito','caso_positivos.distrito','caso_positivos.fecha_notificacion','caso_positivos.medico','caso_positivos.media_edad','caso_positivos.residente','caso_positivos.hospedaje','caso_positivos.telefono_verificado','caso_positivos.codigo_departamento','caso_positivos.departamento','caso_positivos.zona','caso_positivos.personal_de_blanco','caso_positivos.albergue','caso_positivos.lugar_albergue','caso_positivos.sintomas_fiebre','caso_positivos.hospitalizado','caso_positivos.signo_sintoma','caso_positivos.vacuna_para_la_influenza','caso_positivos.fecha_vacunacion','caso_positivos.viajo_reciente','caso_positivos.centro_asistencia_covid','caso_positivos.centro_asistencia_pais','caso_positivos','caso_positivos.centro_asistencia_ciudad','caso_positivos.nombre_centro_asistencia','caso_positivos.fecha_asistida','caso_positivos.contacto_con_animales','caso_positivos.dato_de_contacto','caso_positivos.tipo_contacto','caso_positivos.contacto_otro','caso_positivos.contacto_con_infectado','caso_positivos.contacto_persona','caso_positivos.toma_de_muestra','caso_positivos.laboratorio','caso_positivos.nro_planilla','caso_positivos.anho','caso_positivos.responsable_de_carga','caso_positivos.usuario_lugar')
            ->where('caso_positivos.deleted_at',null)
            ->where('caso_positivos.id',$id)
            ->first();
           return response()->json($casoPositivo);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caso_positivo  $caso_positivo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caso_positivo  $caso_positivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $casoPositivo = Caso_positivo::find($id);
      $casoPositivo->update($request->all());
      return $casoPositivo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caso_positivo  $caso_positivo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $caso_positivo = Caso_positivo::find($id);
      $caso_positivo->delete();
      return $caso_positivo;
    }
}

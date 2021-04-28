<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\TipoPrueba;
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //  if (!Auth::user()->hasrole('Admin')){return response(['mensaje'=>'No tiene los permisos necesarios']);};
    //  $pacientes = Paciente::all();
      //$cryptdata = $this->encriptar($pacientes);
      //return $cryptdata;
      //return $pacientes;
      if (Auth::user()->hasrole('admin')){
          $pacientes=DB::table('pacientes')
            ->join('tipo_pruebas','tipo_pruebas.id','=', 'pacientes.tipo_prueba_id')
            ->select('pacientes.id','pacientes.nombre_apellido','pacientes.barrio','pacientes.genero','pacientes.resultado','pacientes.tipo_prueba_id','pacientes.fechanac','pacientes.ci','pacientes.telefono','pacientes.grupo_sanguineo','pacientes.email','pacientes.edad','pacientes.enfermedad_referencial','pacientes.user_id','tipo_pruebas.nombre')
                ->where('pacientes.deleted_at',null)
                ->get();
               return response()->json($pacientes);
      }
      else {
          $pacientes=DB::table('pacientes')
            ->join('tipo_pruebas','tipo_pruebas.id','=', 'pacientes.tipo_prueba_id')
            ->select('pacientes.id','pacientes.nombre_apellido','pacientes.barrio','pacientes.genero','pacientes.resultado','pacientes.tipo_prueba_id','pacientes.fechanac','pacientes.ci','pacientes.telefono','pacientes.grupo_sanguineo','pacientes.email','pacientes.edad','pacientes.enfermedad_referencial','pacientes.user_id','tipo_pruebas.nombre')
                ->where('pacientes.deleted_at',null)
                ->where('pacientes.user_id', Auth::user()->id)
                ->get();
               return response()->json($pacientes);
      };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pruebas = TipoPrueba::pluck('nombre','id');
        return $pruebas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $paciente = Paciente::create($request->all());
      return response(['mensaje' => 'Paciente creado exitosamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
     {
      $paciente=DB::table('pacientes')
        ->join('tipo_pruebas','tipo_pruebas.id','=', 'pacientes.tipo_prueba_id')
        ->select('pacientes.id','pacientes.nombre_apellido','pacientes.barrio','pacientes.genero','pacientes.resultado','pacientes.tipo_prueba_id','pacientes.fechanac','pacientes.ci','pacientes.telefono','pacientes.grupo_sanguineo','pacientes.email','pacientes.edad','pacientes.enfermedad_referencial','pacientes.user_id','tipo_pruebas.nombre','pacientes.latitud','pacientes.longitud','pacientes.created_at','pacientes.updated_at')
            ->where('pacientes.deleted_at',null)
            ->where('pacientes.id',$id)
            ->first();
           return response()->json($paciente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $paciente = Paciente::find($id);
      $paciente->update($request->all());
      return response(['mensaje' => 'Paciente actualizado exitosamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $paciente = Paciente::find($id);
      $paciente->delete();
      return response(['mensaje' => 'Paciente eliminado exitosamente']);

    }
}

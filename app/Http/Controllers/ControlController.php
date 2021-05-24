<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Control;
use Illuminate\Http\Request;
use App\Caso_positivo;
use DB;
class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
   {
       if (Auth::user()->hasrole('admin')){
           $control=DB::table('caso_positivos')
              ->join('pacientes','pacientes.id','=', 'caso_positivos.paciente_id')
              ->join('controls','controls.paciente_id','=', 'caso_positivos.id')
              ->select('controls.id','caso_positivos.paciente_id','pacientes.nombre_apellido','controls.fecha_analisis','controls.estado_paciente','controls.recomendacion','controls.fecha_alta')
                  ->where('caso_positivos.deleted_at',null)
                  ->get();
                 return response()->json($control);
      }

      else{
          $control=DB::table('caso_positivos')
             ->join('pacientes','pacientes.id','=', 'caso_positivos.paciente_id')
             ->join('controls','controls.paciente_id','=', 'caso_positivos.id')
             ->select('controls.id','caso_positivos.paciente_id','pacientes.nombre_apellido','controls.fecha_analisis','controls.estado_paciente','controls.recomendacion','controls.fecha_alta')
                 ->where('caso_positivos.deleted_at',null)
                 ->where('pacientes.user_id', Auth::user()->id)
                 ->get();
                return response()->json($control);
     };

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasrole('admin')){
              $caso_pacientes= Caso_positivo::pluck('paciente_id','id');
              //return $caso_pacientes;
              return response()->json($caso_pacientes);
        }
        else{
              $caso_pacientes= Caso_positivo::where('usuario_lugar','=', Auth::user()->id)->pluck('paciente_id','id');
              //return $caso_pacientes;
              return response()->json($caso_pacientes);
        };
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $control = Control::create($request->all());
      return $control;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
   {
     $control=DB::table('caso_positivos')
        ->join('pacientes','pacientes.id','=', 'caso_positivos.paciente_id')
        ->join('controls','controls.paciente_id','=', 'caso_positivos.id')
        ->select('controls.id','caso_positivos.paciente_id','pacientes.nombre_apellido','controls.fecha_analisis','controls.estado_paciente','controls.recomendacion','controls.fecha_alta','controls.created_at','controls.updated_at')
            ->where('caso_positivos.deleted_at',null)
            ->where('controls.id',$id)
            ->first();
           return response()->json($control);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function edit(Control $control)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $control = Control::find($id);
      $control->update($request->all());
      return $control;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $control = Control::find($id);
      $control->delete();
      return $control;
    }
}

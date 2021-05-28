<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user()->hasrole('admin')){
        $stocks = Stock::with('asset:id,name')->with('team:id,nombre')->get();
        return $stocks;
      }
      else {
        $entidad = Auth::user()->entidad;
        $stocks = Stock::with('asset:id,name')->with('team:id,nombre')
        ->where('team_id','=',$entidad->id)->get();
        return $stocks;

      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $stock = Stock::where('team_id','=',$request->team_id)->where('asset_id','=',$request->asset_id)->get();

      if(!$stock->isEmpty()) {return response()->json(['mensaje' => 'Stock ya existente'],401);}
      else {
        $stock = Stock::create($request->all());
        return response(['mensaje' => 'Stock creado exitosamente']);}



       //return response()->json($stock);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
      $stock = Stock::with('asset:id,name')->find($id);
      return response()->json($stock);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $stock = Stock::find($id);
      $stock->update($request->all());
      return response(['mensaje' => 'Stock actualizado exitosamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}

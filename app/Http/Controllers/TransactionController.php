<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasrole('admin')){
          $trans = Transaction::with('user:id,name')->with('team:id,nombre')->with('asset:id,name')->get();
          return $trans;
        }
        else {
          $trans = Transaction::with('user:id,name')->with('team:id,nombre')->with('asset:id,name')
          ->where('user_id','=',Auth::user()->id)->get();
          return $trans;
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
      $transaction = Transaction::create($request->all());
      return response(['mensaje' => 'Transaccion creada exitosamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        if (Auth::user()->hasrole('admin')){
            $transaction = Transaction::with('user:id,name,email')->with('team:id,nombre')->where('asset_id','=',$id)->get();
            return $transaction;
        }
        else {
            $transaction = Transaction::with('user:id,name,email')->with('team:id,nombre')
            ->where('asset_id','=',$id)->where('user_id','=', Auth::user()->id)->get();
            return $transaction;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}

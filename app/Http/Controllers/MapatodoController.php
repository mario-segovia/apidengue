<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
class MapatodoController extends Controller
{
   public function index()
    {
    $mapap= Paciente::all();
        return $mapap;
 }
}

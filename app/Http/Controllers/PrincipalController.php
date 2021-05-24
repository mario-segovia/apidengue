<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use App\Noticia;
use DB;

class PrincipalController extends Controller
{
      public function re (){
       $re=Noticia::find(1);
       return $re;
      }

       public function relevante (){
       $relevante=Noticia::orderBy('id','DESC')->get();
       return $relevante;
      }

      public function noticias (){
            $noticias = Noticia::all();
       return $noticias;
      }
      public function ultimas (){
      $ultimas = Noticia::latest()
        ->take(3)
            //->take(1)
        ->get();


       return $ultimas;
      }
}

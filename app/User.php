<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, LaratrustUserTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'deleted_at', 'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
     protected $casts = [
         'created_at' => 'datetime:Y-m-d','updated_at'=> 'datetime:Y-m-d'
     ];


    public function usuario (){
          return $this-> hasMany('App\Usuario');
      }
    public function caso_positivo (){
          return $this-> hasMany('App\Caso_positivo');
      }
    public function denuncia (){
          return $this-> hasMany('App\Denuncia');
      }
      public function sugerencia (){
            return $this-> hasMany('App\Sugerencia');
      }

      public function paciente (){
            return $this-> hasMany('App\Paciente');
      }

      public function getEntidadAttribute (){

            $usuario = Usuario::where('id_user', $this->id)->first();

            $entidad = Entidad::find($usuario->id_entidad);

            return $entidad;
      }
}

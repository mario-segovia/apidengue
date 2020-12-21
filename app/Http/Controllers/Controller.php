<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function encriptar( $data)
    {
      $key = "dont-panic";
      $iv = "123456789abcdefg";
      $cipher = "AES-256-CBC";
      $cryptdata = openssl_encrypt($data, $cipher, $key, 0, $iv);
      return $cryptdata;

    }

    public function desencriptar( $data)
    {
      $key = "dont-panic";
      $iv = "123456789abcdefg";
      $cipher = "AES-256-CBC";
      $decryptdata = openssl_decrypt($data, $cipher, $key, 0, $iv);
      return $decryptdata;

    }
}

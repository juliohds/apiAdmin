<?php

namespace App\Http\Controllers;
use App\User;

use Laravel\Lumen\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    public function postLogin(Request $request){
      $acesso = $request->only(['name', 'email']);
      $usuario = User::where(function($query) use ($acesso) {
        $query->orWhere('name', '=', $acesso['name']);
        $query->orWhere('email', '=', $acesso['email']);
      })
      ->whereAtivo(1)
      ->first();

      if($usuario){
        return "usuario existe" + $usuario['name'];
      }

      return "usuario nao existe";
    }

    public function show(){
      return "show";
    }
}

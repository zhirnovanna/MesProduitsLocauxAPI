<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Resources\PrivateUserResource;

class RegisterController extends Controller
{
    public function action(RegisterRequest $request){
      // $user = User::create($request->only('email', 'firstname', 'lastname', 'password', 'admin', 'adress', 'pc'));

      // return new PrivateUserResource($user);
    }
}

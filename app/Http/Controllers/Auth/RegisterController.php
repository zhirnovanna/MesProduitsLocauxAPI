<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Resources\PrivateUserResource;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
  event(new Registered($user));
}


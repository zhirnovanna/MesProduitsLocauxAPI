<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PrivateUserResource;


class MeSignController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        return new PrivateUserResource($request->user());

        // return response()->json([
        //     'email' => $user->email,
        //     'name' => $user->name,
        // ]);
    }
}

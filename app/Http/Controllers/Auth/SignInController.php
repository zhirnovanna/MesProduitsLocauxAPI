 <?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrivateUserResource;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        if (!$token = auth()->attempt($request->only('email', 'password'))) {
            //return response(null, 401);
          return response()->json([
            'errors' => [
              'email' => ['Il est impossible de login avec vos donnees']
              ]
          ]);
        }

        return (new PrivateUserResource($request->user()))
          ->additional([
            'meta'=> [
              'token' => $token
            ]
          ], 422);
        //return response()->json(compact('token'));
    }
}

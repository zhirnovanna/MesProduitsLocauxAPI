<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Return a json listing of the users.
     *
     * @queryParam offset integer Point in the array where to start the set of returned data. Default 0. If specified limit must be specified too.
     * @queryParam limit integer Number of regions to return. Default all. If specified offset must be specified too.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if((!empty(request()->offset) || request()->offset == 0) && !empty(request()->limit) 
        && intval(request()->offset) >= 0 && intval(request()->limit) >= 0) {

            return User::offset(intval(request()->offset))
            ->limit(intval(request()->limit))
            ->get();

        } else {
            return User::all();
        }
    }

    /**
     * Return a json of the user info corresponding to specified id.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email|max:100|unique:users,email,' . $user->id,
            'admin' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 500);
        }

        $user->update($request->all());

        return response()->json($user, 200);
    }

    /**
     * Remove the user specified by id from database storage.
     * Return json with removed user id in 'id' key and action performed in 'action' key.
     *
     * @urlParam region integer required The ID of the user.
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $userId = $user->id;
        $user->delete();

        return response()->json(['action' => 'deleted user', 'id' => $userId], 200);
    }

    /**
     * Return the total number of entries for users in database
     *
     * @return \Illuminate\Http\Response
     */
    public function total()
    {
        return User::count();
    }
}

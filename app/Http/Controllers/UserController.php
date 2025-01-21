<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function activeUser()
    {
        $active = User::active()->get();

        return response()->json([
            'status' => 'success',
            'data' => UserResource::collection($active)->resolve()
        ]);
    }


    // N + 1 query
    public function getPost1()
    {
        $users = User::all();

        foreach ($users as $user) {

            echo $user->posts->count() . '<br>';

        }
    }

    // Optimized query using Eager Loading
    public function getPost2()
    {
        $users = User::with('posts')->get();

        foreach ($users as $user) {

            echo $user->posts->count() . '<br>';

        }
    }
}

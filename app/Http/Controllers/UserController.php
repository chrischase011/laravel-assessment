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
}

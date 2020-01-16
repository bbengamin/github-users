<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UsersController extends Controller
{

    public function index(Request $request)
    {
        $users = [];

        if ($request->has("q")) {
            $users[] = ['id' => 1];
        }

        return ['users' => $users];
    }

}

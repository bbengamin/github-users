<?php

namespace App\Http\Controllers;

use App\Services\UsersService;
use Illuminate\Http\Request;


class UsersController extends Controller
{

    private $userService;

    public function __construct(UsersService $userService)
    {
        $this->userService = $userService;
    }


    public function index(Request $request)
    {
        $users = [];

        if ($request->has("q")) {
            $users = $this->userService->getUsers($request->q);
        }

        return ['users' => $users];
    }

}

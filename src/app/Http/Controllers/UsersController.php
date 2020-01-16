<?php

namespace App\Http\Controllers;

use App\Services\UsersService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;


class UsersController extends Controller
{

    public function index(Request $request)
    {
        $client = $this->getClient();
        $userService = new UsersService($client);

        $users = [];

        if ($request->has("q")) {
            try {
                $users = $userService->getUsers($request->q);
            } catch (ClientException $e) {
                return response("Forbidden error from API", 403);
            }
        }

        return ['users' => $users];
    }


    public function getClient()
    {
        $username = env('GITHUB_USERNAME');
        $token = env('GITHUB_TOKEN');

        $options = [];
        if ($username && $token) {
            $options['headers'] = ['Authorization' => 'Basic ' . base64_encode($username . ':' . $token)];
        }

        return new Client($options);
    }

}

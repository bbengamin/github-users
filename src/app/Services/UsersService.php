<?php

namespace App\Services;

use GuzzleHttp\Client;

class UsersService
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getUsers($query = '') {
        $users = [];
        $url = 'https://api.github.com/search/users?q=' . $query;

        $response = $this->client->request('GET', $url);
        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody());

            $users = $body->items;
        }

        return $users;
    }
}
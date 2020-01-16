<?php

namespace App\Services;

use App\Handlers\Users\AdditionalFieldsHandler;
use GuzzleHttp\Client;

class UsersService
{
    private $client;
    private $additionalFields;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->additionalFields = collect([
            'followers_url' => 'followers',
            'repos_url' => 'repos'
        ]);
    }

    public function getUsers($query = '')
    {
        $users = [];
        $url = 'https://api.github.com/search/users?q=' . $query;

        $response = $this->client->request('GET', $url);
        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody());
            $handler = new AdditionalFieldsHandler($this->client, $this->additionalFields);

            $promises = collect($body->items)->flatMap($handler);
            $this->waitAll($promises);

            $users = $body->items;
        }

        return $users;
    }

    private function waitAll($promises)
    {
        $promises->each(function ($promise) {
            $promise->wait();
        });
    }
}
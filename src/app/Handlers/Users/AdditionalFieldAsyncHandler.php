<?php

namespace App\Handlers\Users;

use GuzzleHttp\Psr7\Request as GuzzleRequest;

class AdditionalFieldAsyncHandler
{
    private $client;
    private $user;

    public function __construct($client, $user)
    {
        $this->client = $client;
        $this->user = $user;
    }

    public function __invoke($field, $url)
    {
        $request = new GuzzleRequest('GET', $this->user->{$url});
        return $this->client->sendAsync($request)->then($this->getAdditionalFieldsResponseHandler($this->user, $field));
    }

    function getAdditionalFieldsResponseHandler($user, $field)
    {
        return function ($response) use ($user, $field) {
            $user->{$field} = json_decode($response->getBody());
        };
    }
}
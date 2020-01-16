<?php

namespace App\Handlers\Users;

class AdditionalFieldsHandler
{
    private $client;
    private $additionalFields;

    public function __construct($client, $additionalFields)
    {
        $this->client = $client;
        $this->additionalFields = $additionalFields;
    }

    public function __invoke($user)
    {
        $handler = new AdditionalFieldAsyncHandler($this->client, $user);
        return $this->additionalFields->map($handler);
    }

}
<?php

namespace Tests\Feature;

use Tests\TestCase;

class UsersTest extends TestCase
{

    const API_USERS = '/api/users';

    public function testEmptyResponse()
    {
        $response = $this->get(self::API_USERS);

        $response->assertStatus(200);
        $response->assertJsonStructure(['users']);
    }

    public function testResponseWithQuery()
    {
        $response = $this->get(self::API_USERS . '?q=test');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'users' => [
                '*' => [
                    'id',
                    'followers_url',
                    'followers',
                    'repos',
                    'repos_url',
                ]
            ]
        ]);
    }

}

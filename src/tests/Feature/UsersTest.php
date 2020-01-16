<?php

namespace Tests\Feature;

use Tests\TestCase;

class UsersTest extends TestCase
{

    public function testEmptyResponse()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
        $response->assertJsonStructure(['users']);
    }

    public function testResponseWithQuert()
    {
        $response = $this->get('/api/users?q=test');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'users' => [
                '*' => [
                    'id',
                ]
            ]
        ]);
    }
}

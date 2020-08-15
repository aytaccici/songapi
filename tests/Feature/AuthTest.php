<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{


    /**
     * Check whether email is required to login
     */
    public function test_it_requires_an_email()
    {
        $this->json('POST', 'api/v1/auth/login')
            ->assertStatus(400);
    }


    /**
     * Can Inserted a new user to database
     */
    public function test_it_register_user()
    {

        $this->json('POST', 'api/v1/auth/register', [
            'name'     => 'Aytac Cici',
            'email'    => 'abc@abc.com',
            'password' => 123456,
        ])
            ->assertStatus(201);
    }


    /**
     *  Check whether user can login
     */
    public function test_it_can_login_user()
    {

        $this->json('POST', 'api/v1/auth/login', [
            'email'    => 'aytaccici@gmail.com',
            'password' => 123456,
        ])
            ->assertStatus(200);
    }
}

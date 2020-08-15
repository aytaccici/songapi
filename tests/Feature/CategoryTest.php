<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A user can list all categories
     *
     * @return void
     */
    public function test_user_can_list_categories()
    {

        $user = factory(User::class)->create();

        $this->withHeader('Authorization', 'Bearer ' . $user->api_token)
            ->json('GET', 'api/v1/categories')->assertStatus(200)
            ->assertJsonFragment([
                'errorCode' => -1,
            ]);
    }

    /**
     * A user can list a category detail
     * @return  void
     */

    public function test_user_can_show_category_detail(){

        $user = factory(User::class)->create();

        $this->withHeader('Authorization', 'Bearer ' . $user->api_token)
            ->json('GET', 'api/v1/categories/1')->assertStatus(200);
    }


    /** A user cant access categories without login
     * @return  void
     */
    public function test_user_cant_show_categories_without_login(){

        $this->json('GET', 'api/v1/categories/1')->assertStatus(403);
    }
}

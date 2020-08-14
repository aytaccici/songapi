<?php


namespace App\Repositories;


use App\Contracts\UserContract;
use App\User;

class UserRepository extends BaseRepository implements UserContract
{

    /**
     * @return string
     */
    protected function entity()
    {
        return User::class;
    }
}

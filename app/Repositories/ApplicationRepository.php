<?php

namespace App\Repositories;

use App\Contracts\ApplicationContact;
use App\Models\Application;

class ApplicationRepository extends BaseRepository implements ApplicationContact
{

    /**
     * @return string
     */
    public function entity()
    {
        return Application::class;
    }
}

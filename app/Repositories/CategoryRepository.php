<?php


namespace App\Repositories;


use App\Contracts\CategoryContact;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryContact
{

    /**
     * @return string
     */
    public function entity()
    {
        return Category::class;
    }

}

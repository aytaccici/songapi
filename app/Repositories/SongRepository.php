<?php


namespace App\Repositories;


use App\Contracts\SongContact;
use App\Models\Song;


class SongRepository extends BaseRepository implements SongContact
{

    /**
     * @return string
     */
    public function entity()
    {
        return Song::class;
    }
}

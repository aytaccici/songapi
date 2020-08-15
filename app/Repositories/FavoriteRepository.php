<?php


namespace App\Repositories;

use App\Contracts\FavoriteContract;
use App\Models\Favorite;

class FavoriteRepository extends BaseRepository implements FavoriteContract
{

    /**
     * @return string
     */
    protected function entity()
    {
        return Favorite::class;
    }

    public function getFavoriteSongWithUserAndSongId(int $userId, int $songId)
    {
        return $this->entity->where('user_id', '=', $userId)->where('song_id', '=', $songId)->first();
    }


    public function deleteFavoriteSongWithUserAndSongId(int $userId, int $songId)
    {
        return $this->entity->where('user_id', '=', $userId)->where('song_id', '=', $songId)->delete();
    }
}

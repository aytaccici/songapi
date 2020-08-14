<?php


namespace App\Services\Favorite;

use App\Contracts\FavoriteContract;
use Illuminate\Http\Request;

class FavoriteService
{

    protected $favoriteContact;

    public function __construct(FavoriteContract $favoriteContract)
    {
        $this->favoriteContact = $favoriteContract;
    }

    public function addFavorite(Request $request)
    {

        $favorite = $this->favoriteContact->getFavoriteSongWithUserAndSongId($request->user()->id, $request->song_id);

        if (!$favorite->count()) {
            $data = array(
                'user_id' => $request->user()->id,
                'song_id' => $request->song_id
            );
            
            $favorite = $this->favoriteContact->store($data);
        }

        return $favorite;
    }
}

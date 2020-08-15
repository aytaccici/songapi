<?php


namespace App\Services\Favorite;

use App\Contracts\FavoriteContract;
use Illuminate\Http\Request;

class FavoriteService
{

    protected $favoriteContact;

    /**
     * FavoriteService constructor.
     * @param FavoriteContract $favoriteContract
     */
    public function __construct(FavoriteContract $favoriteContract)
    {
        $this->favoriteContact = $favoriteContract;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function addFavorite(Request $request)
    {

        $favorite = $this->favoriteContact->getFavoriteSongWithUserAndSongId($request->user()->id, $request->song_id);

        if (!$favorite) {
            $data = array(
                'user_id' => $request->user()->id,
                'song_id' => $request->song_id
            );

            $favorite = $this->favoriteContact->store($data);
        }

        return $favorite;
    }

    /**
     * @param Request $request
     */
    public function deleteFavorite(Request $request)
    {

        $this->favoriteContact->deleteFavoriteSongWithUserAndSongId($request->user()->id, $request->song_id);
    }

    /**
     * @param int $id
     */
    public function deleteFavoriteWithId(int $id)
    {

        $this->favoriteContact->destroy($id);
    }
}

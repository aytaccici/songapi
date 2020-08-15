<?php

namespace App\Http\Controllers\Api\Favorite;

use App\Contracts\FavoriteContract;
use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Favorite\DeleteFavorite;
use App\Http\Requests\Song\AddFavorite;
use App\Http\Resources\Favorite\FavoriteResource;
use App\Services\Favorite\FavoriteService;
use Illuminate\Http\Response;

class FavoriteController extends BaseApiController
{

    protected $favoriteContact;

    /**
     * SongController constructor.
     * @param FavoriteContract $favoriteContact
     */
    public function __construct(FavoriteContract $favoriteContact)
    {
        $this->favoriteContact = $favoriteContact;
        parent::__construct();
    }

    /**
     * List all categories
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = FavoriteResource::collection(($this->favoriteContact->paginate(config('paginate_limit'))));
        return $this->service->success($data);
    }


    /**
     * @param AddFavorite $request
     * @param FavoriteService $favoriteService
     * @return \Illuminate\Http\JsonResponse
     */
    public function addFavorite(AddFavorite $request, FavoriteService $favoriteService)
    {
        return $this->service->success(new FavoriteResource($favoriteService->addFavorite($request)),
            Response::HTTP_CREATED);
    }


    /**
     * @param AddFavorite $request
     * @param FavoriteService $favoriteService
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFavorite(DeleteFavorite $request, FavoriteService $favoriteService)
    {
        $favoriteService->deleteFavoriteWithId((int)$request->id);
        return $this->service->noContent();
    }
}

<?php

namespace App\Http\Controllers\Api\Song;

use App\Contracts\SongContact;
use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Song\AddFavorite;
use App\Http\Requests\Song\SongStore;
use App\Http\Resources\Favorite\FavoriteResource;
use App\Http\Resources\Song\SongResource;
use App\Services\Favorite\FavoriteService;
use Illuminate\Http\Response;

class SongController extends BaseApiController
{

    protected $songContact;

    /**
     * SongController constructor.
     * @param SongContact $songContact
     */
    public function __construct(SongContact $songContact)
    {
        $this->songContact = $songContact;
        parent::__construct();
    }

    /**
     * List all categories
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = SongResource::collection(($this->songContact->paginate(config('paginate_limit'))));
        return $this->service->success($data);
    }

    /** get Song Detail
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $collection = new  SongResource(($this->songContact->show($id)));
        return $this->service->success($collection);
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
    public function deleteFavorite(AddFavorite $request, FavoriteService $favoriteService)
    {
        $favoriteService->deleteFavorite($request);
        return $this->service->noContent();
    }
}

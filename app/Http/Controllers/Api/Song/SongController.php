<?php

namespace App\Http\Controllers\Api\Song;

use App\Contracts\SongContact;
use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Song\AddFavorite;
use App\Http\Requests\Song\SongStore;
use App\Http\Resources\Favorite\FavoriteResource;
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
        $data = FavoriteResource::collection(($this->songContact->paginate(config('paginate_limit'))));
        return $this->service->success($data);
    }

    /** get Song Detail
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $collection = new  FavoriteResource(($this->songContact->show($id)));
        return $this->service->success($collection);
    }


    public function store(SongStore $request)
    {
        return $this->service->success($request->all(), Response::HTTP_CREATED);
    }


    public function addFavorite(AddFavorite $request, FavoriteService $favoriteService)
    {

        $abc = $favoriteService->addFavorite($request);

        return $this->service->success(new   FavoriteResource($abc), Response::HTTP_CREATED);
    }
}

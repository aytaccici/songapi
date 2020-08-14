<?php

namespace App\Http\Controllers\Api\Category;

use App\Contracts\CategoryContact;
use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Category\CategoryStore;
use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Response;


class CategoryController extends BaseApiController
{
    protected $categoryContact;

    public function __construct(CategoryContact $categoryContact)
    {
        $this->categoryContact = $categoryContact;
        parent::__construct();
    }

    /**
     * List all categories
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = CategoryResource::collection(($this->categoryContact->paginate(config('paginate_limit'))));
        return $this->service->success($data);
    }

    /** get Category Detail
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $collection = new  CategoryResource(($this->categoryContact->show($id)));
        return $this->service->success($collection);
    }


    public function store(CategoryStore $request)
    {
        return $this->service->success($request->all(), Response::HTTP_CREATED);
    }
}

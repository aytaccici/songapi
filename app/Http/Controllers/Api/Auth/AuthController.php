<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserStore;
use App\Http\Resources\Auth\User;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use App\Http\Resources\User\User as UserResource;

class AuthController extends BaseApiController
{

    public function register(UserStore $request, AuthService $authService)
    {

        $user =  $authService->register($request);

        return $this->success(new UserResource($user));
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        dd("auth");
        return $this->success(new UserResource($request->user()));
    }
}

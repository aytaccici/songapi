<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Auth\UserStore;
use App\Http\Resources\User\User as UserResource;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

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
        return $this->success(new UserResource($request->user()));
    }
}

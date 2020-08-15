<?php

namespace App\Http\Controllers\Api\Application;

use App\Contracts\ApplicationContact;
use App\Http\Controllers\BaseApiController;
use App\Services\Application\ApplicationService;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Request;


class ApplicationController extends BaseApiController
{

    public function checkUpdate(Request $request, ApplicationService $applicationService)
    {

        $validator = $applicationService->checkUpdate($request);

        if ($validator->errors()->all()){

            return $this->service->fail(Response::HTTP_BAD_REQUEST,  $validator->getMessageBag()->first());
        }

        return $this->service->success();
    }


}

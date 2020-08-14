<?php

namespace App\Http\Controllers;

use App\Services\Utility\ServiceResult;
use Symfony\Component\HttpFoundation\Response;

class BaseApiController extends Controller
{
    public $serviceResult;

    public function __construct(ServiceResult $serviceResult)
    {
        $this->serviceResult = $serviceResult;
    }

    public function success($resource = [], $code = Response::HTTP_OK, $message = 'Success')
    {
        $this->serviceResult->data = $resource;
        $this->serviceResult->message = $message;
        return response()->json($this->serviceResult, $code);
    }


    public function failed($resource = [], $code = Response::HTTP_BAD_REQUEST, $message = 'Failed')
    {
        $this->serviceResult->data = $resource;
        $this->serviceResult->message = $message;
        return response()->json($this->serviceResult, $code);
    }

}

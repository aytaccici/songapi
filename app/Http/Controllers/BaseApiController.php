<?php

namespace App\Http\Controllers;

use App\Services\Utility\ServiceResult;
use Symfony\Component\HttpFoundation\Response;

class BaseApiController extends Controller
{
    public $serviceResult;

    public function __construct()
    {
        $this->serviceResult = new ServiceResult();
    }

    public function success($resource = [], $code = Response::HTTP_OK, $message = 'Success')
    {
        $this->serviceResult->data    = $resource;
        $this->serviceResult->message = $message;
        return response()->json($this->serviceResult, $code);
    }


    public function failed($resource = [], $code = Response::HTTP_BAD_REQUEST, $message = 'Failed')
    {
        $this->serviceResult->data    = $resource;
        $this->serviceResult->message = $message;
        return response()->json($this->serviceResult, $code);
    }


    public function forbidden($code = Response::HTTP_FORBIDDEN, $message = 'Login Required.')
    {
        $this->serviceResult->errorCode = ServiceResult::LOGIN_REQUIRED;
        $this->serviceResult->message   = $message;
        return response()->json($this->serviceResult, $code);
    }

}

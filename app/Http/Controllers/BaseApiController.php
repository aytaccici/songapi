<?php

namespace App\Http\Controllers;

use App\Services\Utility\ServiceResult;
use Symfony\Component\HttpFoundation\Response;

class BaseApiController extends Controller
{
    public $serviceResult;

    /**
     * BaseApiController constructor.
     */
    public function __construct()
    {
        $this->serviceResult = new ServiceResult();
    }

    /**
     * @param array $resource
     * @param int $code
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($resource = [], $code = Response::HTTP_OK, $message = 'Success')
    {
        $this->serviceResult->data    = $resource;
        $this->serviceResult->message = $message;
        return response()->json($this->serviceResult, $code);
    }


    /**
     * @param int $code
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function failed($code = Response::HTTP_BAD_REQUEST, $message = 'Failed')
    {
        $this->serviceResult->message   = $message;
        $this->serviceResult->errorCode = $code;
        return response()->json($this->serviceResult, $code);
    }


    /**
     * @param int $code
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function forbidden($code = Response::HTTP_FORBIDDEN, $message = 'Login Required.')
    {
        $this->serviceResult->message   = $message;
        $this->serviceResult->errorCode = $code;
        return response()->json($this->serviceResult, $code);
    }

}

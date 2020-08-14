<?php

namespace App\Http\Controllers;

use App\Services\Utility\JsonResponseService;

class BaseApiController extends Controller
{

    public $service;

    public function __construct()
    {
        $this->service = new JsonResponseService();
    }
}

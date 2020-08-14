<?php

namespace App\Services\Utility;

class ServiceResult
{

    public const  LOGIN_REQUIRED = 1;

    public $errorCode = -1;
    public $message   = "";
    public $data      = array();
}

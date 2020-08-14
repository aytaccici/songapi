<?php

namespace App\Http\Requests;


use App\Http\Controllers\BaseApiController;
use App\Services\Utility\ServiceResult;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

/**
 * Class Request
 * @package App\Http\Requests
 */
abstract class Request extends LaravelFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();

    /**
     * @param \Illuminate\Contracts\Validation\Validator $validator
     */
    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(
            (new BaseApiController(new ServiceResult()))->failed([], Response::HTTP_BAD_REQUEST,
                $this->getSingleLineErrorMessage($validator))
        );
    }

    private function getSingleLineErrorMessage(Validator $validator): string
    {

        $alMessages = $validator->errors()->all();

        $errorMessage = "";
        foreach ($alMessages as $message) {
            $errorMessage .= $message.' ';
        }
        return rtrim($errorMessage);
    }
}
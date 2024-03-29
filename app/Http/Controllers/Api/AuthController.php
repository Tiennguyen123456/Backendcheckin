<?php
namespace App\Http\Controllers\Api;

use App\Enums\MessageCodeEnum;
use App\Services\Api\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\Auth\LoginResource;

class AuthController extends Controller
{
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function login(LoginRequest $request)
    {
        $this->service->attributes = $request->all();
        $result = $this->service->authenticate();

        if ($result['auth']) {
            return $this->responseSuccess(LoginResource::make(auth('api')->user()), $result['msg'], 200, MessageCodeEnum::LOGIN_SUCCESS);
        } else {
            return $this->responseError($result['msg'], 401, MessageCodeEnum::USER_NAME_OR_PASSWORD_INCORRECT);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Helpers\Status;
use App\Helpers\HttpCode;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Response;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            $errors['auth'] = "Invalid email or password";
            return ResponseHelper::send([], Status::NG, HttpCode::UNAUTHORIZED, $errors);
        }
        return ResponseHelper::send(['token' => $token, 'info' => new UserResource(auth('api')->user())]);
    }

    public function getUser(): JsonResponse
    {
        return ResponseHelper::send(['info' => new UserResource(auth('api')->user())]);
    }



    public function logout(): JsonResponse
    {
        auth('api')->logout();
        return ResponseHelper::send([]);
    }
}

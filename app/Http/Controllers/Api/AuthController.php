<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Users\UserResource;
use App\Services\AuthServices;


class AuthController extends Controller
{


    /**
     * @post auth/register
     * @params email, password
     * @param AuthServices $authService
     * @param RegisterRequest $request
     */
    public function register(AuthServices $authService, RegisterRequest $request)
    {
        $user = $authService->register($request->all());
        if ($user){
            $this->response['data'] = new UserResource($user);
        }

        return $this->sendResponse();
    }

    /**
     * @post auth/login
     * @params email, password
     * @param AuthServices $authService
     * @param LoginRequest $request
     */
    public function login(AuthServices $authService, LoginRequest $request)
    {
        $user = $authService->login($request->only('email', 'password'));
        if (!$user) {
            $this->response = [
                'message' => __('auth.failed'),
                'success' => false,
            ];
            return $this->sendResponse();
        }


        $this->response['data'] = new UserResource($user);
        return $this->sendResponse();
    }

    /**
     * @post auth/logout
     */
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        $this->response['message'] = 'Logout success';
        return $this->sendResponse();
    }

    /**
     * @get auth/resend-verification
     * @params email
     */
    public function resendVerification()
    {

    }

    /**
     * @get auth/verify
     * @params token
     */
    public function verify()
    {

    }

    /**
     * @post auth/forget-password
     * @params email
     */
    public function forgetPassword()
    {

    }

    /**
     * @post auth/set-password
     * @params email
     */
    public function setPassword()
    {

    }
}

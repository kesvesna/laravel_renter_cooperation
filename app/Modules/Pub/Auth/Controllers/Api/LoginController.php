<?php

namespace App\Modules\Pub\Auth\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Pub\Auth\Requests\LoginRequest;
use App\Services\Response\ResponseService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return ResponseService::sendJsonResponse(
                false,
                403,
                ['message' => __('auth.login_error')],
                []
            );
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        return ResponseService::sendJsonResponse(
            true,
            200,
            [],
            [
                'api_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                //'expires_at' => Carbon::parse($tokenResult->accessToken->token->expires_at)->toDateTimeString(),
                'user' => $user,

            ]
        );
    }
}

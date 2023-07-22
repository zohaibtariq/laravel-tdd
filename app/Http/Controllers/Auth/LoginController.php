<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $user = User::whereEmail($request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password))
            return response(['message' => 'Email or password is not correct'], Response::HTTP_UNAUTHORIZED);
        $token = $user->createToken('api');
        return response([
            'token' => $token->plainTextToken
        ]);
    }
}

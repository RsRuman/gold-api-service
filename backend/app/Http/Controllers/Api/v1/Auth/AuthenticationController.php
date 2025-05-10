<?php

namespace App\Http\Controllers\Api\v1\Auth;

use AllowDynamicProperties;
use App\Contracts\Auth\AuthenticationRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as HttpResponse;

#[AllowDynamicProperties]
class AuthenticationController extends Controller
{
    public function __construct(AuthenticationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Sign up
     * @param SignUpRequest $request
     * @return JsonResponse
     */
    public function signUp(SignUpRequest $request): JsonResponse
    {
        $data             = $request->safe()->only('name', 'email');
        $data['password'] = bcrypt($request->input('password'));

        $user = $this->repository->storeUser($data);

        if (!$user) {
            return Response::json([
                'message' => 'Sign up is not successful. Please try later.'
            ], HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        return Response::json([
            'message' => 'Sign up is successful.'
        ], HttpResponse::HTTP_CREATED);
    }

    /**
     * Login
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->only('email', 'password');

        $token = $this->repository->getToken($data);

        if (!$token) {
            return Response::json([
                'message' => 'Invalid credentials. Please try again with valid one.'
            ], HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        return Response::json([
            'message' => 'Sign in successful.',
            'token'   => $token
        ], HttpResponse::HTTP_OK);
    }

    /**
     * Logout
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();

        $this->repository->deleteToken($user);

        return Response::json([
            'message' => 'Logout successful.'
        ], HttpResponse::HTTP_OK);
    }

    /**
     * Auth user info
     * @param Request $request
     * @return JsonResponse
     */
    public function me(Request $request): JsonResponse
    {
        $me = $this->repository->myInfo($request->user());

        return Response::json([
            'message' => 'Profile information get successfully.',
            'data' => $me
        ], HttpResponse::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserAuthenticationService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UserAuthenticationController extends BaseApiController
{
    /**
     * @var UserAuthenticationService $userAuthenticationService
     */
    private $userAuthenticationService;

    /**
     * UserController constructor.
     *
     * @param UserAuthenticationService $userAuthenticationService
     */
    public function __construct(UserAuthenticationService $userAuthenticationService)
    {
        $this->userAuthenticationService = $userAuthenticationService;
    }

    /**
     * Method to check user credentials from DB.
     *
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request)
    {
        $result = $this->userAuthenticationService->userLogin($request);
        if ($result) {
            return $this->sendResponse($result, Response::HTTP_OK);
        }

        return $this->sendResponse(
            [],
            Response::HTTP_UNAUTHORIZED,
            trans('api/user.auth.login_failed')
        );
    }

    /**
     * Method to create a new user.
     *
     * @param UserRegisterRequest $request
     * @return JsonResponse
     */
    public function register(UserRegisterRequest $request)
    {
        dd('coming ');
        $result = $this->userAuthenticationService->userRegister($request);
        if ($result) {
            return $this->sendResponse([], Response::HTTP_OK);
        }

        return $this->sendResponse([],
            Response::HTTP_UNAUTHORIZED,
            trans('api/user.auth.signup_failed')
        );
    }
}

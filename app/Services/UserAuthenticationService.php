<?php

namespace App\Services;

use App\Helpers\PassportHelper;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthenticationService
{
    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Method to check the user credentials and to create access token for the user.
     *
     * @param  $request
     * @return bool
     */
    public function userLogin($request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password ])) {
            if (Auth::user()) {
                return PassportHelper::getAccessToken($request->email, $request->password);
            }
            return false;
        } else {
            return false;
        }
    }

    /**
     * Method to register the user.
     *
     * @param  $request
     * @return bool
     */
    public function userRegister($request)
    {
        $inputData = $request->all();

        // Unset the password_confirmation field from the array.
        unset($inputData['password_confirmation']);

        $inputData['password'] = Hash::make($inputData['password']);

        $user = $this->userRepository->create($inputData);
        if ($user) {
            return true;
        }

        return false;
    }
}

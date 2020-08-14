<?php

namespace App\Services\Auth;

use App\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Auth\Passwords\PasswordBrokerManager;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class AuthService
 * @package App\Services
 */
class AuthService
{
    /**
     * @var \Illuminate\Auth\AuthManager
     */
    protected $authManager;
    /**
     * @var \Illuminate\Auth\Passwords\PasswordBrokerManager
     */
    protected $passwordBrokerManager;
    /**
     * @var \App\User
     */
    protected $user;

    /**
     * AuthService constructor.
     *
     * @param \Illuminate\Auth\AuthManager $authManager
     * @param \Illuminate\Auth\Passwords\PasswordBrokerManager $passwordBrokerManager
     * @param \App\Models\User $user
     */
    public function __construct(AuthManager $authManager, PasswordBrokerManager $passwordBrokerManager, User $user)
    {
        $this->authManager           = $authManager;
        $this->passwordBrokerManager = $passwordBrokerManager;
        $this->user                  = $user;
    }

    /**
     * @param $credentials
     *
     * @return bool
     */
    public function authenticate($credentials)
    {
        return $this->authManager
            ->guard()
            ->attempt($credentials);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function register(Request $request)
    {

        $merge   = array(
            'email_verified_at' => now(),
            'password'          => bcrypt($request->get('password')),
            'remember_token'    => Str::random(10),
            'api_token'         => $this->generateAccessToken(),
        );
        $request = array_merge($request->all(), $merge);
        return $this->user->create($request);
    }

    /**
     * @param User $user
     */
    public function updateAccessToken(User $user)
    {
        $token = $this->generateAccessToken();

        $user->update(['api_token' => $token]);
    }


    /**
     * @return string
     */
    public function generateAccessToken(): string
    {
        return Str::random(60);
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function logout(Request $request)
    {
        return $request->user()->token()->revoke();
    }

}

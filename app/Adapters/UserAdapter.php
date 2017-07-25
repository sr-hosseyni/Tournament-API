<?php

namespace BMS\Adapters;

use BMS\Entities\Entity;
use BMS\Entities\User;
use BMS\Guards\JWTGuard;
use Illuminate\Auth\AuthManager;
use Illuminate\Foundation\Application;
use Tymon\JWTAuth\Providers\User\UserInterface;

class UserAdapter implements UserInterface
{

    /**
     * @var UserInterface $provider
     */
    protected $provider;

    /**
     * @param AuthManager $auth
     */
    public function __construct(User $user, Application $app) //, AuthManager $auth)
    {
        /* @var $auth AuthManager */
        $auth = $app['auth'];

        /* @var $guard JWTGuard */
        $guard = $auth->guard('api');

        $this->provider = $guard->getProvider();
    }

    /**
     * Get the user by the given key, value.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return Entity|null
     */
    public function getBy($key, $value)
    {
        return $this->provider->getBy($key, $value);
    }
}

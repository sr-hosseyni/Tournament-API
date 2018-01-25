<?php

namespace Tournament\Adapters;

use Tournament\Entities\Entity;
use Tournament\Entities\User;
use Tournament\Guards\JWTGuard;
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
    public function __construct(User $user)//, Application $app) //, AuthManager $auth)
    {
        /* @var $auth AuthManager */
//        $auth = $app['auth'];
        $auth = auth();

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

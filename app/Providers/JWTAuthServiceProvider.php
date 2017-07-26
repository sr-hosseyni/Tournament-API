<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BMS\Providers;

use BMS\Security\JWTAuth;
use Tymon\JWTAuth\Providers\JWTAuthServiceProvider as BaseJWTAuthServiceProvider;

/**
 * Description of JWTAuthServiceProvider
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class JWTAuthServiceProvider extends BaseJWTAuthServiceProvider
{
    /**
     * Register the bindings for the main JWTAuth class.
     */
    protected function registerJWTAuth()
    {
        $this->app->singleton('tymon.jwt.auth', function ($app) {
            $auth = new JWTAuth(
                $app['tymon.jwt.manager'],
                $app['tymon.jwt.provider.user'],
                $app['tymon.jwt.provider.auth'],
                $app['request']
            );

            return $auth->setIdentifier($this->config('identifier'));
        });
    }
}

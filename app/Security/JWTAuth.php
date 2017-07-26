<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BMS\Security;

use Tymon\JWTAuth\JWTAuth as BaseJWTAuth;

/**
 * Description of JWTAuth
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class JWTAuth extends BaseJWTAuth
{
    public function fromUser($user, array $customClaims = array())
    {
        $payload = $this->makePayload($user->{'get' . ucfirst($this->identifier)}(), $customClaims);

        return $this->manager->encode($payload)->get();
    }
}

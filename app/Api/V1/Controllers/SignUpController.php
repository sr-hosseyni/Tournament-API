<?php

namespace BMS\Api\V1\Controllers;

use BMS\API\V1\Controllers\APIController;
use BMS\API\V1\Entities\User;
use BMS\Api\V1\Requests\SignUpRequest;
use BMS\Security\JWTAuth;
use Config;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SignUpController extends APIController
{
    /**
     *
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        parent::__construct();
    }

    public function signUp(SignUpRequest $request, JWTAuth $JWTAuth)
    {
        $this->em->persist(
            $user = User::getInstance()
                ->setFirstName($request->get('first_name'))
                ->setUsername($request->get('username'))
                ->setPassword($request->get('password'))
                ->setEmail($request->get('email'))
        );

        try {
            $this->em->flush();
        } catch (\Exception $ex) {
            throw new HttpException(500);
        }

        if(!Config::get('boilerplate.sign_up.release_token')) {
            return response()->json([
                'status' => 'ok'
            ], 201);
        }
        $token = $JWTAuth->fromUser($user);
        
        return response()->json([
            'status' => 'ok',
            'token' => $token
        ], 201);
    }
}

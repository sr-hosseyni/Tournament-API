<?php

namespace Tournament\Api\V1\Controllers;

use Tournament\API\V1\Controllers\APIController;
use Tournament\API\V1\Entities\User;
use Tournament\Api\V1\Requests\SignUpRequest;
use Tournament\Security\JWTAuth;
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
        /**
         * @todo take a look at https://github.com/tymondesigns/jwt-auth/issues/845
         */
        $this->em = $em;
        parent::__construct();
    }

    public function signUp(SignUpRequest $request, JWTAuth $JWTAuth)
    {
        $this->em->persist(
            $user = User::getInstance()
                ->setFname($request->get('fname'))
                ->setLname($request->get('lname'))
                ->setUsername($request->get('username'))
                ->setPassword($request->get('password'))
                ->setEmail($request->get('email'))
        );

        try {
            $this->em->flush();
        } catch (\Exception $ex) {
            throw new HttpException(500, $ex->getMessage());
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

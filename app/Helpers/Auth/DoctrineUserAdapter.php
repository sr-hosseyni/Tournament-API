<?php

namespace Tournament\Helpers\Auth;

use Doctrine\ORM\EntityManager;
use Tymon\JWTAuth\Providers\User\UserInterface;

/**
 * Description of DoctrineUserAdapter
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class DoctrineUserAdapter implements UserInterface
{
    /**
     *
     * @var EntityManager
     */
    private $em;

    /**
     *
     * @var type
     */
    private $user;

    public function __construct($user, EntityManager $em)
    {
        $this->user = $user;
        $this->em = $em;
    }

    public function getBy($key, $value)
    {
//        return $this->em->getRepository(\Tournament\Entities\User::class)->findOneBy([$key => $value]);
        return $this->em->getRepository(get_class($this->user))->findOneBy([$key => $value]);
    }
}

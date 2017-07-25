<?php

use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Database\Seeder;

abstract class BaseSeeder extends Seeder
{
    /**
     *
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


}

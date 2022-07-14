<?php

namespace App\Repository;

use App\Entity\Levels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LevelsRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     * @method Levels|null find($id, $lockMode = null, $lockVersion = null)
     * @method Levels|null findOneBy(array $criteria, array $orderBy = null)
     * @method Levels[]    findAll()
     * @method Levels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Levels::class);
    }
}
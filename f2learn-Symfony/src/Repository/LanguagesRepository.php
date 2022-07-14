<?php

namespace App\Repository;

use App\Entity\Languages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LanguagesRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     * @method Languages|null find($id, $lockMode = null, $lockVersion = null)
     * @method Languages|null findOneBy(array $criteria, array $orderBy = null)
     * @method Languages[]    findAll()
     * @method Languages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Languages::class);
    }
}
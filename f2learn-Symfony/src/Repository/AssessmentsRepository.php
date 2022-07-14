<?php

namespace App\Repository;

use App\Entity\Assessments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AssessmentsRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     * @method Assessments|null find($id, $lockMode = null, $lockVersion = null)
     * @method Assessments|null findOneBy(array $criteria, array $orderBy = null)
     * @method Assessments[]    findAll()
     * @method Assessments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Assessments::class);
    }
}
<?php

namespace App\Repository;

use App\Entity\Courses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CoursesRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     * @method Courses|null find($id, $lockMode = null, $lockVersion = null)
     * @method Courses|null findOneBy(array $criteria, array $orderBy = null)
     * @method Courses[]    findAll()
     * @method Courses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Courses::class);
    }

    /**
    * @return Courses[] Returns an array of MyEntity objects
    */
    public function findLikeTitle(string $value)
    {
        $qb = $this->createQueryBuilder('c');

        $qb ->andWhere($qb->expr()->like('c.title', ':val'))
            ->setParameter('val', '%'.$value.'%');

        return $qb->getQuery()->getResult();
    }

    /**
     * @return Courses[] Returns an array of MyEntity objects
     */
    public function findCoursesOrdered(string $order, string $direction): array
    {
        $qb = $this->createQueryBuilder('course');

        $qb->orderBy('course.' . $order, $direction);

        return $qb->getQuery()->getResult();
    }
}
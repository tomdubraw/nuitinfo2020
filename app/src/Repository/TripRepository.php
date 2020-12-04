<?php

namespace App\Repository;

use App\Entity\Trip;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Trip|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trip|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trip[]    findAll()
 * @method Trip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TripRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trip::class);
    }

    public function getTripByUserQuery(User $user)
    {
        return $this->createQueryBuilder('t')
            ->join('t.waterman', 'w')
            ->join('w.user', 'u')
            ->andWhere('u.id = :user')
            ->setParameter('user', $user)
            ->orderBy('t.endtime')
            ->getQuery();
    }
}

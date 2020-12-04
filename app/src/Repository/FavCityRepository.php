<?php

namespace App\Repository;

use App\Entity\FavCity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FavCity|null find($id, $lockMode = null, $lockVersion = null)
 * @method FavCity|null findOneBy(array $criteria, array $orderBy = null)
 * @method FavCity[]    findAll()
 * @method FavCity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FavCityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FavCity::class);
    }

    public function getCities($user)
    {
        return $this->createQueryBuilder('c')
            ->select('c.label')
            ->distinct()
            ->andWhere('c.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult()
            ;
    }
}

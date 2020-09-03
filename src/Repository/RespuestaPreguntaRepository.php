<?php

namespace App\Repository;

use App\Entity\RespuestaPregunta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RespuestaPregunta|null find($id, $lockMode = null, $lockVersion = null)
 * @method RespuestaPregunta|null findOneBy(array $criteria, array $orderBy = null)
 * @method RespuestaPregunta[]    findAll()
 * @method RespuestaPregunta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RespuestaPreguntaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RespuestaPregunta::class);
    }

    // /**
    //  * @return RespuestaPregunta[] Returns an array of RespuestaPregunta objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RespuestaPregunta
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

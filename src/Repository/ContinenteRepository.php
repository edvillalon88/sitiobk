<?php

namespace App\Repository;

use App\Entity\Continente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Continente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Continente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Continente[]    findAll()
 * @method Continente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContinenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Continente::class);
    }

    // /**
    //  * @return Continente[] Returns an array of Continente objects
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
    public function findOneBySomeField($value): ?Continente
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

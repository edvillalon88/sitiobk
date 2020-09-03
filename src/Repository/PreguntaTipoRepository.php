<?php

namespace App\Repository;

use App\Entity\PreguntaTipo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PreguntaTipo|null find($id, $lockMode = null, $lockVersion = null)
 * @method PreguntaTipo|null findOneBy(array $criteria, array $orderBy = null)
 * @method PreguntaTipo[]    findAll()
 * @method PreguntaTipo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreguntaTipoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PreguntaTipo::class);
    }

    // /**
    //  * @return PreguntaTipo[] Returns an array of PreguntaTipo objects
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
    public function findOneBySomeField($value): ?PreguntaTipo
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

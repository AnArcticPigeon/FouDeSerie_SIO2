<?php

namespace App\Repository;

use App\Entity\WebSerie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WebSerie>
 *
 * @method WebSerie|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebSerie|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebSerie[]    findAll()
 * @method WebSerie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebSerieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WebSerie::class);
    }

//    /**
//     * @return WebSerie[] Returns an array of WebSerie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WebSerie
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

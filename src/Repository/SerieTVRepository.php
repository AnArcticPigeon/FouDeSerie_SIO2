<?php

namespace App\Repository;

use App\Entity\SerieTV;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SerieTV>
 *
 * @method SerieTV|null find($id, $lockMode = null, $lockVersion = null)
 * @method SerieTV|null findOneBy(array $criteria, array $orderBy = null)
 * @method SerieTV[]    findAll()
 * @method SerieTV[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SerieTVRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SerieTV::class);
    }

//    /**
//     * @return SerieTV[] Returns an array of SerieTV objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SerieTV
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

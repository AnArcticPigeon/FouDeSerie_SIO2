<?php

namespace App\Repository;

use App\Entity\PokemonCasanier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PokemonCasanier>
 *
 * @method PokemonCasanier|null find($id, $lockMode = null, $lockVersion = null)
 * @method PokemonCasanier|null findOneBy(array $criteria, array $orderBy = null)
 * @method PokemonCasanier[]    findAll()
 * @method PokemonCasanier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PokemonCasanierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PokemonCasanier::class);
    }

//    /**
//     * @return PokemonCasanier[] Returns an array of PokemonCasanier objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PokemonCasanier
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

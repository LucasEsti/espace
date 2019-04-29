<?php

namespace App\Repository;

use App\Entity\EspaceActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EspaceActivite|null find($id, $lockMode = null, $lockVersion = null)
 * @method EspaceActivite|null findOneBy(array $criteria, array $orderBy = null)
 * @method EspaceActivite[]    findAll()
 * @method EspaceActivite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspaceActiviteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EspaceActivite::class);
    }

    // /**
    //  * @return EspaceActivite[] Returns an array of EspaceActivite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EspaceActivite
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\EspacePhotos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EspacePhotos|null find($id, $lockMode = null, $lockVersion = null)
 * @method EspacePhotos|null findOneBy(array $criteria, array $orderBy = null)
 * @method EspacePhotos[]    findAll()
 * @method EspacePhotos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspacePhotosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EspacePhotos::class);
    }

    // /**
    //  * @return EspacePhotos[] Returns an array of EspacePhotos objects
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
    public function findOneBySomeField($value): ?EspacePhotos
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

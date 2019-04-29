<?php

namespace App\Repository;

use App\Entity\MenuEspace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MenuEspace|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuEspace|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuEspace[]    findAll()
 * @method MenuEspace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuEspaceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MenuEspace::class);
    }

    // /**
    //  * @return MenuEspace[] Returns an array of MenuEspace objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MenuEspace
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

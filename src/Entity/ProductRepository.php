<?php

namespace App\Entity;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Doctrine\ORM\NoResultException
     */
    public function countAvailable(): string
    {
        return $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->where('p.availability = :available')
            ->setParameter('available', true)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getUnavailable(): array
    {
       return $this->createQueryBuilder('p')
           ->where('p.availability = :available')
           ->setParameter('available', false)
           ->getQuery()
           ->getResult();
    }


    public function findByName(string $namePhrase): array
    {
        $qb = $this->createQueryBuilder('p');

        return $qb->where($qb->expr()->like('p.name', ':namePhrase'))
            ->setParameter('namePhrase', '%' . $namePhrase . '%')
            ->getQuery()
            ->getResult();
    }
}

<?php

namespace App\Entity;

use App\Entity\ProductCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductCategory[]    findAll()
 * @method ProductCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductCategory::class);
    }

    public function countAvailableProductsInCategory(int $categoryId): string
    {
        return $this->createQueryBuilder('c')
            ->select('count(ps.id)')
            ->innerJoin('c.products', 'ps')
            ->where('ps.availability = :available')
            ->setParameter('available', true)
            ->andWhere('c.id = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getProductsInCategory(int $categoryId, string $order = 'ASC'): array
    {
        return  $this->getEntityManager()
            ->createQueryBuilder()
            ->select('p')
            ->from(Product::class, 'p')
            ->innerJoin('p.categories', 'c')
            ->where('c.id = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->orderBy('p.name', $order)
            ->getQuery()
            ->getResult();
    }
}

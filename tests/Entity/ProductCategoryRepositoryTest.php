<?php


namespace App\Tests\Entity;


use App\Entity\ProductCategory;
use App\Entity\ProductCategoryRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductCategoryRepositoryTest extends KernelTestCase
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testCountAvailableProductsInCategory(): void
    {
        /** @var ProductCategoryRepository $repo */
        $repo = $this->entityManager->getRepository(ProductCategory::class);

        $result = $repo->countAvailableProductsInCategory(1);
        $this->assertTrue(is_numeric($result));
    }

    public function testGetProductsInCategory(): void
    {
        /** @var ProductCategoryRepository $repo */
        $repo = $this->entityManager->getRepository(ProductCategory::class);

        $result = $repo->getProductsInCategory(1);
        $this->assertTrue(is_array($result));
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null; // avoid memory leaks
    }
}
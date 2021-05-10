<?php


namespace App\Tests\Entity;


use App\Entity\Product;
use App\Entity\ProductRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductRepositoryTest extends KernelTestCase
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

    public function testCountAvailable(): void
    {
        /** @var ProductRepository $repo */
        $repo = $this->entityManager->getRepository(Product::class);
        $result = $repo->countAvailable();
        $this->assertTrue(is_numeric($result));
    }

    public function testGetUnavailable(): void
    {
        /** @var ProductRepository $repo */
        $repo = $this->entityManager->getRepository(Product::class);
        $result = $repo->getUnavailable();
        $this->assertTrue(is_array($result));
    }

    public function testFindByName(): void
    {
        /** @var ProductRepository $repo */
        $repo = $this->entityManager->getRepository(Product::class);
        $result = $repo->findByName('Prod');
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
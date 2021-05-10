<?php


namespace App\DataFixtures;


use App\Entity\Product;
use App\Entity\ProductCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductsAndCategoriesFixtures extends Fixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $category1 = new ProductCategory();
        $manager->persist($category1);
        $category2 = new ProductCategory();
        $manager->persist($category2);
        $category3 = new ProductCategory();
        $manager->persist($category3);

        $product1 = new Product();
        $product1->setAvailability(true)
            ->setName('Product 1')
            ->setPrice(12.34);
        $product1->addCategory($category1)->addCategory($category2);
        $manager->persist($product1);

        $product2 = new Product();
        $product2->setAvailability(false)
            ->setName('Product 2')
            ->setPrice(0.50);
        $product2->addCategory($category2)->addCategory($category3);
        $manager->persist($product2);

        $product3 = new Product();
        $product3->setAvailability(true)
            ->setName('Product 3')
            ->setPrice(100);
        $manager->persist($product3);

        $manager->flush();
    }
}
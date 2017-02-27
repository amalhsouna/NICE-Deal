<?php


namespace Tests\back\ProductBundle\ModelManager;

use Doctrine\ORM\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;

class ProductMangerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Registry
     */
    private $doctrine;

    public function setUp()
    {
        $this->doctrine = $this->getMockBuilder(Registry::class);
    }

    public function testgetProductsDeals()
    {
        $arboMenuRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Products');
        return $arboMenuRepository->findAllZipCodes();
    }
}

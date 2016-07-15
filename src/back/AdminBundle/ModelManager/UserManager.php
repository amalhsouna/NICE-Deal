<?php

/**
 * Manager of Product.
 *
 * @author  Amal Hsouna
 */
namespace back\AdminBundle\ModelManager;

use Doctrine\Bundle\DoctrineBundle\Registry;

class UserManager
{
    /**
     * return Registry $doctrine The doctrine.
     */
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->entityManagerEcommerce = $doctrine->getManager();
        $this->userRepository = $this->entityManagerEcommerce->getRepository('backAdminBundle:User');
        $this->productRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Products');
    }

    /**
     * return list of custmer connect.
     */
    public function getNbrUserConnect()
    {
        return  $this->userRepository->findUserByDate();
    }
    
    /**
     * return list of custmer connect.
     */
    public function getProductByDate()
    {
        return  $this->productRepository->findCountProductByDate();
    }
}

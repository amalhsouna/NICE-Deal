<?php

/**
 * Manager of Product.
 *
 * @package ProductBundle
 * @author  Amal Hsouna
 */

namespace front\CustomerBundle\ModelManager;

use Doctrine\ORM\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;

class CustomerManger
{
    public function __construct(Registry $doctrine)
    {
        $this->doctrine             = $doctrine;
        $this->entityManagerEcommerce = $doctrine->getManager();
        $this->customerRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Customer');
    }
    
    /**
     * post products
     * 
     */
    public function postCustomerDeals($customer)
    {
        return $this->customerRepository->save($customer);
    }
}

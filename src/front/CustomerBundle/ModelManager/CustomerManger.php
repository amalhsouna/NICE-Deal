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
        $this->doctrine = $doctrine;
        $this->entityManagerEcommerce = $doctrine->getManager();
        $this->customerRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Customer');
        $this->ordersRepository = $this->entityManagerEcommerce->getRepository('EntityEcommerceBundle:Orders');
    }
    
    /**
     * post Customer
     * 
     */
    public function postCustomerDeals($customer)
    {
        return $this->customerRepository->save($customer);
    }
    
    /**
     * login customer
     * 
     */
    public function loginCustomerDeals()
    {
        return $this->customerRepository->save($customer);
    }
    
    /**
     * list of order by customer idnetifier
     * 
     */
    public function listOrdersbyCustomer($customer)
    {
        return $this->ordersRepository->findByCustomer($customer);
    }
}

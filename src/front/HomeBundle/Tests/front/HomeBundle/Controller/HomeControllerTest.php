<?php

namespace front\HomeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class HomeControllerTest extends WebTestCase
{
    /**
     *  @var client
     */
    protected $client = null;
    
    /**
     * The setter of attributes.
     * 
     * @return void  
     */
    public function setUp()
    {
        $this->client = static::createClient();
        $this->client->setServerParameter('HTTP_HOST', $this->client->getContainer()->getParameter('test_host_name'));
    }
    
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertContains('Hello World', $client->getResponse()->getContent());
    }
}

<?php

namespace CovoiturageBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PassagerControllerTest extends WebTestCase
{
    public function testView()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/passager/view');
    }

    public function testViewall()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/passager/view_all');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/passager/add');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/passager/edit');
    }

    public function testRemove()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/passager/remove');
    }

}

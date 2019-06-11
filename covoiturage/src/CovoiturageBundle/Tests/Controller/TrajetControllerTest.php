<?php

namespace CovoiturageBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TrajetControllerTest extends WebTestCase
{
    public function testView()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/trajet/view');
    }

    public function testViewall()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/trajet/view_all');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/trajet/add');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/trajet/edit');
    }

    public function testRemove()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/trajet/remove');
    }

}

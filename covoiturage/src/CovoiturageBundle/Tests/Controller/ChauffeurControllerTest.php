<?php

namespace CovoiturageBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChauffeurControllerTest extends WebTestCase
{
    public function testView()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/chauffeur/view');
    }

    public function testViewall()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/chauffeur/view_all');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/chauffeur/add');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/chauffeur/edit');
    }

    public function testRemove()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/chauffeur/remove');
    }

}

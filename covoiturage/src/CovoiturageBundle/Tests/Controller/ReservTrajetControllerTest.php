<?php

namespace CovoiturageBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReservTrajetControllerTest extends WebTestCase
{
    public function testView()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/reserv_trajet/view');
    }

    public function testViewall()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/reserv_trajet/view_all');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/reserv_trajet/add');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/reserv_trajet/edit');
    }

    public function testRemove()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/reserv_trajet/remove');
    }

}

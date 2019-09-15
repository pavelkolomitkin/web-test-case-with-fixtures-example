<?php

namespace App\Tests\Controller;

use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ItemController2Test extends WebTestCase
{
    use RefreshDatabaseTrait;

    public function testGetItemList()
    {
        $client = static::createClient();
        $client->followRedirects(true);

        $client->request('GET', '/item', [], [], [
            'CONTENT_TYPE' => 'application/json',
        ]);

        $data = json_decode($client->getResponse()->getContent());
//        var_dump($data);

        $this->assertEquals(10, count($data), 'There should be 10 items!');
    }
}
<?php

namespace App\Tests\Controller;

use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ItemController1Test extends WebTestCase
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

        $this->assertNotNull($data, 'The data should not be null!');

        $client->request('DELETE', '/item/2');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/item', [], [], [
            'CONTENT_TYPE' => 'application/json',
        ]);

        $data = json_decode($client->getResponse()->getContent());
        $this->assertEquals(9, count($data), 'There should be 9 items!');
    }
}
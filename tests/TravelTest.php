<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TravelTest extends TestCase {

    public function testPublish()
    {
        $response = $this->call("POST", "rest/publish", ['uid'=>1,'tid'=>1,'content'=>'test contnet']);
        $this->assertEquals('Hello World', $response->getContent());
        //$this->assertTrue(true);
    }

}
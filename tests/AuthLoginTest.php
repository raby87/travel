<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthLoginTest extends TestCase {

    public function testPublish()
    {
        $response = $this->call("GET", "http://www.baidu.com", ['uid'=>1,'content'=>'test contnet']);
        $this->assertEquals('true', $response->getContent());
    }

}
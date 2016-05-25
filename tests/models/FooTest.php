<?php

/**
 * Created by oseintow.
 * User: oseintow
 * Date: 5/22/16
 * Time: 10:12 PM
 */
class FooTest extends PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        Mockery::close();
    }

    public function testCreatesFile()
    {
//        File::shouldReceive('put')->once();

//        $this->call('GET', 'foo');
    }

}

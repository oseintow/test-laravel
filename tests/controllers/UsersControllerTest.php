<?php

/**
 * Created by oseintow.
 * User: oseintow
 * Date: 5/24/16
 * Time: 4:10 PM
 */
class UsersControllerTest extends TestCase
{

    protected $mock;

    public function tearDown()
    {
        Mockery::close();
    }

    protected function mock($class)
    {
        $this->mock = Mockery::mock();
        App::instance($class, $this->mock);
    }

    public function testIndex()
    {
        app()->instance(\App\User::class, Mockery::mock(['all'=>'foo']));
        $this->call("GET",'users');
    }

    public function testIndexWithExpectation(){
        $mock = Mockery::mock();
//        $mock->shouldReceive('all')->once()->andReturn('foo');
        app()->instance(\App\User::class, $mock);

        $this->call('GET', 'users');
    }

}

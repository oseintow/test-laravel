<?php

/**
 * Created by oseintow.
 * User: oseintow
 * Date: 5/22/16
 * Time: 9:43 AM
 */
class UserTest extends TestCase {

    public function setUp(){
        parent::setUp();

        Artisan::call('migrate:refresh');
    }

//    public function testGetsOldestUser()
//    {
//
//        // Integration testing
//        // Arrange: Insert two test rows into a test DB
//        factory(App\User::class)->make(['age' => 20]);
//        factory(App\User::class)->make(['age' => 30]);
//
//        // Act: call the method
//        $oldest = (new App\User)->getOldest();
//
//        // Assert
//        $this->assertEquals(30, $oldest->age);
//    }

    public function testHashesPasswordWhenSet(){
        Hash::shouldReceive('make')->once()->andReturn('hashed');

        $author = new App\User;
        $author->password = 'foo';

        $this->assertEquals('hashed', $author->password);
    }

    public function testHasManyPosts(){
//        $this->assertHasOne('post', 'App\User');
//        $this->assertBelongsTo('post', 'App\User');
//        $this->assertHasMany('posts', 'App\User');

    }

}

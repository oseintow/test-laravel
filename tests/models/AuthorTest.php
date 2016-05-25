<?php

/**
 * Created by oseintow.
 * User: oseintow
 * Date: 5/22/16
 * Time: 4:14 PM
 */
class AuthorTest extends TestCase {

    use ModelHelpers;

    public function setUp(){
        parent::setUp();

//        Artisan::call('migrate:refresh');
    }

    public function testIsInvalidWithoutAName()
    {
        $author = new App\Author;

        $this->assertFalse($author->validate(),'Expected validation to fail.');
    }

    public function testIsInvalidWithoutAValidEmail()
    {
        // Set  fixture
        $author = new App\Author;
        $author->name = 'Joe';
        $author->email = 'Foo';

        $this->assertNotValid($author);
    }

    public function testIsInvalidWithoutUniqueEmail()
    {
//        $author = new App\Author;
//        $author->name = 'Joe';
//        $author->email = 'joe@example.com';
//        $author->save();

        App\Author::where('name','Joe')->delete();
        factory(App\Author::class)->create([
            'name' => 'Joe',
            'email' => 'joe@example.com'
        ]);

        $author = new App\Author;
        $author->name = 'Joe';
        $author->email = 'joe@example.com';

        $this->assertNotValid($author);
    }

}

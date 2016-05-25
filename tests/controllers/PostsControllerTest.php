<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Collection;
use App\Post;

class PostsControllerTest extends TestCase
{

    protected $mock;

    protected $post='\App\Repositories\PostRepositoryInterface';

//    public function __construct()
//    {
//        // We have no interest in testing Eloquent
//        $this->mock = Mockery::mock('\App\Repositories\PostRepositoryInterface');
//    }

    public function setUp(){
        parent::setUp();

//        Artisan::call('migrate:refresh');

        $this->mock = $this->mock($this->post);
    }

    public function mock($class)
    {
         $mock = Mockery::mock($class);

         $this->app->instance($class, $mock);
         return $mock;
     }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testIndexWithMocks()
    {
//        $this->mock = Mockery::mock(Post::class);

        $this->mock
            ->shouldReceive('all')
            ->once()
            ->andReturn('foo');

        app()->instance(Post::class, $this->mock);

        $this->call('GET', 'posts');

        $this->assertViewHas('posts');
    }

    public function testStoreWithMocks()
    {
        $input = ['title'=>'My Title'];

//        $this->mock = Mockery::mock(Post::class);

        $this->mock
            ->shouldReceive('create')
            ->with($input)
            ->once();

        $this->app->instance(Post::class, $this->mock);

        $this->call('POST', 'posts', $input);

        $this->assertRedirectedToRoute('posts.index');
    }

    public function testStoreFails()
    {
        // Set stage for a failed validation
        $input = ['title'=>''];

//        $this->mock = Mockery::mock(Post::class);

//        Validator
//            ::shouldReceive('make')
//            ->once()
//            ->andReturn(Mockery::mock(['fails' => 'true']));

        $this->app->instance(Post::class, $this->mock);

        $this->call('POST', 'posts', $input);

        // Failed validation should reload the create form
        $this->assertRedirectedToRoute('posts.create');

        // The errors should be sent to the view
        $this->assertSessionHasErrors(['title']);
    }

    public function testStoreSuccess()
    {
        // Set stage for a failed validation
        $input = ['title'=>'Foo Title'];

//        $this->mock = Mockery::mock(Post::class);

        $this->mock
            ->shouldReceive('create')
            ->once();

        $this->app->instance(Post::class, $this->mock);

        $this->call('POST', 'posts', $input);

        // Failed validation should reload the create form
        $this->assertRedirectedToRoute('posts.index',[],['flash']);

    }

//    public function testIndex()
//    {
////        $this->client->request('GET', '/posts');
//        $response = $this->call('GET', 'posts');
//
//        $this->assertResponseOk();
//
//        $this->assertEquals(200, $response->status());
//
//        $this->assertViewHas('posts');
//
//        // getData() returns all vars attached to the response
//        $posts = $response->original->getData()['posts'];
//
//        $this->assertInstanceOf(Collection::class,$posts);
//    }


    public function testPostControllerIndex()
    {
        $response = $this->action('GET', 'PostsController@index');
    }

    public function testShowId()
    {
        $response = $this->action('GET', 'PostsController@show', ['id'=>1]);
    }

}

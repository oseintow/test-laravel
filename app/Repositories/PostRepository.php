<?php
/**
 * Created by oseintow.
 * User: oseintow
 * Date: 5/24/16
 * Time: 9:17 AM
 */

namespace App\Repositories;


use App\Post;

class PostRepository implements PostRepositoryInterface
{

    /**
     * @var Post
     */
    private $post;


    /**
     * PostRepository constructor.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function all()
    {
        return $this->post->all();
    }

    public function find($id)
    {
        return $this->post->find($id);
    }

    public function create($input)
    {
        return $this->post->create($input);
    }
}
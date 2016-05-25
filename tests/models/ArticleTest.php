<?php

/**
 * Created by oseintow.
 * User: oseintow
 * Date: 5/22/16
 * Time: 9:48 AM
 */
class ArticleTest extends PHPUnit_Framework_TestCase {

    public function testGetsReadablemetaData()
    {
        $article = new App\Article;
        $article->title = 'My First Article';
        $article->author = 'Perd Hapley';

        $this->assertEquals('"My First Article" was written by Perd Hapley.', $article->meta());
    }

}

<?php

/**
 * Created by oseintow.
 * User: oseintow
 * Date: 5/24/16
 * Time: 10:04 AM
 */
class LoginControllerTest extends TestCase
{

    public function testLogin()
    {
        $crawler = $this->visit('logins');

        $crawler->seeElement("h1");

        $crawler->see("good");

        $client = $this->makeRequest("GET","logins");
        $h1 = $client->crawler->filter('h1');
        $this->assertEquals('Please Login', $h1->text());

        $h1 = $client->crawler->filter('h1:contains("Hello World!")');
        $this->assertCount(1, $h1);

        $client->crawler->filter('h2')->eq(3);

        $client->crawler->filter('ul.tasks li')->first();
        $client->crawler->filter('ul.tasks li')->last();

        $siblings = $client->crawler->filter('.question')->siblings();
        $this->assertNotCount(2, $siblings);

        $children = $client->crawler->filter('ul.tasks')->children();
        $this->assertCount(3, $children);
    }

    public function testGetElementContent()
    {
        $client = $this->makeRequest("GET","logins");

        $items = $client->crawler->filter('ul.tasks li');

        // Mpa over the list, and return
        // the text content for each
        $tasks = $items->each(function($node, $i){
            return $node->text();
        });

        // same as this. a shorthand version of the upper code
        $tasks = $items->extract('_text');

        // repace _text with id or class or both
        $className = $items->extract('class');
        $id = $items->extract('id');
        $idAndClass = $items->extract(['id','class']);

    }

    public function testFillForm()
    {
        $client = $this->makeRequest("GET", "logins");

        // Find the form associated with the submit button
        // that has a value of  'Submit'
        $form = $client->crawler->selectButton('Submit')->form();

        // Fill out the form
        $form['first'] = 'Michael';

        $form['last'] = 'Ntow';

        $r = $client->press('Submit');
    }

}

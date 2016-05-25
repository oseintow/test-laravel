<?php

class BaseModelTraitTest extends TestCase {

    protected $model;

    public function setUp(){

        parent::setUp();

        $this->model = $model = new App\BaseModel;

    }

    public function testIsEqual()
    {
        $this->assertEquals(2,2);
    }

}

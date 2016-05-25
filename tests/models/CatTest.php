<?php

/**
 * Created by oseintow.
 * User: oseintow
 * Date: 5/22/16
 * Time: 9:38 AM
 */
class CatTest extends PHPUnit_Framework_TestCase {

    public function testAgeMutator(){
        $cat = new App\Cat;
        $cat->age = 6;

        $this->assertEquals(42,$cat->age);
    }

}

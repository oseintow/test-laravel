<?php
/**
 * Created by oseintow.
 * User: oseintow
 * Date: 5/22/16
 * Time: 10:35 PM
 */

namespace App\FetchProduct;


class Fetch
{

    protected $fetch;

    public function get($platform){
        $c = __NAMESPACE__ . "\\" . $platform;
        if(class_exists($c))
            return (new $c)->fetch();
        throw new InvalidFetchException("Class Doest Not Exists", 404);
    }

}
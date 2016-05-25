<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model{

    public function getAgeAttribute($age){
        return $age;
    }

    public function setAgeAttribute($age){
        return $this->attributes['age'] = $age * 7;
    }

}
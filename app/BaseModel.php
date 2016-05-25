<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class BaseModel extends Model
{

    public $errors;

    public static $rules = [];

    public function validate()
    {
        $v = Validator::make($this->attributes, static::$rules);
        if($v->passes()) return true;

        $this->errors = $v->messages();

        return false;
    }

}

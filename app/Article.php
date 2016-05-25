<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    public function meta(){

        return sprintf('"%s" was written by %s.',
                $this->title,
                $this->author
            );
    }

}
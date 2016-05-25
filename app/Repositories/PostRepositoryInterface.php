<?php

namespace App\Repositories;

interface PostRepositoryInterface
{

    public function all();

    public function find($id);

    public function create($input);

}
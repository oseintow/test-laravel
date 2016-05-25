<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user = null)
    {
        $this->user = $user ?: new User;
    }

    public function index()
    {
        $users = App::make('User')->all();

        return view('users.index',['users' => $users]);
    }

}

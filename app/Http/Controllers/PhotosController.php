<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PhotosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic');
    }

    public function index()
    {
        return response()->json([
            'error' => false,
            'photos' => Auth::user()->photos->toArray()
        ]);
    }


}

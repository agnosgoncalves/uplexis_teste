<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetPostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {     
        $request->user()->authorizeRoles(['mananger']);
        return view('posts.get-data');
    }
}

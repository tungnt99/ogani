<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view,post')->only('show');
    }

    public function show(Post $post)
    {
        // Logic to show post
    }
}

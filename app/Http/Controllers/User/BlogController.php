<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blogs;

class BlogController extends Controller
{
    public function index()
    {
        return inertia('Blogs/Index', [
            'posts' => Blogs::with('author')->latest()->get()
        ]);
    }

    public function show($id)
    {
        return inertia('Blogs/Show', [
            'post' => Blogs::with('author')->findOrFail($id)
        ]);
    }
}

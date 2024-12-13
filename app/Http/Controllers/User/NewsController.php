<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return inertia('News/Index', [
            'posts' => News::with('author')->latest()->get()
        ]);
    }

    public function show($id)
    {
        return inertia('News/Show', [
            'post' => News::with('author')->findOrFail($id)
        ]);
    }
}

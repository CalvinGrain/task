<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blogs;

class BlogsController extends Controller
{
    public function index()
    {
        $this->authorize('show', Blogs::class);

        return inertia('Admin/Blogs/Index',[
            'posts' => Blogs::with('author')->orderBy('id','desc')->get()
        ]);
    }

    public function store(BlogRequest $request)
    {
        $this->authorize('create', Blogs::class);

        Blogs::create([
            ...$request->validated(),
            'author_user_id' => auth()->id()
        ]);

        return redirect()->route('blogs.index')->with('message', 'Item created successfully!');
    }

    public function show($id)
    {
        $this->authorize('show', Blogs::class);

        return inertia('Admin/Blogs/Show', [
            'post' => Blogs::with('author')->findOrFail($id)
        ]);
    }

    public function update(BlogRequest $request, Blogs $blog)
    {
        $this->authorize('update', $blog);

        $blog->update($request->validated());

        return redirect()->route('blogs.index')->with('message', 'Item updated successfully!');
    }

    public function create()
    {
        $this->authorize('create', Blogs::class);

        return inertia('Admin/Blogs/Show');
    }

    public function destroy(Blogs $blog)
    {
        $this->authorize('delete', $blog);

        $blog->delete();

        return redirect()->route('blogs.index')->with('message', 'Item deleted successfully!');
    }
}

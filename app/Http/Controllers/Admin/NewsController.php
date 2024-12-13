<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $this->authorize('show', News::class);

        return inertia('Admin/News/Index', [
            'posts' => News::with('author')->orderBy('id','desc')->get()
        ]);
    }

    public function store(NewsRequest $request)
    {
        $this->authorize('create', News::class);

        News::create([
            ...$request->validated(),
            'author_user_id' => auth()->id()
        ]);

        return redirect()->route('news.index')->with('message', 'Item created successfully!');
    }

    public function show($id)
    {
        $this->authorize('show', News::class);

        return inertia('Admin/News/Show', [
            'post' => News::with('author')->findOrFail($id)
        ]);
    }

    public function update(NewsRequest $request, News $news)
    {
        $this->authorize('update', $news);

        $news->update($request->validated());

        return redirect()->route('news.index')->with('message', 'Item updated successfully!');
    }

    public function create()
    {
        $this->authorize('create', News::class);

        return inertia('Admin/News/Show');
    }

    public function destroy(News $news)
    {
        $this->authorize('delete', $news);

        $news->delete();

        return redirect()->route('news.index')->with('message', 'Item deleted successfully!');
    }
}

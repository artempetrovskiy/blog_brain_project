<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Resources\NewsResource;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function __construct()
    {
        if (!in_array(app('router')->currentRouteName(), ['app.news.index', 'app.news.show']) && !auth()->check()) {
            $this->middleware('auth');
        }
    }

    public function index()
    {
        $newslist = News::query();

        if (request()->filled('tag')) {
            $newslist = $newslist->whereHas('tags', function ($q) {
                $q->where('tag_id', request('tag'));
            });
        }

        if (request()->filled('author')) {
            $newslist = $newslist->where('user_id', request()->author);
        }

        return view('app.news.index', [
            'newslist' => $newslist->paginate(3),
        ]);
    }

    public function create()
    {
        return view('app.news.create', [
            'categories' => Category::orderBy('title')->get(),
            'tags' => Tag::orderBy('title')->get(),
        ]);
    }

    public function store()
    {
         request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $news = News::create(request()->all());

        $news->tags()->attach(request('tags'));

        return redirect()->route('app.news.show', $news);
    }

    public function show(News $news)
    {
        return view('app.news.show', compact('news'));
    }

    public function destroy(News $news)
    {
        $this->checkUser($news);

        $news->tags()->detach();
        $news->delete();

        return redirect()->route('app.news.index');
    }

    public function addComment(Request $request, News $news)
    {
        $validated = $request->validate([
            'message' => 'required|min:5',
            'user_id' => 'required'
        ]);

        $comment = $news->comments()->create($validated);
        return back();
    }

    private function checkUser(News $news) {
        if ($news->user_id !== auth()->user()->id) {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        DB::table('news')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
        ]);

        return redirect()->route('admin.update.news');
    }

}

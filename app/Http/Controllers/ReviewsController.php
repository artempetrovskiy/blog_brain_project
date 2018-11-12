<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    public function __construct()
    {
        if (!in_array(app('router')->currentRouteName(), ['app.reviews.index', 'app.reviews.show']) && !auth()->check()) {
            $this->middleware('auth');
        }
    }

    public function index()
    {
        $reviewslist = Review::query();

        if (request()->filled('tag')) {
            $reviewslist = $reviewslist->whereHas('tags', function ($q) {
                $q->where('tag_id', request('tag'));
            });
        }

        if (request()->filled('author')) {
            $reviewslist = $reviewslist->where('user_id', request()->author);
        }

        return view('app.reviews.index', [
            'reviewslist' => $reviewslist->paginate(3),
        ]);
    }

    public function create()
    {
        return view('app.reviews.create', [
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

        $review = Review::create(request()->all());

        return redirect()->route('app.reviews.show', $review);
    }

    public function show(Review $review)
    {
        return view('app.reviews.show', compact('review'));
    }

    public function destroy(Review $review)
    {
        $this->checkUser($review);

        $review->tags()->detach();
        $review->delete();

        return redirect()->route('app.reviews.index');
    }

    public function addComment(Request $request, Review $review)
    {
        $validated = $request->validate([
            'message' => 'required|min:5',
            'user_id' => 'required'
        ]);

        $comment = $review->comments()->create($validated);
        return back();
    }

    private function checkUser(Review $review) {
        if ($review->user_id !== auth()->user()->id) {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        DB::table('reviews')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
        ]);

        return redirect()->route('admin.update.reviews');
    }
}

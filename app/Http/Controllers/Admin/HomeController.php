<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Media;
use App\Models\News;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function commentsApproveQueue()
    {
        $comments = Comment::all();

        $unApprovedComments = $comments->where('approved', 0);

        return view('admin.approve.comments.index')->with(['unApprovedComments' => $unApprovedComments]);
    }

    public function updateNews()
    {
        $newslist = News::all();

        return view('admin.update.news.index', ['newslist' => $newslist]);
    }




    public function showAllUsers()
    {
        $users = DB::table('users')->get();

        return view('admin.users.index', ['users' => $users]);
    }

    public function showUser(Request $request, $id)
    {
        $user = User::find($id);

        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

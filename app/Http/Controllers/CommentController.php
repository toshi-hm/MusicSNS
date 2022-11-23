<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function index(Comment $comment)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view("comments/index")->with(["comments" => $comment->getPaginateByLimit()]);
    }
    public function show(Comment $comment)
    {
        return view("comments/show")->with(["comment" => $comment]);
    }
    public function create()
    {
        return view("comments/create");
    }
    public function store(CommentRequest $request, Comment $comment)
    {
        $input = $request["comment"];
        // user_idとgoodを入れてあげる
        
        $comment->fill($input)->save();
        return redirect("/comments/" . $comment->id);
    }
    public function edit(Comment $comment)
    {
        return view("comments/edit") -> with(["comment" => $comment]);
    }
    public function update(CommentRequest $request, Comment $comment)
    {
        $input_comment = $request["comment"];
        $comment->fill($input_comment)->save();
        
        return redirect("/comments/" . $comment->id);
    }
    public function delete(Comment $comment)
    {
        $comment -> delete();
        return redirect("/");
    }
}

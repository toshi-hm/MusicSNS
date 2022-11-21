<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

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
}

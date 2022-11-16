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
}

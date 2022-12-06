<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class GoodController extends Controller
{
    public function like($comment_id)
    {
        Auth::user()->like($comment_id);
        return "done.";
    }
    public function deletelike($comment_id)
    {
        Auth::user()->deleteLike($comment_id);
        return "done.";
    }
}

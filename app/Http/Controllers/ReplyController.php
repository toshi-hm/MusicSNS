<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(ReplyRequest $request, Reply $reply)
    {
        $input = $request["reply"];
        // user_idとgoodを入れてあげる
        $input["user_id"] = Auth::user()->name;
        // dd($input);
        $reply->fill($input)->save();
        
        return redirect()->back();
    }
}

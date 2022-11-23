<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MuaicSNS</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/comments/{{ $comment->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="music_id">
                    <input type="text" name="comment[music_id]" value="{{ $comment->music_id }}">
                </div>
                <div class="user_id">
                    <p>{{$comment->user_id}}</p>
                </div>
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='comment[title]' value="{{ $comment->title }}">
                </div>
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='comment[body]' value="{{ $comment->body }}">
                </div>
                <input type="submit" value="更新">
            </form>
            <div class="footer">
                <a href="/comments/{{ $comment->id }}">戻る</a>
            </div>
            
        </div>
    </body>
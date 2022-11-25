<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $comment->title }}
        </h1>
        <div class="content">
            <div class="content__cemment">
                <h2 class='music_name'>Music: {{ $comment->music_id }} (<a href="/categories/{{ $comment->category->id }}">{{ $comment->category->category_name }}</a>)</h2>
                <p class="user_name">{{ $comment->user_id }}</p>
                <h3>本文</h3>
                <p class='body'>{{ $comment->body }}</p>
                <p class="good">{{ $comment->good }}</p> 
                <p class="created_time">投稿時間：{{ $comment->created_at }}</p>
                <p class="updated_time">最終更新時間：{{ $comment->updated_at }}</p>
                <div class="edit"><a href="/comments/{{ $comment->id }}/edit">編集</a></div>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>MusicSNS(仮)</h1>
        <div class='comments'>
            @foreach($comments as $comment)
                <div class='comment'>
                    <h2 class='music_name'>{{ $comment->music_id }}</h2>
                    <h3 class="comment_title">{{ $comment->title }}</h3>
                    <p class="user_name">{{ $comment->user_id }}</p>
                    <p class='body'>{{ $comment->body }}</p>
                    <p class="time">{{ $comment->good }}</p>
                </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $comments->links() }}
        </div>
    </body>
</html>
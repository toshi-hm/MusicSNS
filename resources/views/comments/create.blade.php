<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MuaicSNS</title>
    </head>
    <body>
        <h1>MusicSNS</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="music_name">
                <h2>楽曲</h2>
                <input type="text" name="music_name" placeholder="楽曲名"/>
            </div>
            <div class="comment_title">
                <h2>コメントタイトル</h2>
                <input type="text" name="post[title]" placeholder="コメントタイトルを入力"/>
            </div>
            <div class="comment_body">
                <h2>内容</h2>
                <textarea name="post[body]" placeholder="良い！"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
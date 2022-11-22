<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>MuaicSNS</title>
    </head>
    <body>
        <h1>MusicSNS</h1>
        <form action="/comments" method="POST">
            @csrf
            <div class="music_name">
                <h2>楽曲</h2>
                <input type="text" name="comment[music_id]" placeholder="楽曲名" value="{{ old('comment.music_id') }}"/>
                <p class="music_id_error" style="color:red">{{ $errors->first('comment.music_id') }}</p>
            </div>
            <div class="comment_title">
                <h2>コメントタイトル</h2>
                <input type="text" name="comment[title]" placeholder="コメントタイトルを入力" value="{{ old('comment.title') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('comment.title') }}</p>
            </div>
            <div class="comment_body">
                <h2>内容</h2>
                <textarea name="comment[body]" placeholder="良い！">{{ old("comment.body") }}</textarea>
                <p class="body_error" style="color:red">{{ $errors->first('comment.body') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
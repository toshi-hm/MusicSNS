<x-app-layout>
    <x-slot name="header">
        編集画面
    </x-slot>
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
            <br>
            <a href="/">トップに戻る</a>
        </div>
    </div>    
</x-app-layout>

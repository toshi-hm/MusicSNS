<x-app-layout>
    <x-slot name="header">
        MusicSNS
    </x-slot>
    <form action="/comments" method="POST" class="text-center">
        @csrf
        <div class="category">
            <h2 class="font-bold text-green-800">Category</h2>
            <p>{{ $genre }}</p>
            <input type="hidden" name="comment[category_id]" value="{{ $genre }}">
            <!--<select name="comment[category_id]">-->
            <!--    @foreach($categories as $category)-->
            <!--        <option value="{{ $category->id }}">{{ $category->category_name }}</option>-->
            <!--    @endforeach-->
            <!--</select>-->
        </div>
        <div class="music_name">
            <h2 class="font-bold text-green-800">楽曲</h2>
            <p>{{ $track_name }}</p>
            <input type="hidden" name="comment[music_id]" placeholder="楽曲名" value="{{ $track_name }}"/>
        </div>
        <div class="comment_title">
            <h2 class="font-bold text-green-800">コメントタイトル</h2>
            <input type="text" name="comment[title]" placeholder="コメントタイトルを入力" value="{{ old('comment.title') }}"/>
            <p class="title_error" style="color:red">{{ $errors->first('comment.title') }}</p>
        </div>
        <div class="comment_body">
            <h2 class="font-bold text-green-800">本文</h2>
            <textarea name="comment[body]" placeholder="良い！">{{ old("comment.body") }}</textarea>
            <p class="body_error" style="color:red">{{ $errors->first('comment.body') }}</p>
        </div>
        <input type="submit" value="投稿" class="bg-gray-800 hover:bg-gray-700 text-white rounded px-4 py-2">
    </form>
    <div class="footer">
        <a href="/" class="bg-gray-400 hover:bg-gray-700 rounded px-4 py-0">トップに戻る</a>
    </div>
</x-app-layout>
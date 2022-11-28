<x-app-layout>
    <x-slot name="header">
        MusicSNS
    </x-slot>
    <form action="/comments" method="POST">
        @csrf
        <div class="category">
            <h2>Category</h2>
            <select name="comment[category_id]">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="music_name">
            <h2>楽曲</h2>
            <p>{{ $track_name }}</p>
            <input type="hidden" name="comment[music_id]" placeholder="楽曲名" value="{{ $track_name }}"/>
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
</x-app-layout>
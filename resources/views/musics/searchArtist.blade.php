<x-app-layout>
    <x-slot name="header">
        コメントするアーティストを検索
    </x-slot>
        <div class="content">
        <form action="/comments/create/artists" method="POST">
            @csrf
            <div class="artist_name">
                <input type="text" name="artist_name" placeholder="アーティスト名" value="{{ old('artist_name') }}"/>
                <p class="artist__error" style="color:red">{{ $errors->first('artist_name') }}</p>
            </div>
            <input type="submit" value="検索">
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </div>
</x-app-layout>
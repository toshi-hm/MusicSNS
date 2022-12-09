<x-app-layout>
    <x-slot name="header">
        アルバムを選択
    </x-slot>
    <div class="albums">
        @foreach($albums->items as $album)
            <form action="/comments/create/artists/albums/tracks" method="POST">
                @csrf
                <p>{{ $album->name }}</p>
                <input type="hidden" name="album_id" value="{{ $album->id }}">
                <input type="submit" value="選択">
                <br>
            </form>
        @endforeach
    </div>
    <div class="footer">
        <p>[<a href="/">TOPに戻る</a>]</p>
    </div>
</x-app-layout>
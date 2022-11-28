<x-app-layout>
    <x-slot name="header">
        アルバムを選択
    </x-slot>
    <div class="albums">
        @csrf
        @foreach($albums->albums as $album)
            <form action="/comments/create/artists/albums/tracks" method="POST">
                <p>{{ $album->name }}</p>
                <input type="hidden" name="album_id" value="{{ $album->id }}">
                <input type="submit" value="選択">
                <br>
            </form>
        @endforeach
    </div>
</x-app-layout>
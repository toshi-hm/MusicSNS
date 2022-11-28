<x-app-layout>
    <x-slot name="header">
        アーティストを選択
    </x-slot>
    <form action="/comments/create/artists/albums", method="POST">
        @csrf
        @foreach($results->artists->items as $artist)
            <div class="artist_name">
                <p>{{ $artist->name }}</p>
                <br>
            </div>
            <input type="hidden" name="artist_id" value="{{ $artist->id }}">
            <input type="submit" value="選択">
            <br>
        @endforeach
    </form>
</x-app-layout>
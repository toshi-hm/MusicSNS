<x-app-layout>
    <x-slot name="header">
        アーティストを選択
    </x-slot>
    @foreach($results->artists->items as $artist)
        <form action="/comments/create/artists/albums", method="POST">
            @csrf
            <div class="artist_name">
                <p>{{ $artist->name }}</p>
            </div>
            <input type="hidden" name="artist_id" value="{{ $artist->id }}">
            <input type="submit" value="選択">
            <br>
        </form>
    @endforeach
</x-app-layout>
<title>アルバム選択 - HaMusicSNS</title>
<x-app-layout>
    <x-slot name="header">
        アルバムを選択
    </x-slot>
    <div class="text-center">
        <p class="text-green-800">
            <?php
            $num = count($albums->items);
            echo "アルバムが" . $num . "件見つかりました。 " . "該当するアルバムを選択してください。";
            ?>
        </p>
        @foreach($albums->items as $album)
            <form action="/comments/create/artists/albums/tracks" method="POST" class="border-2">
                @csrf
                <input type="hidden" name="album_id" value="{{ $album->id }}">
                <input type="hidden" name="artist_genre" value="{{ $genre }}">
                <input type="submit" value="{{ $album->name }}" class="font-bold">
                <br>
            </form>
        @endforeach
    </div>
    <div class="footer">
        <a href="/" class="bg-gray-400 hover:bg-gray-700 rounded px-4 py-0">TOPに戻る</a>
    </div>
</x-app-layout>
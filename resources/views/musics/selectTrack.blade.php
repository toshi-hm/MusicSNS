<title>楽曲選択 - HaMusicSNS</title>
<x-app-layout>
    <x-slot name="header">
        楽曲を選択
    </x-slot>
    <div class="text-center">
        <p class="text-green-800">
            <?php
            $num = count($tracks->items);
                echo "楽曲が" . $num . "件見つかりました。 " . "該当する楽曲を選択してください。";
            ?>
        </p>
        @foreach($tracks->items as $track)
            <form action="/comments/create" method="POST" class="border-2">
                @csrf
                <input type="hidden" name="track_name" value="{{ $track->name }}">
                <input type="hidden" name="track_id" value="{{ $track->id }}">
                <input type="hidden" name="artist_genre" value="{{ $genre }}">
                <input type="submit" value="{{ $track->name }}" class="font-bold">
                <br>
            </form>
        @endforeach
    </div>
    <div class="footer">
        <a href="/" class="bg-gray-400 hover:bg-gray-700 rounded px-4 py-0">TOPに戻る</a>
    </div>
</x-app-layout>
<title>楽曲情報 - {{ $music->name }} - HaMusicSNS</title>
<x-app-layout>
    <x-slot name="header">
        <p class="fond-bold text-center">{{ $music->name }}</p>
    </x-slot>
    <div class="text-center">
        <div class="flex justify-center">
            <img src="{{ array_shift($music->album->images)->url }}" width="50%" height="50%">
        </div>
        <div class="artists">
            <p class="text-green-800 font-bold flex justify-center">アーティスト</p>
            @foreach($music->artists as $artist)
                <a href="{{ $artist->href }}">{{ $artist->name }}</a>
            @endforeach
        </div>
        <div class="detail">
            <div class="album">
                <p class="text-green-800 font-bold flex justify-center">収録アルバム</p>
                <p>{{ $music->album->name }}  No. {{ $music->track_number }}   / {{ $music->album->total_tracks }}</p>
                <p class="text-green-800 font-bold flex justify-center">アルバムリリース日</p>
                <p>{{ $music->album->release_date }}</p>
            </div>
        </div>
        <br>
        <div>
            <a href="{{ $music->preview_url }}" class="bg-gray-800 hover:bg-gray-700 text-white rounded px-4 py-2">試聴する</a>
        </div>
    </div>
    <div class="footer">
        <a href="/" class="bg-gray-400 hover:bg-gray-700 rounded px-4 py-0">トップに戻る</a>
    </div>
</x-app-layout>
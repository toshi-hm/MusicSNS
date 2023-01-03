<title>アーティスト検索 - HaMusicSNS</title>
<x-app-layout>
    <x-slot name="header">
        アーティストを選択
    </x-slot>
    <div class="text-center">
        <p class="text-green-800 ">
            <!-- もし1アーティストも見つからなかった場合にエラーを出す -->
            <?php
            $num = count($results->artists->items);
            if($num >= 1) {
                echo "アーティストが" . $num . "件見つかりました。";
                echo "アーティストを選択してください。";
            } else {
                echo "該当するアーティストが見つかりませんでした。";
            }
            ?>
        </p>
        @foreach($results->artists->items as $artist)
            <form action="/comments/create/artists/albums" method="POST" class="border-2">
                @csrf
                <!--<div class="font-bold">-->
                <!--    <p>{{ $artist->name }}</p>-->
                <!--</div>-->
                <input type="hidden" name="artist_id" value="{{ $artist->id }}">
                <input type="hidden" name="artist_genres" value="{{ array_shift($artist->genres) }}">
                <input type="submit" value="{{ $artist->name }}" class="font-bold ">
                <br>
            </form>
        @endforeach
    </div>
    <div class="footer">
        <a href="/"  class="bg-gray-400 hover:bg-gray-700 rounded px-4 py-0">TOPに戻る</a>
    </div>
        
</x-app-layout>
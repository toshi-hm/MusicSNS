<x-app-layout>
    <x-slot name="header">
        アーティストを選択
    </x-slot>
    <p class="massage">
        <!-- もし1アーティストも見つからなかった場合にエラーを出す -->
        <?php
        $num = count($results->artists->items);
        if($num >= 1) {
            echo "アーティストが" . $num . "件見つかりました。";
        } else {
            echo "該当するアーティストが見つかりませんでした。";
        }
        ?>
    </p>
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
    <div class="footer">
        <p>[<a href="/">TOPに戻る</a>]</p>
    </div>
</x-app-layout>
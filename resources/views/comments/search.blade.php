<x-app-layout>
    <x-slot>
        検索    
    </x-slot>
    
    <div class="flex justify-center px-2">
        <form action="/search/comments" method="POST">
            @csrf
            <p class="font-bold text-green-800">楽曲を検索</p>
            <input type="text" name="search[music_name]" placeholder="楽曲を検索">
            <br>
            <input type="submit" value="検索">
        </form>
        <form action="/search/comments" method="POST">
            @csrf
            <p class="font-bold text-green-800">ジャンルを検索</p>
            <input type="text" name="search[genre]" placeholder="ジャンルを検索">
            <br>
            <input type="submit" value="検索">
        </form>
        <form action="/search/comments" method="POST">
            @csrf
            <p class="font-bold text-green-800">ユーザーを検索</p>
            <input type="text" name="search[user_name]" placeholder="ユーザーを検索">
            <br>
            <input type="submit" value="検索">
        </form>
    </div>
</x-app-layout>
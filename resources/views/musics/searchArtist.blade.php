<title>アーティスト検索 - HaMusicSNS</title>
<x-app-layout>
    <x-slot name="header">
        コメントするアーティストを検索
    </x-slot>
        <div class="bg-orange-500 flex justify-center">
            <form action="/comments/create/artists" method="POST">
                @csrf
                <div class="artist_name">
                    <input type="text" name="artist_name" placeholder="アーティスト名" value="{{ old('artist_name') }}"/>
                    <p class="artist__error" style="color:red">{{ $errors->first('artist_name') }}</p>
                </div>
                <input type="submit" value="検索" class="bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded flex justify-center items-center">
                <br>
            </form>
        </div>
        <div class="flex justify-center">
            <a href="/" class="bg-gray-400 hover:bg-gray-700 rounded px-4 py-0">戻る</a>
        </div>
    </div>
</x-app-layout>
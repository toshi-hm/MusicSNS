<x-app-layout>
    <x-slot name="header">
        <p class="text-center font-bold">Goodしたユーザー</p>
    </x-slot>
    <div class="goodpeople">
        @foreach($goods as $good)
            <div class="border-2 flex justify-center">
                <?php
                $user_id = $good->user_id;
                $comment_id = $good->comment_id;
                $user = \DB::table("users")->where("id", $user_id)->first();
                ?>
                <a href="" class="font-bold">{{ $user->name }}</a><br>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center space-x-4">
        <a href="/comments/{{$comment_id}}" class="bg-gray-400 hover:bg-gray-700 rounded px-4 py-0">戻る</a>
        <a href="/" class="bg-gray-400 hover:bg-gray-700 rounded px-4 py-0">トップへ戻る</a> 
    </div>
</x-app-layout>
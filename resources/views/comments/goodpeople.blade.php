<x-app-layout>
    <x-slot name="header">
        Goodしたユーザー
    </x-slot>
    <div class="goodpeople">
        @foreach($goods as $good)
            <?php
            $user_id = $good->user_id;
            $user = \DB::table("users")->where("id", $user_id)->first();
            ?>
            <a href="">{{ $user->name }}</a><br>
        @endforeach
    </div>
</x-app-layout>
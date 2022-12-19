<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center space-x-4">
            <p class="font-bold">MusicSNS</p>
            <p>ようこそ、{{ Auth::user()->name }}さん</p>
        </div>
    </x-slot>
    <div class="w-screen flex justify-center space-x-4">
        <!-- Left -->
        <div class="text-center bg-green-300">
            <div class="w-96 text-center font-bold">
                <p class="text-xl">通知・メッセージ</p>
            </div>
            <div class="border-2 bg-black-500">
                <ul>
                    <li>通知</li>
                    <br>
                    <li>あなたへのメッセージ</li>
                    <br>
                </ul>
            </div>
        </div>
        <!-- Center -->
        <div class="w-96 text-center bg-black-500 ">
            <!--<div class="flex container mx-auto text-center">-->
            <!--    <p>ようこそ、{{ Auth::user()->name }}さん</p>-->
                <!--<p class="bg-green-500">[<a href="/comments/create/search_artists">コメント作成</a>]</p>-->
            <!--</div>-->
            <div class='comment'>
                <p class="text-xl bg-orange-500">【 タイムライン 】</p>
                @foreach($comments as $comment)
                    <div class='border-2'>
                        <div class="w-auto flex justify-center items-center">
                            <p class="user_name font-bold">{{ $comment->user_id }}</p>
                            <p class="created_at">({{ $comment->created_at }})</p>
                        </div>
                        <div class="w-auto flex justify-center items-center">
                            <h2 class='music_name text-green-800'>{{ $comment->music_id }}</h2>
                            <a href="/categories/{{ $comment->category_id }}">( {{ $comment->category_id }} )</a>
                        </div>
                        <h3 class="comment_title">
                            <p class="font-bold"><a href="/comments/{{ $comment->id }}">{{ $comment->title }}</a></p>
                        </h3>
                        <p class='body'>{{ $comment->body }}</p>
                        <!--<form action="/comments/{{ $comment->id }}/like" id="form_like_{{ $comment->id }}" method="post">-->
                        <!--    @csrf-->
                        <!--    <button type="button" onclick="like({{ $comment->id }})">いいね！</button>-->
                        <!--</form>-->
                        <!--<form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">-->
                        <!--    @csrf-->
                        <!--    @method("DELETE")-->
                        <!--    <button type="button" onclick="deleteComment({{ $comment->id }})">削除</button>-->
                        <!--</form>-->
                        <div class="good text-orange-500">
                            @if($comment->is_good_by_auth_user())
                                <a href="/comments/{{ $comment->id }}/deletegood" class="btn btn-success btn-sm">[Good取消] : <span class="badge">{{ $comment->goods->count() }}</span></a>
                            @else
                                <a href="/comments/{{ $comment->id }}/good" class="btn btn-success btn-sm">[Good] :<span class="badge">{{ $comment->goods->count() }}</span></a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="paginate">
                {{ $comments->links() }}
            </div> 
        </div>
        <!-- Right -->
        <div class="w-96 h-40 text-center bg-green-300">
            <div class="text-center font-bold">
                <p class="text-xl">検索</p>
            </div>
            <div class="serach">
                <form action="" class="text-center py-4">
                    <input type="text" placeholder="投稿・ユーザーを検索">
                    <input type="submit" value="検索" class="bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded">
                </form>
            </div>
            
        </div>
    </div>
    
    <script>
        function deleteComment(id) {
            "use strict"
            
            if (confirm("このコメントは完全に削除されますがよろしいですか？")) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
    
    
</x-app-layout>
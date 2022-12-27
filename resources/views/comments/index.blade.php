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
                    <p class="mentenance">メンテナンス中</p>
                    <br>
                    <li>あなたへのメッセージ</li>
                    <p class="mentenance">メンテナンス中</p>
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
                        <div class="w-auto flex justify-center items-center"> <!-- ユーザー名・作成日時 -->
                            <p class="user_name font-bold">{{ $comment->user_id }}</p>
                            <p class="created_at">({{ $comment->created_at }})</p>
                        </div>
                        <div class="w-auto flex justify-center items-center"> <!-- 楽曲名・ジャンル -->
                            <h2 class='music_name text-green-800'>
                                <form action="/music/{{$comment->music_id}}" method="POST">
                                    @csrf
                                    <input type="hidden"  name="music_id" value="{{$comment->music_id}}"> 
                                    <input type="submit" name="music_name" value="{{ $comment->music_name }}">
                                </form>
                            </h2>
                            <a href="/categories/{{ $comment->category_id }}">( {{ $comment->category_id }} )</a>
                        </div>
                        <h3 class="comment_title"> <!-- コメントタイトル -->
                            <p class="font-bold"><a href="/comments/{{ $comment->id }}">{{ $comment->title }}</a></p>
                        </h3>
                        <p class='body'>{{ $comment->body }}</p> <!-- コメント内容 -->
                        <!--<form action="/comments/{{ $comment->id }}/like" id="form_like_{{ $comment->id }}" method="post">-->
                        <!--    @csrf-->
                        <!--    <button type="button" onclick="like({{ $comment->id }})">いいね！</button>-->
                        <!--</form>-->
                        <!--<form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">-->
                        <!--    @csrf-->
                        <!--    @method("DELETE")-->
                        <!--    <button type="button" onclick="deleteComment({{ $comment->id }})">削除</button>-->
                        <!--</form>-->
                        <div class="good text-orange-500"> <!-- いいね -->
                            @if($comment->is_good_by_auth_user())
                                <a href="/comments/{{ $comment->id }}/deletegood" class="btn btn-success btn-sm">[Good取消] : <span class="badge">{{ $comment->goods->count() }}</span></a>
                            @else
                                <a href="/comments/{{ $comment->id }}/good" class="btn btn-success btn-sm">[Good] :<span class="badge">{{ $comment->goods->count() }}</span></a>
                            @endif
                        </div>
                        <div class="button"> <!-- 詳細表示 -->
                            <a href="/comments/{{ $comment->id }}" class="font-bold bg-gray-400 px-2 py-2 rounded flex justify-center items-center">[詳細・返信]</a>
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
                    <p>メンテナンス中</p>
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
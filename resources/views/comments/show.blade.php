<title>{{ $comment->title }} - {{ $comment->user_id }} - HaMusicSNS</title>
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center space-x-4 bg-green-300">
            <p class="font-bold text-center py-2">
                {{ $comment->user_id }}
            </p>
            <p class="text-center py-2">
                ：
            </p>
            <p class="font-bold text-center py-2">
                {{ $comment->title }}
            </p>
        </div>
    </x-slot>
        <div class="content text-center border-2">
            <div class="content__cemment">
                <h2 class='music_name'>
                    <div class="text-green-800 font-bold flex justify-center">Music</div>
                    <form action="/music/{{$comment->music_id}}" method="POST">
                        @csrf
                        <input type="hidden"  name="music_id" value="{{$comment->music_id}}"> 
                        <input type="submit" name="music_name" value="{{ $comment->music_name }}">
                    </form>
                    <p>
                        ジャンル: 
                        <a href="/categories/{{ $comment->category_id }}">{{ $comment->category_id}}</a>
                    </p>
                </h2>
                <!--<p class="user_name">{{ $comment->user_id }}</p>-->
                <div class="border-2">
                    <h3 class="text-green-800 font-bold">本文</h3>
                    <p class='body'>{{ $comment->body }}</p>
                </div>

                <p class="good">
                    <div class="good text-orange-500">
                        @if($comment->is_good_by_auth_user())
                            <p>
                                <a href="/comments/{{ $comment->id }}/deletegood" class="btn btn-success btn-sm">[Good取消]</a> : [<a href="/comments/{{ $comment->id}}/goodpeople"><span class="badge">{{ $comment->goods->count() }}</span></a>]
                            </p>
                        @else
                            <p>
                                <a href="/comments/{{ $comment->id }}/good" class="btn btn-success btn-sm">[Good]</a> :[<a href="/comments/{{ $comment->id }}/goodpeople"><span class="badge">{{ $comment->goods->count() }}</span></a>]
                            </p>
                        @endif
                    </div>
                </p> 
                <p class="created_time">投稿時間：{{ $comment->created_at }}</p>
                <p class="updated_time">最終更新時間：{{ $comment->updated_at }}</p>
                <br>
                @if($comment->user_id === Auth::user()->name)
                    <div class="buttons">
                        <div class="edit">
                            <a href="/comments/{{ $comment->id }}/edit"class="bg-gray-800 hover:bg-gray-700 text-white rounded px-4 py-2" >編集</a>
                        </div>
                        <br>
                        <div class="delete">
                            <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="button" onclick="deleteComment({{ $comment->id }})" class="bg-gray-800 hover:bg-gray-700 text-white rounded px-4 py-2">削除</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="replies">
            <div class="w-1/2 flex justify-center space-x-4">
                <h3 class="flex flex-center text-green-800 font-bold">リプライ</h3>
                <form action="/comments/{{ $comment->id }}/" method="POST">
                    @csrf
                    <input name="reply[comment_id]" type="hidden" value="{{ $comment->id }}">
                    <input name="reply[user_id]" type="hideen" value="{{ Auth::user()->name }}">
                    <div class="reply_body">
                        <textarea name="reply[reply_body]" >{{ old("body") }}</textarea>
                        <p class="reply_error" style="color:red">{{ $errors->first('body') }}</p>
                    </div>
                    <input class="bg-gray-800 hover:bg-gray-700 text-white rounded px-4 py-2" type="submit" value="返信">
                </form>
                <div class="replies_list">
                    @foreach($replies as $reply)
                        @if($reply->comment_id ===  $comment->id)
                            <p class="border-2">
                                [{{ $reply->user_id }}]   -   ({{ $reply->created_at }})<br>
                                {{ $reply->reply_body }}  
                                <br>
                            </p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    <div class="footer">
        <a href="/" class="bg-gray-400 hover:bg-gray-700 rounded px-4 py-0">トップに戻る</a>
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
<x-app-layout>
    <x-slot name="header">
        <p class="font-bold text-center bg-green-300 py-2">
            {{ $comment->title }}
        </p>
    </x-slot>
        <div class="content text-center border-2">
            <div class="content__cemment">
                <h2 class='music_name'>
                    <div class="text-green-800 font-bold">Music</div>
                    {{ $comment->music_id }} 
                    (<a href="/categories/{{ $comment->category->id }}">
                        {{ $comment->category->category_name }}
                     </a>)
                </h2>
                <p class="user_name">{{ $comment->user_id }}</p>
                <div class="text-green-800 font-bold"><h3>本文</h3></div>
                <p class='body'>{{ $comment->body }}</p>
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
                <div class="edit"><a href="/comments/{{ $comment->id }}/edit">編集</a></div>
            </div>
        </div>
        <div class="replies">
            <div class="text-green-800 font-bold"><h3>リプライ</h3></div>
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
    <div class="footer">
        <a href="/" class="bg-gray-400 hover:bg-gray-700 rounded px-4 py-0">トップに戻る</a>
    </div>
</x-app-layout>
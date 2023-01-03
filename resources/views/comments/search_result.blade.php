<x-app-layout>
    <x-slot>
        検索結果
    </x-slot>
    <div class="flex justify-center">
        <div>
            @foreach($comments1 as $comment)
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
        <div>
            @foreach($comments2 as $comment)
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
        <div>
            @foreach($users as $user)
                <div class="border-2">
                    <p class="font-bold">{{ $user->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
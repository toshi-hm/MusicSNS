<x-app-layout>
    <x-slot name="header">
        MusicSNS
    </x-slot>
    

    <p>[<a href="/comments/create">コメント作成</a>]</p>
    <div class='comments'>
        @foreach($comments as $comment)
            <div class='comment'>
                <h2 class='music_name'>{{ $comment->music_id }} (<a href="/categories/{{ $comment->category->id }}">{{ $comment->category->category_name }}</a>)</h2>
                <h3 class="comment_title">
                    <a href="/comments/{{ $comment->id }}">{{ $comment->title }}</a>
                </h3>
                <p class="user_name">{{ $comment->user_id }}  -  {{ $comment->created_at }}</p>
                <p class='body'>{{ $comment->body }}</p>
                <p class="time">{{ $comment->good }}</p>
                <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="button" onclick="deleteComment({{ $comment->id }})">削除</button>
                </form>
            </div>
        @endforeach
    </div>
    <div class="paginate">
        {{ $comments->links() }}
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
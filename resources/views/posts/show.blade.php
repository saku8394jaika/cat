<x-app-layout>
    <div class='post'>
        <p>{{ $post->body }}</p>
        <div>
            <img style="width:200px;" src="{{ $post->image }}" alt="画像が読み込めません。"/>
        </div>
        <p>作成者：{{ $post->user->name }}</p>
        <p>カテゴリー：{{ $post->category->name}}</p>
    </div>
    <div>
         <i class="fa-solid fa-fish fa-2xl {{ $post->isLikedBy(Auth::user()) ? "liked" : "" }}" id="like" data-postId="{{ $post->id }}" data-flg="{{ $post->isLikedBy(Auth::user()) }}"></i>
        <p id ="likeCount">{{ $post->likeCount() }}</p>
    </div>
    <h2>コメント</h2>
    <form action="/post/{{ $post->id }}/comments" method="POST">
        @csrf
        <textarea name="comments[comment]"></textarea>
        <button type="submit">送信</button>
    </form>
    <ul>
    @foreach($comments as $comment)
        <li>{{ $comment->comment }}</li>
    @endforeach
    </ul>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
         @if (Auth::id() == $post->user_id)
            <form action="/posts/destroy/{{$post->id}}" id="deletePost" method="POST">
                @csrf
                @method("DELETE")
                <button type="button" onclick="deletePost()" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">削除</button>
            </form>
        @endif
    <script src="https://kit.fontawesome.com/7a09392077.js" crossorigin="anonymous"></script>
    <script>
        const deletePost = () => {
             const deleteForm = document.getElementById('deletePost');
             if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                 deleteForm.submit();
             }
        }
    </script>
</x-app-layout>
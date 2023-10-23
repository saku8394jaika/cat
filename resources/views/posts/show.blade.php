<x-app-layout>
    <div class='post'>
        <p>{{ $post->body }}</p>
        <div>
            <img style="width:200px;" src="{{ $post->image }}" alt="画像が読み込めません。"/>
        </div>
        <p>作成者：{{ $post->user->name }}</p>
        <p>カテゴリー：{{ $post->category->name}}</p>
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
</x-app-layout>
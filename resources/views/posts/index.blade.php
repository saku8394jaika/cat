<x-app-layout>
    <h1>Blog Name</h1>
    <a href='/posts/create'>create</a>
    <div class='posts'>
        @foreach($posts as $post)
        <div class='post'>
            <h3>本文</h3>
            <p>{{ $post->body }}</p>
            <div>
                <img style="width:200px;" src="{{ $post->image }}" alt="画像が読み込めません。"/>
            </div>
            <p>作成者：{{ $post->user->name }}</p>
            <p>カテゴリー：{{ $post->category->name}}</p>
        </div>
        @endforeach
    </div>
</x-app-layout>
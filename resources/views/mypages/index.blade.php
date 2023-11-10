<x-app-layout> 
    <h1>マイページ</h1>
    <div class="flex">
        <h2>自分の投稿</h2>
        <select class="ml-5">
            <option>全件</option>
            <option>未完了</option>
            <option>完了</option>
        </select>
    </div>
    <div class="flex">
    @foreach($myposts as $post)
        <div class='post border-4 mt-2 p-4'>
            <h3>本文</h3>
            <p>{{ $post->body }}</p>
            <div>
                <a href="/post/{{ $post->id }}"><img style="width:200px;" src="{{ $post->image }}" alt="画像が読み込めません。"/></a>
            </div>
            <p>作成者：{{ $post->user->name }}</p>
            <p>カテゴリー：{{ $post->category->name}}</p>
        </div>
    @endforeach
    </div>
    
    <h2>いいねした投稿</h2>
    <div class="flex">
    @foreach($likedposts as $post)
         <div class='post border-4 mt-2 p-4'>
            <h3>本文</h3>
            <p>{{ $post->body }}</p>
            <div>
                <a href="/post/{{ $post->id }}"><img style="width:200px;" src="{{ $post->image }}" alt="画像が読み込めません。"/></a>
            </div>
            <p>作成者：{{ $post->user->name }}</p>
            <p>カテゴリー：{{ $post->category->name}}</p>
        </div>
    @endforeach
    </div>
</x-app-layout>
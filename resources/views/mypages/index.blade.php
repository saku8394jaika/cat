<x-app-layout> 
    <h1>マイページ</h1>
    <div class="flex">
        <h2>自分の投稿</h2>
        <select class="ml-5" id="complete">
            <option value="all">全件</option>
            <option value="uncomplete">未完了</option>
            <option value="complete">完了</option>
        </select>
    </div>
    <div class="flex">
    @foreach($myposts as $post)
        <div class='border-4 mt-2 p-4 post {{ $post->complete ? 'complete' : 'uncomplete'}}'>
            <div class="flex">
                <h3 class="flex-1">本文</h3>
                @if($post->category_id !== 2)
                    @if(!$post->complete)
                        <form action="/post/{{ $post->id }}/complete" method="post">
                        @csrf
                        <button class="flex-1 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">完了にする</button>
                        </form>
                    @else
                    　　<form action="/post/{{ $post->id }}/uncomplete" method="post">
                    　　@csrf
                        <button class="flex-1 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">完了済</button>
                        </form>
                    @endif
                @endif
            </div>
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
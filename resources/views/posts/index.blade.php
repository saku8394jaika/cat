<x-app-layout>
    <div class="content flex">
        <div class='category m-10 absolute right-[18%]'>
            <a href="/" class="block">全体</a>
            @foreach($categories as $category)
                <a href='/category/{{$category->id}}' class="block ">{{$category ->name }}</a>
            @endforeach
        </div>
        <div class="relative left-[18%]">
            <h1>Blog Name</h1>
            
            <div class='posts'>
                @foreach($posts as $post)
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
        </div>
    </div>
</x-app-layout>
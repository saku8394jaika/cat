<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-app-layout>
    <h1>Blog Name</h1>
    <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="body">
            <h2>Body</h2>
            <textarea name="post[body]" placeholder="今日のネコちゃん"></textarea>
        </div>
        <div class="image">
            <h2>画像</h2>
            <input type="file" name="image">
        </div>
        <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]">
                <option value=null>選択してください</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="store"/>
    </form>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</x-app-layout>
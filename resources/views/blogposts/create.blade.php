{{-- Form to create a new blog post. --}}
@extends('layouts.app')

@section('content')
    @auth
    <div class="ui segment">
        <h2 class="ui header">Create a New Post</h2>
        <form class="ui form" action="/blogs" method="POST">
            @csrf

            <div class="field">
                <label>Title</label>
            <input type="text" name="title" placeholder="post title">
            </div>
            <div class="field">
                <label>Content</label>
            <textarea name="content" placeholder="body content..."></textarea>
            </div>
            <button class="ui positive button" type="submit">
                Save
            </button>
        </form>
    </div>
    @else
        To create a blog, <a href="/">Log In </a> here ...
    @endauth
@endsection

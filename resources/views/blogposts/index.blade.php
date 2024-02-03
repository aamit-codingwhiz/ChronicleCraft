{{-- List all blog posts. --}}
@extends('layouts.app')

@section('right menu')
    @auth
        <a class="item" href="\logout">logout</a>
    @else
        <a class="item" href="\login">Login</a>
        <a class="item" href="#root">Register</a>
    @endauth
@endsection

@section('content')
    @auth
        <h1 class="ui header">
            HI THERE ... {{ auth()->user()->name }}!!
        </h1>
        <div class="ui segment">
            <h2 class="ui header">
                <a href="/blogs/create">Create Blog</a>
            </h2>
        </div>
    @else
        To create a blog, <a href="/">Log In </a> here ...

    @endauth
    <div class="ui segment">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="ui blue fluid link card">
                    <div class="content">
                        @if (auth()->check() && auth()->user()->id === $post->user_id)
                            <div class="ui right floated compact menu">
                                <div class="ui simple dropdown item">
                                    <i class="settings icon"></i> Options
                                    <i class="dropdown icon"></i>
                                    <div class="menu">
                                        <a class="item" href="/blogs/{{ $post->id }}/edit">
                                            <i class="pencil icon"></i>
                                            edit
                                        </a>
                                        <a class="item">
                                            <form action="/blogs/{{ $post->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="ui red button" type="submit">Delete</button>
                                            </form>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="header">
                            <a class="header" href="/blogs/{{ $post->id }}">{{ $post->title }}</a><br>
                            <span>{{ \Carbon\Carbon::parse($post->user->created_at)->format('F j, Y | g:i A') }}</span>
                        </div>
                    </div>
                    <div class="content">
                        <p>
                            {!! substr($post->content, 0, 300) !!} ...
                        </p>
                    </div>
                    <div class="extra content">
                        <a class="left floated label">
                            <i class="globe icon"></i>
                            Comments
                        </a>
                    </div>
                </div>
            @endforeach
            {{-- <div class="ui segment">
                {{ $posts->links() }}
            </div> --}}
        @else
            No Blogs to show!!
        @endif
    </div>
@endsection

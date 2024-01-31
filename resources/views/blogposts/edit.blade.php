@extends('layouts.app')

@section('content')
    @auth
        <div class="ui segment">
            <h1 class="ui header">Edit Post</h1>
            <form class="ui form" action="/blogs/{{ $blog->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="field">
                    <label>Title</label>
                <input type="text" name="title" value="{{ $blog->title }}" required>
                </div>
                <div class="field">
                    <label>Content</label>
                <textarea name="content">{{ $blog->content }}</textarea required>
                </div>
                <button class="ui positive button" type="submit">
                    Save Changes
                </button>
            </form>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="ui icon warning message">
                <i class="lock icon"></i>
                <div class="content">
                    <div class="header">
                        Registration failed!
                    </div>
                    <p>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </p>
                </div>
            </div>
        @endif
    @endauth
@endsection

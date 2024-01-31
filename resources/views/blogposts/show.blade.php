{{-- Show details of a specific blog post. --}}
@extends('layouts.app')

@section('content')
    <div class="ui piled segment">
        <h1 class="ui header">{{ $blog->title }}</h1>
        <div class="ui header">
            <span class="cinema">Written by {{ $blog->user->name }}</span><br>
            <span>created {{ \Carbon\Carbon::parse($blog->user->created_at)->format('F j, Y | g:i A') }}</span>
        </div>
        <div class="ui content">
            {{ $blog->content }}

        </div>
    </div>
@endsection

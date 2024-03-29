@extends('layouts.app')

@section('content')
    <div class="ui comments">
        <h3 class="ui dividing header">Comments</h3>
        <div class="comment">
            <a class="avatar">
                <img src="/images/avatar/small/matt.jpg" alt="user">
            </a>
            <div class="content">
                <a class="author">Matt</a>
                <div class="metadata">
                    <span class="date">Today at 5:42PM</span>
                </div>
                <div class="text">
                    How artistic!
                </div>
                <div class="actions">
                    <a class="reply">Reply</a>
                </div>
            </div>
        </div>
        
        <form class="ui reply form">
            <div class="field">
                <textarea></textarea>
            </div>
            <div class="ui blue labeled submit icon button">
                <i class="icon edit"></i> Add Reply
            </div>
        </form>
    </div>
@endsection

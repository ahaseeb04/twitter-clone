@extends ('layouts.sidebar')

@section('title'){{ $tweet->user->name }}: '{{ $tweet->body ? $tweet->body : $tweet->media->first()->baseMedia->getFullUrl() }}' - @endsection

@section ('main')
    <app-conversation id="{{ $tweet->id }}" />
@endsection

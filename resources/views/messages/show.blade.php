@extends('layouts.app')

@section('title', $message->title)

@section('content')
<h1>{{ $message->title }}</h1>

<p><strong>From:</strong> {{ $message->sender->username }}</p>
<p><strong>To:</strong> {{ $message->receiver->username }}</p>
<p><strong>Sent:</strong> {{ $message->created_at->toDayDateTimeString() }}</p>

<hr>

<p>{{ $message->text }}</p>

<a href="{{ route('messages.index') }}" style="display: inline-block; margin-top: 15px;">⬅ Back to Inbox</a>
@endsection
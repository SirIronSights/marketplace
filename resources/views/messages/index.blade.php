@extends('layouts.app')

@section('title', 'Inbox')

@section('content')
<h1>Inbox</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table style="width:100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr style="background-color: #f0f0f0;">
            <th style="padding: 8px;">From</th>
            <th style="padding: 8px;">Title</th>
            <th style="padding: 8px;">Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($messages as $message)
            <tr>
                <td style="padding: 8px;">{{ $message->sender->username }}</td>
                <td style="padding: 8px;">
                    <a href="{{ route('messages.show', $message->id) }}">
                        {{ $message->title }}
                    </a>
                </td>
                <td style="padding: 8px;">{{ $message->created_at->diffForHumans() }}</td>
            </tr>
        @empty
            <tr><td colspan="3" style="padding: 8px;">No messages yet.</td></tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('messages.create') }}" style="margin-top: 15px; display: inline-block;">
    ➕ New Message
</a>
@endsection
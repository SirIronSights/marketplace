@extends('layouts.app')

@section('title', 'Inbox')

@section('content')
<h1>Inbox</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table style="width:100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr>
            <th>From</th>
            <th>Title</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($messages as $message)
            <tr>
                <td>{{ $message->sender->username }}</td>
                <td>
                    <a href="{{ route('messages.show', $message->id) }}">
                        {{ $message->title }}
                    </a>
                </td>
                <td>{{ $message->created_at->diffForHumans() }}</td>
            </tr>
        @empty
            <tr><td>Geen berichten</td></tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('messages.create') }}" style="margin-top: 15px; display: inline-block;">
    Nieuw bericht
</a>
@endsection
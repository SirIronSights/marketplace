@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

<h1>Users</h1>

<table>
    <thead>
        <tr>
            <th>Naam</th>
            <th>Email</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijderen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    <p>This is the usercontent for the page.</p>
@endsection
@extends('layouts.app')

@section('title', 'My Advertisements')

@section('content')
<h1>My Advertisements</h1>

<table >
    <thead>
        <tr>
            <th style="padding: 12px; border-bottom: 2px solid #ccc;">Naam</th>
            <th style="padding: 12px; border-bottom: 2px solid #ccc;">Beschrijving</th>
            <th style="padding: 12px; border-bottom: 2px solid #ccc;">Categorieën</th>
            <th style="padding: 12px; border-bottom: 2px solid #ccc;">Aanbieder</th>
            <th style="padding: 12px; border-bottom: 2px solid #ccc;">Bewerken</th>
            <th style="padding: 12px; border-bottom: 2px solid #ccc;">Verwijderen</th>
        </tr>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr style="border-bottom: 1px solid #eee;">
            <td style="padding: 10px;">{{ $product->title }}</td>
            <td style="padding: 10px;">{{ $product->text }}</td>
            <td style="padding: 10px;">{{ $product->categories->pluck('name')->join(', ') }}</td>
            <td style="padding: 10px;">{{ $product->user->username }}</td>
            <td style="padding: 10px;">
                <a href="{{ route('products.edit', $product->id) }}" style="color: #007bff;">Bewerken</a>
            </td>
            <td style="padding: 10px;">
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirmDelete(event)" class="delete-form" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="
                        background-color: #ff4d4d;
                        color: white;
                        border: none;
                        padding: 6px 10px;
                        border-radius: 5px;
                        cursor: pointer;
                    ">Verwijderen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Destroy this Comment?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'No, cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        }
    </script>
@endsection

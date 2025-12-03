@extends('layouts.app')

@section('title', 'My Advertisements')

@section('content')
<h1>My Advertisements</h1>

<table >
    <thead>
        <tr>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Categorieën</th>
            <th>Aanbieder</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td style="padding: 10px;">{{ $product->title }}</td>
            <td style="padding: 10px;">{{ $product->text }}</td>
            <td style="padding: 10px;">{{ $product->categories->pluck('name')->join(', ') }}</td>
            <td style="padding: 10px;">{{ $product->user->username }}</td>
            <td style="padding: 10px;">
                <a href="{{ route('products.edit', $product->id) }}">Bewerken</a>
            <a href="{{ route('products.pay', $product->id) }}"
                style="color: green; display:block; margin-top:5px;">
                Promote
            </a>
            @if($product->is_premium)
                <span style="color: gold; font-weight:bold; display:block; margin-top:5px;">
                    Premium
                </span>
            @endif
            </td>
            <td style="padding: 10px;">
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirmDelete(event)" class="delete-form" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijderen</button>
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
                confirmButtonText: 'delete',
                cancelButtonText: 'cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        }
    </script>
@endsection

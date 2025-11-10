<nav style="
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #f8f8f8ff;
    border-bottom: 1px solid #ccc;
    padding: 10px 0;
    z-index: 1000;
    ">
    <ul style="
        list-style: none;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin: 0;
        padding: 0;
    ">
        <li><a href="{{ route('users.index') }}">User List</a></li>
        <li><a href="{{ route('users.create') }}">Create User</a></li>
        <li><a href="{{ route('products.index') }}">Product List</a></li>
        @auth
                <li><a href="{{ route('products.create') }}">Create Product</a></li>
                <li><a href="{{ route('products.my') }}">My Advertisements</a></li>
            @endauth
        <li><a href="{{ route('categories.index') }}">Categories List</a></li>
        <li><a href="{{ route('categories.create') }}">Create Categories</a></li>

        @auth
            <li>Welcome, {{ auth()->user()->username }}!</li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="background:none; border:none; cursor:pointer; color:#007bff; padding:0;">Logout</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
        @endauth
        @auth
            <li><a href="{{ route('messages.index') }}">Inbox</a></li>
       @endauth
    </ul>
</nav>

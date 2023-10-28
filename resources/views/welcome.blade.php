<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="antialiased">
    <div class="container mt-4">
        @include('sweetalert::alert')
        
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-block mb-5">tambah</a>
        <table>
            <thead>
                <th>Nama</th>
                <th>Email</th>
                <th>Created_at</th>
                <th>Action</th>
            </thead>
            @foreach ($users as $user)
            <tbody>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td class="d-flex">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit User</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"
                            data-confirm-delete="true">Delete</a>
                    </form>
                </td>
            </tbody>
            @endforeach
        </table>
    </div>

    <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if(session('success'))
                    Swal.fire('{{ session("success") }}');
                @endif
            });
    </script>

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <!-- JS Bootstrap (requires jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

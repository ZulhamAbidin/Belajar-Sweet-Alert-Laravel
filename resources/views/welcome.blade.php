<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    @include('sweetalert::alert')

    <a href="{{ route('users.create') }}">tambah</a>

    <div class="container">
        <h2>User List</h2>
        <table class="table" id="user_table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#user_table').DataTable({
                "processing": true,
                "serverSide": true,
                "paging": true,
                "ajax": "{{ route('welcome') }}",
                "columns": [{
                        "data": "name",
                        "name": "name"
                    },
                    {
                        "data": "email",
                        "name": "email"
                    },
                    {
                        "data": "action",
                        "name": "action",
                        "orderable": false,
                        "searchable": false
                    }
                ]
            });
        });

        function deleteUser(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to delete this user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/users/' + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Berhasil menghapus users',
                                'success'
                            ).then(() => {
                                $('#user_table').DataTable().ajax.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Failed to delete the user.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire('{{ session('success') }}');
            @endif
        });
    </script>


</body>

</html>

{{-- 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="antialiased">
    @include('sweetalert::alert')

    <a href="{{ route('users.create') }}">tambah</a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
                @if (session('success'))
                    Swal.fire('{{ session("success") }}');
                @endif
            });
    </script>

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <!-- JS Bootstrap (requires jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html> --}}

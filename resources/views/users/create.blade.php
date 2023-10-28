<!DOCTYPE html>
<html>
<head>
    <title>Create New User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Create New User</h2>

        <form action="{{ route('users.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" required>
                @error('email')
                    <div class="alert alert-danger">Alamat Email Telah Digunakan</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">password:</label>
                <input type="password" class="form-control" value="{{ old('password') }}" id="password" name="password" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    <!-- JS Bootstrap (requires jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

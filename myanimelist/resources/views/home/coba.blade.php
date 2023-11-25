<!-- resources/views/upload-form.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Upload Profile Picture</title>
</head>

<body>
    <h2>Upload Profile Picture</h2>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('upload.profile.picture') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Upload</button>
    </form>

    <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}" alt="Profile Picture">
</body>

</html>

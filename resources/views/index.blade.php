<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Import</title>
</head>
<body>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form action="/csv" method="post" enctype="multipart/form-data">
    @csrf
    <label for="file">CSV Upload</label>
    <input type="file" name="file" id="file">
    <button type="submit">Upload</button>
</form>
</body>
</html>

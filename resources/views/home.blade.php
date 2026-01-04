<!DOCTYPE html>
<html>
<head>
    <title>PHP URL Shortener</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding-top: 50px; }
        .result { background: #e0f7fa; padding: 10px; display: inline-block; margin-top: 20px; }
        .error { color: red; }
    </style>
</head>
<body>
<h1>PHP Url Shortener</h1>

@if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('shorten') }}" method="POST">
    @csrf <label for="short">URL to shorten</label><br><br>
    <input type="text" name="short" id="short" placeholder="https://example.com"><br><br>
    <input type="submit" value="Submit"><br><br>
</form>

@if (session('success'))
    <div class="result">
        <strong>Your shortened URL:</strong> <br>
        <a href="{{ session('success') }}">{{ session('success') }}</a>
    </div>
@endif

</body>
</html>

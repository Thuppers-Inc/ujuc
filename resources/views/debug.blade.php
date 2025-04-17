<!DOCTYPE html>
<html>
<head>
    <title>Debug Info</title>
</head>
<body>
    <h1>Debug Info</h1>
    
    <h2>Manifest Content</h2>
    <pre>{{ file_exists(public_path('build/manifest.json')) ? 'Manifest exists' : 'Manifest not found' }}</pre>
    
    <h2>Environment</h2>
    <pre>APP_URL: {{ env('APP_URL') }}</pre>
    <pre>Current URL: {{ url()->current() }}</pre>
    <pre>Asset Path: {{ public_path('build/assets/app-4p6RJ_X0.css') }}</pre>
    <pre>Asset Exists: {{ file_exists(public_path('build/assets/app-4p6RJ_X0.css')) ? 'Yes' : 'No' }}</pre>

    <h2>Template Content</h2>
    <pre>@php
    $template = file_get_contents(resource_path('views/site/layouts/app.blade.php'));
    echo htmlspecialchars($template);
    @endphp</pre>
</body>
</html> 
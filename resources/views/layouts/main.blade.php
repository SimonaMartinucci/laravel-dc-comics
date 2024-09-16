<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- includo assets -->
    @vite('resources/js/app.js')
    <title>my-template</title>
</head>
<body>

    @include('partials.navbar')
    
    @yield('content')

</body>
</html>
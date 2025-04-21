<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .navbar { background-color: #007bff; }
        .navbar a { color: white; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">My Website</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    @php
                        $controller = app(\App\Http\Controllers\user\UserController::class);
                        $userMenus = $controller->getUserMenu();
                    @endphp
                    @foreach ($userMenus as $menu)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url($menu->url) }}">{{ $menu->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Welcome to My Website</h1>
        <p>This is a sample front-end UI. Feel free to contact us!</p>
        <a href="/contact" class="btn btn-primary">Contact Us</a>
    </div>
</body>
</html>
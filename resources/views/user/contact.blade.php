<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
        <h1>Contact Us</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="/contact">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</body>
</html>
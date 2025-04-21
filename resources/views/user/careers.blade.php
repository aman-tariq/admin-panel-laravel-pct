<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .navbar { background-color: #007bff; }
        .navbar a { color: white; }
        .container { max-width: 800px; }
        .form-label { font-weight: bold; }
        .btn-primary { background-color: #007bff; border-color: #007bff; }
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
        <h1>Join Our Team</h1>
        <p>Apply for a position with us by filling out the form below.</p>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ url('/careers') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="experience" class="form-label">Experience</label>
                <input type="text" class="form-control" id="experience" name="experience" value="{{ old('experience') }}" required>
                @error('experience')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="skills" class="form-label">Skills</label>
                <input type="text" class="form-control" id="skills" name="skills" value="{{ old('skills') }}" required>
                @error('skills')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4">{{ old('message') }}</textarea>
                @error('message')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </div>
</body>
</html>
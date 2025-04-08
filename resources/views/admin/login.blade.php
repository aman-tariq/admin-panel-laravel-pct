<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin</title>
    <link rel="stylesheet" href="{{asset('admin/assets/css/login.css')}}">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <!-- login -->
    <section class="container-wrapper forms">
        <div class="form login">
            <div class="form-content">
                <header class="mb-2">Login | Admin</header>
                <div class="mb-3 text-center text-danger">
                    @if (session('login_required'))
                        <div style="color: red; padding: 10px; border: 1px solid red; margin-bottom: 20px;">
                            {{ session('login_required') }}
                        </div>
                    @endif
                    @if(session('admin_login_err_msg'))
                        <span>{{session('admin_login_err_msg')}}</span>
                    @endif
                </div>
                <form action="/admin/do-login" method="post">
                    @csrf
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Email" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password" class="password" required>
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
                    <div class="form-link text-end">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>
                    <div class="field button-field">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="{{asset('admin/assets/js/login.js')}}"></script>
</body>

</html>
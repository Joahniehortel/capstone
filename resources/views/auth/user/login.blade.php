<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/user-css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="row g-0 p-4 login">
        <div class="col g-0 left">
            <div class="leftside p-5">
                <img src="images/welcome-login.png" alt="Failed to load image">
            </div>
        </div>
        <div class="col g-0 right">
            <div class="rightside g-0">
                <div class="container">
                    <div>
                        <div class="logo">
                            <img class="logo-icon mb-3" src="/images/dc.png" alt="error">
                        </div>
                        <h1 class="fs-2">Sign in</h1>
                        <p class="fs-6">Sign in to request documents, manage your account, and stay informed about
                            barangay updates. </p>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('login.google') }}" method="GET">
                            @csrf
                            <button type="submit" class="google-btn d-flex justify-content-center gap-2"><img
                                    class="google-icon" src="/images/google.png" alt=""></i> Sign in with
                                google</button>
                        </form>
                    </div>
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center mx-3 mb-0 text-muted">or</p>
                    </div>
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="form-floating-custom mb-3">
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                            placeholder=" " required name="email" value="{{ old('email', $email ?? '') }}">
                            <label for="floatingInputCustom">Email address</label>
                        </div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-floating-custom mb-3">
                            <input type="password" class="form-control" placeholder=" " required name="password">
                            <label for="floatingInputCustom">Password</label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value=""
                                    id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="{{ route('forgot.password') }}" class="text-body">Forgot password?</a>
                        </div>
                        <button type="submit" class="btn-signin mb-3">Sign In</button>
                    </form>
                    <p>Doesn't have an account? <span><a href="{{ route('register') }}" class="route">Sign up!</a></span></p>
                </div>
            </div>
        </div>
    </div>
    {{-- bootstrap cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- box icon cdn --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>

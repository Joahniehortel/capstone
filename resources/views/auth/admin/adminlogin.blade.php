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
    <link rel="stylesheet" href="/css/admin-css/admin-login.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Sign in</title>
</head>

<body>
    <div class="container">
        <div>
            <img class="logo mb-3" src="/images/dc.png" alt="">
            <h1>Sign in</h1>
            <p>Login with your credentials to access the eBarrio dashboard and continue managing barangay services.</p>
        </div>
        <form action="{{ route('admin.login.store') }}" method="POST">
            @csrf
            <div class="form-floating-custom mb-3">
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder=" " required
                       name="email" value="{{ old('email') }}">
                <label for="floatingInputCustom">Email address</label>
                @if ($errors->any())
                    <div class="text-danger text-start">
                        @foreach ($errors->all() as $error)
                            <p class="text-danger text-start">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
        
                @if(session('error'))
                    <p class="text-danger text-start">{{ session('error') }}</p>
                @endif
            </div>
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
            <button class="login-btn mb-3" type="submit">Sign in</button>
            <p class="mt-3">Doesn't have an account? <span><a href="{{ route('admin.register') }}">Sign up!</a></span></small>
        </form>
    </div>
</body>

</html>

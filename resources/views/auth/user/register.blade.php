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
    <link rel="stylesheet" href="/css/user-css/register.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="left">
                    <img src="/images/login-background.png" alt="Failed to load image">
                </div>
            </div>
            <div class="col">
                <div class="right">
                    <div class="container">
                        <h1>Sign up</h1>
                        <p class="mb-3">Get online access to barangay services with eBarrio.</p>
                        <form action="{{ route('login.google') }}" method="GET">
                            @csrf
                            <button type="submit" class="google-btn d-flex justify-content-center gap-2"><img
                                    class="google-icon" src="/images/google.png" alt=""></i> Sign in with
                                google</button>
                        </form>
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center mx-3 mb-0 text-muted">or</p>
                        </div>
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div class="form-floating-custom mb-3">
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder=" " required name="firstname" value="{{ old('firstname') }}">
                                <label for="floatingInputCustom">First name</label>
                                @error('firstname')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating-custom mb-3">
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder=" " required name="lastname" value="{{ old('lastname') }}">
                                <label for="floatingInputCustom">Last name</label>
                                @error('lastname')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating-custom mb-3">
                                <input type="text" class="form-control @error('contact_no') is-invalid @enderror" placeholder=" " required name="contact_no" value="{{ old('contact_no') }}">
                                <label for="floatingInputCustom">Contact number</label>
                                @error('contact_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating-custom mb-3">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder=" " required name="email" value="{{ old('email') }}">
                                <label for="floatingInputCustom">Email</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating-custom mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder=" " required name="password">
                                <label for="floatingInputCustom">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>                            
                            <button class="btn-register mb-3" type="submit">Register</button>
                            <p>Doesn't have an account? <span><a href="{{ route('login') }}" class="route">Sign in</a></span></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
{{-- bootstrap cdn --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
{{-- box icon cdn --}}
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</html>

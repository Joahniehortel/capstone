<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/css/admin-css/admin-register.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Sing up</title>
</head>
<body>
    <div class="container">
        <div>
            <img class="logo mb-3" src="/images/dc.png" alt="">
            <h1>Sign up</h1>
            <p>Sign up with your details to access barangay services and stay connected with your community.</p>
        </div>
        <form action="{{ route('admin.register.store')}}" method="POST">
            @csrf
            <div class="form-floating-custom mb-3">
                <input type="text" class="form-control" value="{{ old('firstname')}}" placeholder=" " required
                    name="firstname">
                <label for="floatingInputCustom">First name</label>
            </div>
            <div class="form-floating-custom mb-3">
                <input type="text" class="form-control" value="{{ old('lastname')}}" placeholder=" " required name="lastname">
                <label for="floatingInputCustom">Last name</label>
            </div>
            <div class="form-floating-custom mb-3">
                <input type="text" class="form-control" value="{{ old('contact_no')}}" placeholder=" " required name="contact_no">
                <label for="floatingInputCustom">Contact number</label>
            </div>
            <div class="form-floating-custom mb-3">
                <input 
                    type="text" 
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                    placeholder=" " 
                    value="{{ old('email') }}" 
                    name="email"
                    id="floatingInputCustom"
                >
                <label for="floatingInputCustom">Email</label>
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        <p class="text-start">{{ $errors->first('email') }}</p>
                    </div>
                @endif
            </div>
            <div class="form-floating-custom mb-3">
                <input type="password" class="form-control" value="{{ old('password') }}" placeholder=" " required name="password">
                <label for="floatingInputCustom">Password</label>
            </div>
            <button class="login-btn mb-3" type="submit">Sign up</button>
            <p class="mt-3">Already have an account? <span><a href="{{ route('admin.login') }}">Sign
                        in!</a></span></small>
        </form>
    </div>
</body>
</html>
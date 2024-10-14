<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/user-css/forgot-password.css">
    <title>Reset Password</title>
</head>
<body>
    <div class="container d-flex justify-content-center flex-column">
        <form action="{{ route('user.changePassword') }}" method="POST">
            @csrf
            <div class="w-100 text-center">
                <img class="image mb-3" src="/images/forgot-password.png" alt="">
            </div>
        
            <!-- Email field -->
            <input type="hidden" value="chansalonoy96@gmail.com" name="email">
        
            <!-- New password field -->
            <h1>Enter your new password</h1>
            <div class="row-md-6 mb-3">
                <label for="newPassword">New password</label>
                <input type="password" name="newPassword" class="form-control @error('newPassword') is-invalid @enderror" placeholder="Input new password">
                @error('newPassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <!-- Confirm password field -->
            <div class="row-md-6">
                <label for="confirmPassword">Confirm password</label>
                <input type="password" name="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror" placeholder="Input new password">
                @error('confirmPassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <!-- Submit button -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="mt-3">Change Password</button>
            </div>
        </form>        
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
</html>
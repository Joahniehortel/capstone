<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/user-css/forgot-password.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-otp">
        <div>
            @if (session('success'))
                <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                    <div class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true"
                        data-bs-delay="5000">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{ session('success') }}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @error('otp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="d-flex flex-column justify-content-center align-items-center text-center gap-3 w-100">
                <div class="w-100 text-center">
                    <img class="image mb-3 mt-5" src="/images/forgot-password.png" alt="">
                </div>
                <form action="{{ route('send.otp') }}" method="POST">
                    @csrf
                    <label for="otp">Please enter the One-Time Password (OTP) to verify your account</label>
                    <p style="opacity: 0.5">A one time password has been sent to {{ $userEmail }} </p>
                    <input type="hidden" value="{{ $userEmail }}" name="email">
                    <div class="d-flex justify-content-center mb-3 gap-2">
                        @for ($i = 0; $i < 4; $i++)
                            <input type="text" name="otp[]" class="form-control @error('otp.' . $i) is-invalid @enderror otp" required style="width: 50px;" maxlength="1" oninput="moveFocus(this, {{ $i }})">
                        @endfor
                    </div>                
                    <button type="submit" class="btn submit">Submit</button>
                </form>
                <div class="w-100">
                    <form action="{{ route('request.otp')}} " method="POST">
                        @csrf
                        <input type="hidden" name="email" value="{{ $userEmail }}">
                        <button type="submit" class="btn resend">Resend</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    function moveFocus(currentInput, index) {
    if (currentInput.value.length === currentInput.maxLength) {
        const nextInput = document.querySelectorAll('.otp')[index + 1];
        if (nextInput) {
            nextInput.focus();
        }
    }
    if (currentInput.value.length === 0 && index > 0) {
        const prevInput = document.querySelectorAll('.otp')[index - 1];
        prevInput.focus();
    }
}
    document.addEventListener('DOMContentLoaded', function() {
        var toastEl = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    });
    window.onload = function() {
        if (window.location.protocol === 'file:') {
            alert('This sample requires an HTTP server. Please serve this file with a web server.');
        }
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
</html>

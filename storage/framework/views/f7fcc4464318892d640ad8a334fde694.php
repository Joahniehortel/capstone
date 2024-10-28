<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/user-css/forgot-password.css">
    <title>OTP</title>
</head>

<body>
    <div class="container mt-5">
        <div>
            <div class="text-center">
                <img class="image mb-3" src="/images/forgot-password.png" alt="">
                <div class="row-md-6">
                    <h1>Forgot your password?</h1>
                    <p>Enter the email linked to your account to receive a One-Time Password (OTP) for password reset.</p>
                </div>
            </div>
            <form action="<?php echo e(route('request.otp')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control mb-3" placeholder="Enter your email">
                <div class="text-center">
                    <button type="submit">Reset password</button>
                    <a href="/login">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>
<?php /**PATH E:\bms\resources\views/auth/email.blade.php ENDPATH**/ ?>
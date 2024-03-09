<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Website Kasir | {{ $title }}</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <center>
                    <h1>Halaman Login</h1>
                </center>
                <form id="loginForm" action="/" method="post">
                    @csrf
                    <center><img src="assets/img/gambar1.jpg" width="180" alt=""
                            class="rounded-circle mb-3 mt-3" title="Gambar Pemrograman"></center>
                    @if (session('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Login <strong>Gagal </strong>Silahkan Coba Lagi
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            id="username" name="username" value="{{ old('username') }}" placeholder="name@gmail.com"
                            autofocus required>
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" value="{{ old('password') }}" placeholder="name" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" id="submitBtn" class="btn btn-dark" disabled>Submit</button>
                </form>
                <p class="mt-4 mb-3 text-body-secondary">&copy; Login</p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('input', function() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = !(username && password);
        });
    </script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/alert.js"></script>
    <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>

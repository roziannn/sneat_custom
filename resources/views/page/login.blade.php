<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login</title>

    <meta name="description" content="" />


    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />

    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="#" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('assets/img/dankos.png') }}" width="120" height="50">
                                </span>
                            </a>
                        </div>
                        <h4 class="mb-2">Welcome Back</h4>
                        <p class="mb-4">Please sign-in to your account OneKalbe</p>

                        <form id="login-form" class="mb-3">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your username" value="{{ old('email') }}" autofocus />
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="********" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loading-overlay">
        <div class="d-flex justify-content-center m-5">
            <div class="spinner-grow text-primary" role="status"></div>
            <div class="loading-text mt-3"><strong>Loading...</strong></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('login-form');
            const loadingOverlay = document.getElementById('loading-overlay');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const email = document.getElementById('email').value.trim();
                const password = document.getElementById('password').value.trim();

                const errors = form.querySelectorAll('.text-danger');
                errors.forEach(err => err.textContent = '');

                let valid = true;
                if (!email) {
                    const errorEmail = document.querySelector('#email + small');
                    if (errorEmail) errorEmail.textContent = 'Email is required.';
                    valid = false;
                }
                if (!password) {
                    const errorPassword = document.querySelector('#password + small');
                    if (errorPassword) errorPassword.textContent = 'Password is required.';
                    valid = false;
                }

                if (valid) {
                    loadingOverlay.style.display = 'flex';
                    setTimeout(() => {
                        loadingOverlay.style.display =
                            'none';
                        window.location.href = "/";
                    }, 2000);
                }
            });
        });
    </script>
</body>

<style>
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
    }

    .loading-overlay .spinner-grow {
        width: 3rem;
        height: 3rem;
    }

    .loading-overlay .loading-text {
        font-size: 1.2rem;
        color: #333;
    }
</style>

</html>

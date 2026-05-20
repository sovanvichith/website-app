<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">

    
<!-- Mirrored from mannatthemes.com/rizz/default/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 May 2025 08:19:04 GMT -->
<head>
        

        <meta charset="utf-8" />
                <title>Login</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta content="Login" name="description" />
                <meta content="" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />

                <!-- App favicon -->
                <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico')}}">

       
         <!-- App css -->
         <link href="{{ asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    <style>
        body.auth-body-bg {
            background: linear-gradient(135deg, #0d3b66 0%, #1f6f8b 50%, #3b8fb4 100%);
            min-height: 100vh;
            color: #374151;
        }
        .auth-card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(15, 23, 42, 0.15);
        }
        .auth-card .form-control {
            border-radius: 0.85rem;
            border: 1px solid #d1d5db;
        }
        .auth-card .btn-primary {
            border-radius: 2rem;
            padding: 0.85rem 1.5rem;
        }
        .auth-header {
            background: rgba(13, 59, 102, 0.95);
            color: #fff;
            padding: 2rem 1.75rem;
            text-align: center;
        }
        .auth-header h4 {
            margin-bottom: 0.5rem;
            font-size: 1.6rem;
        }
        .auth-header p {
            margin-bottom: 0;
            color: rgba(255,255,255,.8);
        }
        .auth-footer-text {
            color: rgba(255,255,255,0.8);
        }
    </style>
    </head>

    <body class="auth-body-bg">
    <div class="container-xxl">
        <div class="row vh-100 d-flex align-items-center justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card auth-card">
                    <div class="auth-header">
                        <a href="#" class="d-inline-block mb-3">
                            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" height="60" alt="Build Bright University Logo">
                        </a>
                        <h4>Build Bright University</h4>
                        <p>Secure campus login for students, faculty, and staff.</p>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h5 class="mb-1">Welcome Back</h5>
                            <p class="text-muted mb-0">Sign in with your university email to access your student dashboard.</p>
                        </div>
                        <form class="my-4" method="POST" action="{{ route('login') }}">    
                            @csrf         
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                               
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                         
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check form-check-inline mb-0">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted" for="remember">{{ __('Remember Me') }}</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="text-primary" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                @endif
                            </div>

                            <div class="d-grid mb-3">
                                <button class="btn btn-primary" type="submit">Log In</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <p class="text-muted mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-primary fw-semibold">Register now</a></p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4 auth-footer-text">
                    <p class="mb-0">Build Bright University • Excellence • Innovation • Community</p>
                </div>
            </div>
        </div>
    </div>
    </body>
    <!--end body-->

<!-- Mirrored from mannatthemes.com/rizz/default/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 May 2025 08:19:04 GMT -->
</html>
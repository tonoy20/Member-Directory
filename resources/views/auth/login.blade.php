<!-- Session Status -->
@extends('auth.layouts.master')

@section('content')


    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-page">
        <div class="container">
            <div class="pb-lg-5 pb-md-4 pb-3">
                <h1>Log in</h1>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-field">
                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" class="form-label" :value="__('Email address or user name')" />
                        <x-text-input id="email" class="block mt-1 form-control" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" class="form-label" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full form-control" type="password" name="password"
                            required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="remember-checkbox" name="remember">
                            <span class="ms-2 checkbox-text">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="mt-lg-5 mt-md-4 mt-4">
                        <div class="terms-policy">
                            <p class="pb-lg-2 pb-md-2 pb-2">By continuing, you agree to the <a href="http://">Terms of
                                    use</a>
                                and
                                <a href="http://">Privacy Policy</a>.
                            </p>
                            <x-primary-button class="w-100 login-button" id="login-button">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="d-flex justify-content-center pt-lg-4 pt-md-3 pt-3 forget-password"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                </div>
            </form>
            {{--  --}}
            <div class="d-flex justify-content-center pt-lg-4 pt-md-3 pt-3 acc-sign">
                <p>Don't have an account? <a href="{{ route('register') }}" class="text-dark">Sign up</a> </p>
            </div>

            <div class="d-flex justify-content-center pt-lg-5 pt-md-4 pt-4">
                <div class="connect_line"></div>
                <div class="px-lg-4 px-md-3 px-2 connect_text">Or continue with</div>
                <div class="connect_line"></div>
            </div>
            <div class="d-flex justify-content-center pt-lg-3 pt-md-2 pt-2">

                <a href="">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16" cy="16" r="14" fill="white" />
                        <path
                            d="M21.2137 20.2816L21.8356 16.3301H17.9452V13.767C17.9452 12.6857 18.4877 11.6311 20.2302 11.6311H22V8.26699C22 8.26699 20.3945 8 18.8603 8C15.6548 8 13.5617 9.89294 13.5617 13.3184V16.3301H10V20.2816H13.5617V29.8345C14.2767 29.944 15.0082 30 15.7534 30C16.4986 30 17.2302 29.944 17.9452 29.8345V20.2816H21.2137Z"
                            fill="url(#paint0_linear_80_296)" />
                        <defs>
                            <linearGradient id="paint0_linear_80_296" x1="16" y1="8" x2="16"
                                y2="30" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#0E88F0" />
                                <stop offset="1" stop-color="#097BEB" />
                            </linearGradient>
                        </defs>
                    </svg>
                </a>
                <div class="px-lg-4"></div>
                <a href="/auth/google/redirect" class="pt-lg-1 pt-md-1 pt-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22.0634 12.2235C22.0634 11.3961 21.9949 10.7924 21.8467 10.1663H12.2063V13.9005H17.865C17.7509 14.8285 17.1349 16.2261 15.7658 17.1652L15.7466 17.2902L18.7947 19.6044L19.0059 19.625C20.9453 17.8696 22.0634 15.2869 22.0634 12.2235Z"
                            fill="#4285F4" />
                        <path
                            d="M12.2051 22.0625C14.9774 22.0625 17.3047 21.168 19.0046 19.6251L15.7646 17.1653C14.8975 17.7579 13.7338 18.1716 12.2051 18.1716C9.48983 18.1716 7.18529 16.4163 6.36379 13.9901L6.24338 14.0001L3.07392 16.404L3.03247 16.5169C4.72094 19.804 8.18919 22.0625 12.2051 22.0625Z"
                            fill="#34A853" />
                        <path
                            d="M6.3655 13.9902C6.14874 13.3641 6.02329 12.6932 6.02329 12C6.02329 11.3068 6.14874 10.636 6.3541 10.0099L6.34836 9.87655L3.13917 7.43411L3.03418 7.48306C2.33827 8.8471 1.93896 10.3789 1.93896 12C1.93896 13.6212 2.33827 15.1529 3.03418 16.517L6.3655 13.9902Z"
                            fill="#FBBC05" />
                        <path
                            d="M12.2051 5.82831C14.1332 5.82831 15.4338 6.64448 16.1753 7.32654L19.0732 4.55375C17.2935 2.93257 14.9774 1.9375 12.2051 1.9375C8.18922 1.9375 4.72095 4.19595 3.03247 7.48301L6.3524 10.0099C7.18532 7.58367 9.48987 5.82831 12.2051 5.82831Z"
                            fill="#EB4335" />
                    </svg>
                </a>

            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input1 = document.getElementById('email');
            const input2 = document.getElementById('password');
            const button = document.getElementById('login-button');

            function checkInputs() {
                if (input1.value === '' || input2.value === '') {
                    button.classList.add('login-button-invalid');
                } else {
                    button.classList.remove('login-button-invalid');
                }
            }

            // Initial check
            checkInputs();

            // Event listeners for input changes
            input1.addEventListener('input', checkInputs);
            input2.addEventListener('input', checkInputs);
        });
    </script>
@endsection

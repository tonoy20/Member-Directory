@extends('auth.layouts.master')

@section('content')
    <div class="reg-page">
        <div class="container">
            <div class="text-center pb-lg-5 pb-md-4 pb-3">
                <div class="d-flex justify-content-center pb-lg-2 pb-md-1 pb-1">
                    <div class="reg-circle"></div>
                </div>
                <div>
                    <h1 class="">Sign Up</h1>
                </div>
            </div>

            <div class="pb-lg-4 pb-md-4 pb-4">
                <div class="pb-lg-3 pb-md-3 pb-2">
                    <button class="w-100 connect-with-button"><svg width="32" height="33" viewBox="0 0 32 33"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16" cy="16.5" r="14" fill="#0C82EE" />
                            <path
                                d="M21.2137 20.7816L21.8356 16.8301H17.9452V14.267C17.9452 13.1857 18.4877 12.1311 20.2302 12.1311H22V8.76699C22 8.76699 20.3945 8.5 18.8603 8.5C15.6548 8.5 13.5617 10.3929 13.5617 13.8184V16.8301H10V20.7816H13.5617V30.3345C14.2767 30.444 15.0082 30.5 15.7534 30.5C16.4986 30.5 17.2302 30.444 17.9452 30.3345V20.7816H21.2137Z"
                                fill="white" />
                        </svg>
                        Sign up with Facebook</button>
                </div>
                <div>
                    <button class="w-100 connect-with-button"><svg width="24" height="25" viewBox="0 0 24 25"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22.501 12.7332C22.501 11.8699 22.4296 11.2399 22.2748 10.5865H12.2153V14.4832H18.12C18.001 15.4515 17.3582 16.9099 15.9296 17.8898L15.9096 18.0203L19.0902 20.435L19.3106 20.4565C21.3343 18.6249 22.501 15.9298 22.501 12.7332Z"
                                fill="#4285F4" />
                            <path
                                d="M12.214 23C15.1068 23 17.5353 22.0666 19.3092 20.4567L15.9282 17.8899C15.0235 18.5083 13.8092 18.9399 12.214 18.9399C9.38069 18.9399 6.97596 17.1083 6.11874 14.5766L5.99309 14.5871L2.68583 17.0954L2.64258 17.2132C4.40446 20.6433 8.0235 23 12.214 23Z"
                                fill="#34A853" />
                            <path
                                d="M6.12046 14.5767C5.89428 13.9234 5.76337 13.2233 5.76337 12.5C5.76337 11.7767 5.89428 11.0767 6.10856 10.4234L6.10257 10.2842L2.75386 7.7356L2.64429 7.78667C1.91814 9.21002 1.50146 10.8084 1.50146 12.5C1.50146 14.1917 1.91814 15.79 2.64429 17.2133L6.12046 14.5767Z"
                                fill="#FBBC05" />
                            <path
                                d="M12.2141 6.05997C14.2259 6.05997 15.583 6.91163 16.3569 7.62335L19.3807 4.73C17.5236 3.03834 15.1069 2 12.2141 2C8.02353 2 4.40447 4.35665 2.64258 7.78662L6.10686 10.4233C6.97598 7.89166 9.38073 6.05997 12.2141 6.05997Z"
                                fill="#EB4335" />
                        </svg>
                        Sign up with Google</button>
                </div>
            </div>

            <div class="d-flex justify-content-center pt-lg-5 pt-md-4 pt-2 pb-lg-5 pb-md-4 pb-3">
                <div class="connect_line"></div>
                <div class="px-lg-4 px-md-3 px-2 connect_text">
                    <div class="connect_text_reg">OR</div>
                </div>
                <div class="connect_line"></div>
            </div>

            <div class="text-center pb-lg-5 pb-md-4 pb-3">
                <h5>Sign up with your email address</h5>
            </div>

            <form method="POST" action="{{ route('register') }}">
                <div class="login-field">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" class="form-label" :value="__('Profile name')" />
                        <x-text-input id="name" class="block mt-1 form-control" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name"
                            placeholder="Enter your profile name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" class="form-label" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 form-control" type="email" name="email"
                            :value="old('email')" required autocomplete="username" placeholder="Enter your email address" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" class="form-label" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 form-control" type="password" name="password"
                            required autocomplete="new-password" placeholder="Enter your password" />

                        <div class="reg-pass-text pt-lg-1 pt-md-1 pt-1">Use 8 or more characters with a mix of letters,
                            numbers & symbols</div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" class="form-label" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 form-control" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Re-type your password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="pt-lg-5 pt-md-4 pt-4 pb-lg-4 pb-md-3 pb-2">
                        <div class="terms-policy">
                            <p class="pb-lg-2 pb-md-2 pb-2">By continuing, you agree to the <a href="http://">Terms of
                                    use</a>
                                and
                                <a href="http://">Privacy Policy</a>.
                            </p>
                        </div>
                    </div>


                    <div class="">
                        <x-primary-button class="w-100 login-button" id="register-button">
                            {{ __('Sign up') }}
                        </x-primary-button>
                    </div>
                    <div class="text-center pt-lg-4 pt-md-3 pt-2 terms-policy">
                        Already have an account?
                        <a class="" href="{{ route('login') }}">
                            {{ __('Log in') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input1 = document.getElementById('name');
            const input2 = document.getElementById('email');
            const input3 = document.getElementById('password');
            const input4 = document.getElementById('password_confirmation');
            const button = document.getElementById('register-button');

            function checkInputs() {
                if (input1.value === '' || input2.value === '' || input3.value === '' || input4.value === '') {
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
            input3.addEventListener('input', checkInputs);
            input4.addEventListener('input', checkInputs);
        });
    </script>
@endsection

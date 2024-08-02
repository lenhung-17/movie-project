<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Reeceflix</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your custom CSS here */
        html, body {
            height: 100%;
            padding: 0;
            margin: 0;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
            box-sizing: border-box;
        }

        h3 {
            color: #e5e5e5;
        }

        .signInContainer {
            background-color: #efefee;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .column {
            background-color: #fff;
            min-height: 300px;
            max-height: 100%;
            width: 450px;
            box-shadow: rgba(0,0,0, 0.1) 0 1px 2px;
            padding: 20px 35px;
            overflow-y: auto;
        }

        .column form {
            display: flex;
            flex-direction: column;
            padding-top: 24px;
        }

        .column form input[type="text"],
        .column form input[type="email"],
        .column form input[type="password"] {
            font-size: 14px;
            margin: 10px 0;
            border: none;
            border-bottom: 1px solid #dedede;
        }

        .column form input[type="submit"] {
            background-color: #4285f4;
            color: #fff;
            height: 36px;
            width: 88px;
            border: none;
            border-radius: 3px;
            font-weight: 500;
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .column .header {
            padding: 20px 0;
        }

        .column h3 {
            font-size: 24px;
            font-weight: 400;
            line-height: 32px;
            margin: 0;
            padding-top: 16px;
            color: #000;
        }

        .column .header span {
            font-size: 14px;
        }

        .column .header img {
            width: 100px;
        }

        .signInMessage {
            font-size: 14px;
            font-weight: 400;
            text-decoration: none;
        }

        .errorMessage {
            color: #f00;
            font-size: 14px;
            font-weight: 400;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="signInContainer">
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="column">
        <div class="header">
            <img src="{{ asset('images/logo.png') }}" title="Logo" alt="Site logo" />
            <h3>Sign Up</h3>
            <span>to continue to Reeceflix</span>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
            <div class="errorMessage">{{ $message }}</div>
            @enderror

            <input type="password" name="password" placeholder="Password" required>
            @error('password')
            <div class="errorMessage">{{ $message }}</div>
            @enderror

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



{{--<x-guest-layout>--}}
{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
{{--                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ms-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}

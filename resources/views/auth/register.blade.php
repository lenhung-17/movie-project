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
    <div class="column">
        <div class="header">
            <img src="{{ asset('images/logo.png') }}" title="Logo" alt="Site logo" />
            <h3>Sign Up</h3>
            <span>to continue to Reeceflix</span>
        </div>

        <form method="POST" action="{{ route('register') }}">
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

            <input type="text" name="first_name" placeholder="First name" value="{{ old('first_name') }}" required>
            @error('first_name')
            <div class="errorMessage">{{ $message }}</div>
            @enderror

            <input type="text" name="last_name" placeholder="Last name" value="{{ old('last_name') }}" required>
            @error('last_name')
            <div class="errorMessage">{{ $message }}</div>
            @enderror

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @error('email')
            <div class="errorMessage">{{ $message }}</div>
            @enderror

            <input type="password" name="password" placeholder="Password" required>
            @error('password')
            <div class="errorMessage">{{ $message }}</div>
            @enderror

            <input type="password" name="password_confirmation" placeholder="Confirm password" required >
            @error('password')
            <div class="errorMessage">{{ $message }}</div>
            @enderror

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
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
{{--    <form method="POST" action="{{ route('register') }}">--}}
{{--        @csrf--}}

{{--        <!-- Name -->--}}
{{--        <div>--}}
{{--            <x-input-label for="name" :value="__('Name')" />--}}
{{--            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--            <x-input-error :messages="$errors->get('name')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Email Address -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Confirm Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--            <x-text-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password_confirmation" required autocomplete="new-password" />--}}

{{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">--}}
{{--                {{ __('Already registered?') }}--}}
{{--            </a>--}}

{{--            <x-primary-button class="ms-4">--}}
{{--                {{ __('Register') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}

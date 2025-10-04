<x-guest-layout>
    <head>
    <link rel="stylesheet" href="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background-image: url("{{ asset('public/assets/login.png') }}");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        }

        section {
            position: relative;
            max-width: 400px;
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(55px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 3rem;
        }

        h1 {
            font-size: 2rem;
            color: #fff;
            text-align: center;
        }

        .inputbox {
            position: relative;
            margin: 30px 0;
            max-width: 310px;
            border-bottom: 2px solid #fff;
        }

        .inputbox label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #000000ff;
            font-size: 1rem;
            pointer-events: none;
            transition: all 0.5s ease-in-out;
        }

        input:focus ~ label, 
        input:valid ~ label {
            top: -5px;
        }

        .inputbox input {
            width: 100%;
            height: 60px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1rem;
            padding: 0 35px 0 5px;
            color: #000000ff;
        }

        .inputbox ion-icon {
            position: absolute;
            right: 8px;
            color: #000000ff;
            font-size: 1.2rem;
            top: 20px;
        }

        .forget {
            margin: 35px 0;
            font-size: 0.85rem;
            color: #000000ff;
            display: flex;
            justify-content: space-between;
        }

        .forget label {
            display: flex;
            align-items: center;
        }

        .forget label input {
            margin-right: 3px;
        }

        .forget a {
            color: #000000ff;
            text-decoration: none;
            font-weight: 600;
        }

        .forget a:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            background-color: rgba(235, 191, 145, 1);
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.4s ease;
        }

        button:hover {
            background-color: rgba(255, 255, 255, 0.5);
        }

        .register {
            font-size: 0.9rem;
            color: #000000ff;
            text-align: center;
            margin: 25px 0 10px;
        }

        .register p a {
            text-decoration: none;
            color: #000000ff;
            font-weight: 600;
        }

        .register p a:hover {
            text-decoration: underline;
        }
    </style>
    </head>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                         :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                         :value="old('email')" required />
            </div>


            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full"
                         type="password" name="password"
                         required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password" name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-label for="image" :value="__('Profile Image')" />
                <x-input id="image" class="block mt-1 w-full"
                         type="file" name="image" accept="image/*" />
            </div>

            <!-- Bio -->
            <div class="mt-4">
                <x-label for="bio" :value="__('Bio')" />
                <textarea id="bio" name="bio"
                          class="block mt-1 w-full rounded-md border-gray-300 shadow-sm"
                          rows="3">{{ old('bio') }}</textarea>
            </div>

            <!-- Hobby -->
            <div class="mt-4">
                <x-label for="hobby" :value="__('Hobby')" />
                <x-input id="hobby" class="block mt-1 w-full" type="text" name="hobby"
                         :value="old('hobby')" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-label for="user_description" :value="__('Description')" />
                <x-input id="user_description" class="block mt-1 w-full" type="text"
                         name="user_description" :value="old('user_description')" />
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
</x-guest-layout>

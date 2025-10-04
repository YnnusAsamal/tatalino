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
                max-width: 420px;
                background-color: transparent;
                border: 2px solid rgba(255, 255, 255, 0.5);
                border-radius: 20px;
                backdrop-filter: blur(55px);
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 2rem 3rem;
                flex-direction: column;
            }

            h1 {
                font-size: 2rem;
                color: #fff;
                text-align: center;
                margin-bottom: 20px;
            }

            .inputbox {
                position: relative;
                margin: 20px 0;
                width: 100%;
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
            input:valid ~ label,
            textarea:focus ~ label,
            textarea:valid ~ label {
                top: -5px;
                font-size: 0.8rem;
                color: #333;
            }

            .inputbox input,
            .inputbox textarea {
                width: 100%;
                height: 50px;
                background: transparent;
                border: none;
                outline: none;
                font-size: 1rem;
                padding: 0 35px 0 5px;
                color: #000000ff;
            }

            .inputbox textarea {
                resize: none;
                height: 70px;
                padding-top: 10px;
            }

            .inputbox ion-icon {
                position: absolute;
                right: 8px;
                color: #000000ff;
                font-size: 1.2rem;
                top: 20px;
            }

            button {
                width: 100%;
                height: 45px;
                border-radius: 40px;
                background-color: rgba(235, 191, 145, 1);
                border: none;
                outline: none;
                cursor: pointer;
                font-size: 1rem;
                font-weight: 600;
                transition: all 0.4s ease;
                margin-top: 20px;
            }

            button:hover {
                background-color: rgba(255, 255, 255, 0.5);
            }

            .register {
                font-size: 0.9rem;
                color: #000000ff;
                text-align: center;
                margin: 20px 0 10px;
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

    <section>
        <h1>Register</h1>

        <x-auth-validation-errors class="mb-4 text-red-500" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="inputbox">
                <ion-icon name="person-outline"></ion-icon>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus>
                <label for="name">Name</label>
            </div>

            <!-- Email -->
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" name="email" value="{{ old('email') }}" required>
                <label for="email">Email</label>
            </div>

            <!-- Password -->
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="password" required autocomplete="new-password">
                <label for="password">Password</label>
            </div>

            <!-- Confirm Password -->
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="password_confirmation" required>
                <label for="password_confirmation">Confirm Password</label>
            </div>

            <!-- Profile Image -->
            <div class="inputbox">
                <ion-icon name="image-outline"></ion-icon>
                <input type="file" name="image" accept="image/*">
                <label for="image">Profile Image</label>
            </div>

            <!-- Bio -->
            <div class="inputbox">
                <textarea name="bio">{{ old('bio') }}</textarea>
                <label for="bio">Bio</label>
            </div>

            <!-- Hobby -->
            <div class="inputbox">
                <ion-icon name="heart-outline"></ion-icon>
                <input type="text" name="hobby" value="{{ old('hobby') }}">
                <label for="hobby">Hobby</label>
            </div>

            <!-- Description -->
            <div class="inputbox">
                <ion-icon name="document-text-outline"></ion-icon>
                <input type="text" name="user_description" value="{{ old('user_description') }}">
                <label for="user_description">Description</label>
            </div>

            <!-- Submit -->
            <button type="submit">Register</button>

            <div class="register">
                <p>Already registered? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </section>
</x-guest-layout>

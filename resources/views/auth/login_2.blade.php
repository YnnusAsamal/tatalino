
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

    <section>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="inputbox">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                <label for="email">Email</label>
                <ion- name="mail-outline"></ion-    icon>
            </div>

            <!-- Password -->
            <div class="inputbox">
                <input id="password" type="password" name="password" required autocomplete="current-password" />
                <label for="password">Password</label>
                <ion-icon name="lock-closed-outline"></ion-icon>
            </div>

            <!-- Remember Me -->
            <div class="forget">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
            </div>

            <button type="submit">
                {{ __('LOG IN') }}
            </button>

            <!-- Register link -->
            @if (Route::has('register'))
                <div class="register">
                    <p>Don't have an account? 
                        <a href="{{ route('register') }}">Register</a>
                    </p>
                </div>
            @endif
        </form>
    </section>

    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('status') }}',
                confirmButtonColor: '#3085d6'
            })
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#d33'
            })
        </script>
    @endif
</x-guest-layout>

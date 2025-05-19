<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login / Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background: #e6f0ff;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">
<div
    class="flex max-w-6xl w-full rounded-xl bg-white bg-opacity-30 backdrop-blur-md shadow-lg overflow-hidden"
>
    <!-- Left side -->
    <div
        class="relative flex flex-col items-center justify-center w-1/3 bg-blue-100 bg-opacity-20 p-14"
    >
        <h2 class="text-blue-900 font-extrabold text-2xl mb-3">Welcome Back !</h2>
        <p class="text-blue-700 text-sm text-center mb-6 leading-tight">
            To keep connected with us please login <br />with your personal info
        </p>
        <span class="text-blue-700 text-lg text-center max-w-[280px]">
        If you already have an account, please <a class="text-blue-900 font-bold underline hover:text-blue-700 transition" href="/login">Sign In</a>
      </span>

        <!-- Top circle -->
        <div
            class="absolute -top-20 -right-20 w-40 h-40 rounded-full bg-blue-300 bg-opacity-30"
            style="filter: drop-shadow(0 0 10px rgba(59,102,246,0.3))"
        ></div>
        <!-- Bottom circle -->
        <div
            class="absolute -bottom-20 -left-20 w-60 h-60 rounded-full bg-blue-300 bg-opacity-30"
            style="filter: drop-shadow(0 0 10px rgba(59,102,246,0.3))"
        ></div>
    </div>

    <!-- Right side -->
    <div class="flex flex-col w-2/3 p-14">
        <h2 class="text-blue-900 font-extrabold text-2xl mb-6">Create Account</h2>


        <form class="space-y-6 max-w-lg" action="" method="post">
            @csrf
            <div>
                <input
                    name="fullName"
                    type="text"
                    placeholder="Name"
                    class="w-full rounded-md border border-blue-300 bg-blue-50 bg-opacity-40 text-sm text-blue-700 py-3 px-4 focus:outline-none focus:ring-1 focus:ring-blue-400"
                    required
                />
            </div>
            <div>
                <input
                    name="email"
                    type="email"
                    placeholder="Email"
                    class="w-full rounded-md border border-blue-300 bg-blue-50 bg-opacity-40 text-sm text-blue-700 py-3 px-4 focus:outline-none focus:ring-1 focus:ring-blue-400"
                    required
                />
            </div>
            <div>
                <input
                    id="numericInput"
                    name="phone"
                    type="text"
                    placeholder="Phone"
                    class="w-full rounded-md border border-blue-300 bg-blue-50 bg-opacity-40 text-sm text-blue-700 py-3 px-4 focus:outline-none focus:ring-1 focus:ring-blue-400"
                    maxlength="10"
                    pattern="\d*"
                    required
                />
            </div>
            <div>
                <label class="block mb-1 text-blue-700 text-sm font-semibold" for="gender">Choose Gender</label>
                <select
                    id="gender"
                    name="gender"
                    class="w-full rounded-md border border-blue-300 bg-blue-50 bg-opacity-40 text-sm text-blue-700 py-3 px-4 focus:outline-none focus:ring-1 focus:ring-blue-400"
                >
                    <option value="" disabled selected>Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="relative">
                <input
                    name="password"
                    id="password"
                    type="password"
                    placeholder="Password"
                    class="w-full rounded-md border border-blue-300 bg-blue-50 bg-opacity-40 text-sm text-blue-700 py-3 px-4 pr-12 focus:outline-none focus:ring-1 focus:ring-blue-400"
                    required onkeyup='check();'
                />
                <button
                    type="button"
                    id="togglePassword"
                    class="absolute right-4 top-1/2 -translate-y-1/2 text-blue-700 hover:text-blue-900 focus:outline-none"
                    aria-label="Toggle password visibility"
                >
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <div class="relative">
                <input
                    name="password_confirmation"
                    id="password_confirmation"
                    type="password"
                    placeholder="Confirm Password"
                    class="w-full rounded-md border border-blue-300 bg-blue-50 bg-opacity-40 text-sm text-blue-700 py-3 px-4 pr-12 focus:outline-none focus:ring-1 focus:ring-blue-400"
                    required onkeyup='check();'
                />
                <button
                    type="button"
                    id="togglecPassword"
                    class="absolute right-4 top-1/2 -translate-y-1/2 text-blue-700 hover:text-blue-900 focus:outline-none"
                    aria-label="Toggle password visibility"
                >
                    <i class="fas fa-eye"></i>
                </button>

                <span id='message'></span>
            </div>

            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif

            <button
                type="submit"
                class="bg-blue-500 bg-opacity-80 text-white text-sm font-extrabold px-12 py-3 rounded-full shadow-md hover:bg-blue-600 transition"
            >
                SIGN UP
            </button>
        </form>
    </div>
</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const togglecPassword = document.getElementById('togglecPassword');
    const cpassword = document.getElementById('password_confirmation');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    togglecPassword.addEventListener('click', function () {
        const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
        cpassword.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    var check = function() {
        var password = document.getElementById('password').value;
        var confirmation = document.getElementById('password_confirmation').value;
        var message = document.getElementById('message');
        var submitButton = document.querySelector("button[type='submit']");

        if (password === "" || confirmation === "") {
            message.style.color = 'gray';
            message.innerHTML = 'Please fill in both password fields';
            submitButton.disabled = true;
        } else if (password === confirmation) {
            message.style.color = 'green';
            message.innerHTML = 'Password matches';
            submitButton.disabled = false;
        } else {
            message.style.color = 'red';
            message.innerHTML = 'Password do not match';
            submitButton.disabled = true;
        }
    };


    document.getElementById('numericInput').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
</body>
</html>

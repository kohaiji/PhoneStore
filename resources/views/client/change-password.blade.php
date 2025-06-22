<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reset Password</title>
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
        <h2 class="text-blue-900 font-extrabold text-2xl mb-3">Change Password</h2>
        <p class="text-blue-700 text-sm text-center mb-6 leading-tight">
            Enter your details below to change your password
        </p>
        <span class="text-blue-700 text-lg text-center max-w-[280px]">
        Wanna change your mind, go to <a href="/" class="text-blue-900 font-bold underline hover:text-blue-700 transition">Home Page</a>
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
        <h2 class="text-blue-900 font-extrabold text-2xl mb-6">Change Password</h2>
        <p class="text-blue-700 text-sm mb-8">Please fill in all fields to change your password</p>

        <form action="{{ route('client.postChangePassword') }}" method="POST" class="space-y-6 max-w-lg">
            @csrf

            @if(session('error'))
                <div class="text-red-500 text-sm">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="text-green-500 text-sm">{{ session('success') }}</div>
            @endif

            <!-- Old Password -->
            <div class="relative">
                <input id="old_password" name="old_password" type="password"
                       placeholder="Old Password"
                       class="w-full rounded-md border border-blue-300 bg-blue-50 bg-opacity-40 text-sm text-blue-700 py-3 px-4 pr-10 focus:outline-none focus:ring-1 focus:ring-blue-400"/>
                <i class="fas fa-eye absolute right-3 top-3.5 cursor-pointer text-blue-500 toggle-password" toggle="#old_password"></i>
                @error('old_password') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- New Password -->
            <div class="relative">
                <input id="password" name="password" type="password"
                       placeholder="New Password"
                       class="w-full rounded-md border border-blue-300 bg-blue-50 bg-opacity-40 text-sm text-blue-700 py-3 px-4 pr-10 focus:outline-none focus:ring-1 focus:ring-blue-400"
                       onkeyup="checkPasswordMatch()"/>
                <i class="fas fa-eye absolute right-3 top-3.5 cursor-pointer text-blue-500 toggle-password" toggle="#password"></i>
                @error('password') <div class="text-red-500 text-xs mt-1">{{ $message }}</div> @enderror
            </div>

            <!-- Confirm Password -->
            <div class="relative">
                <input id="password_confirmation" name="password_confirmation" type="password"
                       placeholder="Confirm New Password"
                       class="w-full rounded-md border border-blue-300 bg-blue-50 bg-opacity-40 text-sm text-blue-700 py-3 px-4 pr-10 focus:outline-none focus:ring-1 focus:ring-blue-400"
                       onkeyup="checkPasswordMatch()"/>
                <i class="fas fa-eye absolute right-3 top-3.5 cursor-pointer text-blue-500 toggle-password" toggle="#password_confirmation"></i>
            </div>

            <!-- Match message -->
            <div id="message" class="text-sm font-semibold"></div>

            <!-- Submit button -->
            <button type="submit"
                    id="submitBtn"
                    class="bg-blue-500 bg-opacity-80 text-white text-sm font-extrabold px-12 py-3 rounded-full shadow-md hover:bg-blue-600 transition"
                    disabled>
                CHANGE PASSWORD
            </button>
        </form>

    </div>
</div>

<script>
    // Toggle eye icon
    document.querySelectorAll('.toggle-password').forEach(function (icon) {
        icon.addEventListener('click', function () {
            const input = document.querySelector(icon.getAttribute('toggle'));
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            icon.classList.toggle('fa-eye-slash');
        });
    });

    // Check password match
    function checkPasswordMatch() {
        const password = document.getElementById('password').value;
        const confirmation = document.getElementById('password_confirmation').value;
        const message = document.getElementById('message');
        const submitButton = document.getElementById('submitBtn');

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
            message.innerHTML = 'Passwords do not match';
            submitButton.disabled = true;
        }
    }
</script>
</body>
</html>

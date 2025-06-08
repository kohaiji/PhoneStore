<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>
        Customize Account - PhoneStore
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        /* Custom scrollbar for file input */
        input[type="file"]::-webkit-file-upload-button {
            cursor: pointer;
            background: #2563eb;
            border: none;
            padding: 8px 16px;
            color: white;
            font-weight: 600;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease;
        }
        input[type="file"]::-webkit-file-upload-button:hover {
            background: #1e40af;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
<!-- Header -->
@include('client.header')
<!-- Main Content -->
<main class="max-w-3xl mx-auto px-6 sm:px-8 lg:px-10 py-12">
    <h1 class="text-3xl font-extrabold text-gray-900 mb-10 select-none tracking-tight">
        Customize Your Account Information
    </h1>
    <form class="bg-white shadow-lg rounded-2xl p-10 space-y-8" id="accountForm" novalidate="">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-center">
            <label class="block text-gray-700 font-semibold select-none" for="profileImage">
                Profile Image
            </label>
            <div class="md:col-span-3 flex items-center space-x-8">
                <div class="w-32 h-32 rounded-xl border border-gray-300 overflow-hidden bg-gray-100 flex items-center justify-center shadow-sm">
                    <img alt="User profile image preview" class="object-cover w-32 h-32 rounded-xl" height="128" id="profileImagePreview" src="https://storage.googleapis.com/a1aa/image/73729077-3a08-4714-0116-18a0a6a74e9f.jpg" width="128"/>
                </div>
                <div class="flex flex-col space-y-2">
                    <input accept="image/*" class="block w-full text-sm text-gray-500 cursor-pointer focus:outline-none" id="profileImage" name="profileImage" type="file"/>
                    <p class="text-xs text-gray-400 max-w-xs select-none">
                        Upload a profile picture (any size). It will be resized to fit.
                    </p>
                </div>
            </div>
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-2 select-none" for="fullName">
                Full Name
            </label>
            <input class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" id="fullName" name="fullName" placeholder="Enter your full name" required="" type="text"/>
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-2 select-none" for="email">
                Email Address
            </label>
            <input class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" id="email" name="email" placeholder="Enter your email address" required="" type="email"/>
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-2 select-none" for="phone">
                Phone Number
            </label>
            <input class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" id="phone" name="phone" placeholder="Enter your phone number" type="tel"/>
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-2 select-none" for="address">
                Address
            </label>
            <textarea class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent resize-none transition" id="address" name="address" placeholder="Enter your address" rows="4"></textarea>
        </div>
        <div class="pt-6">
            <button class="w-full bg-blue-600 text-white font-extrabold text-lg py-3 rounded-xl shadow-md hover:bg-blue-700 transition select-none" type="submit">
                Save Changes
            </button>
        </div>
    </form>
</main>
<!-- Footer -->
@include('client.footer')

<script>
    const profileImageInput = document.getElementById('profileImage');
    const profileImagePreview = document.getElementById('profileImagePreview');

    profileImageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = (e) => {
            profileImagePreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>
</body>
</html>

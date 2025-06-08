<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Checkout Success - PhoneStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
<!-- Header -->
@include('client.header')
<main class="flex-grow flex items-center justify-center p-8">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full text-center p-8">
        <svg class="mx-auto mb-6 w-20 h-20 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
        </svg>
        <h1 class="text-3xl font-bold mb-4 text-gray-900">Checkout Successful!</h1>
        <p class="text-gray-700 mb-6">Thank you for your order. Your checkout was completed successfully.</p>
        <a href="/" class="inline-block bg-blue-600 text-white font-semibold px-6 py-3 rounded hover:bg-blue-700 transition-colors">Back to Home</a>
    </div>
</main>

<!-- Footer -->
@include('client.footer')
</body>
</html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Order Details - PhoneStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen p-6">
<!-- Header -->
@include('client.header')
<main class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
    <h1 class="text-2xl font-semibold mb-6 text-gray-900">Order Details</h1>
    <section class="mb-8">
        <h2 class="text-xl font-semibold mb-4 text-gray-900">Order Information</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
            <div><span class="font-semibold">Order ID:</span> #1002</div>
            <div><span class="font-semibold">Order Date:</span> 2024-06-10</div>
            <div><span class="font-semibold">Status:</span> <span class="inline-block px-2 py-1 text-xs font-semibold rounded bg-yellow-100 text-yellow-800">Processing</span></div>
            <div><span class="font-semibold">Payment Method:</span> e-wallet Zalopay</div>
        </div>
    </section>
    <section class="mb-8">
        <h2 class="text-xl font-semibold mb-4 text-gray-900">Receiver Information</h2>
        <div class="text-sm text-gray-700 space-y-2">
            <div><span class="font-semibold">Name:</span> John Doe</div>
            <div><span class="font-semibold">Phone Number:</span> 123-456-7890</div>
            <div><span class="font-semibold">Address:</span> 123 Main St, Cityville, Country</div>
            <div><span class="font-semibold">Email:</span> johndoe@example.com</div>
        </div>
    </section>
    <section>
        <h2 class="text-xl font-semibold mb-4 text-gray-900">Ordered Products</h2>
        <div class="space-y-6">
            <!-- Product 1 -->
            <div class="flex items-center space-x-4 border-b border-gray-200 pb-4">
                <img src="https://storage.googleapis.com/a1aa/image/e72cf40c-a28d-43e4-c773-8026180fb5a0.jpg" alt="Galaxy X Pro smartphone front view with colorful app icons" class="w-20 h-20 object-contain rounded" />
                <div class="flex-1">
                    <p class="font-semibold text-gray-800">Galaxy X Pro</p>
                    <p class="text-sm text-gray-600">Quantity: 2</p>
                </div>
                <div class="text-sm font-semibold text-gray-900">$899.00</div>
                <div class="text-sm font-semibold text-gray-900">$1,798.00</div>
            </div>
            <!-- Product 2 -->
            <div class="flex items-center space-x-4 border-b border-gray-200 pb-4">
                <img src="https://storage.googleapis.com/a1aa/image/3b2443aa-377c-40b7-cdb8-2be60f2a9b51.jpg" alt="iPhone Ultra smartphone front view with blue and purple wallpaper" class="w-20 h-20 object-contain rounded bg-[#fef0f5]" />
                <div class="flex-1">
                    <p class="font-semibold text-gray-800">iPhone Ultra</p>
                    <p class="text-sm text-gray-600">Quantity: 1</p>
                </div>
                <div class="text-sm font-semibold text-gray-900">$1,099.00</div>
                <div class="text-sm font-semibold text-gray-900">$1,099.00</div>
            </div>
            <!-- Summary -->
            <div class="flex justify-between border-t border-gray-300 pt-4 text-gray-900 font-semibold">
                <span>Subtotal</span>
                <span>$2,897.00</span>
            </div>
            <div class="flex justify-between text-gray-700 mt-1">
                <span>Tax (10%)</span>
                <span>$289.70</span>
            </div>
            <div class="flex justify-between border-t border-gray-300 pt-4 text-lg font-bold text-gray-900">
                <span>Total</span>
                <span>$3,186.70</span>
            </div>
        </div>
    </section>
    <a href="/order-history" class="inline-block mt-6 bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition-colors text-center">Back to Order History</a>
</main>
<!-- Footer -->
@include('client.footer')
</body>
</html>

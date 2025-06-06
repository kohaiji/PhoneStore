<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Checkout - PhoneStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-900 flex flex-col min-h-screen">
<!-- Header -->
@include('client.header')
<main class="bg-white rounded-lg shadow-lg max-w-4xl w-full p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Order Summary -->
    <section>
        <h2 class="text-xl font-semibold mb-6 text-gray-900">Order Summary</h2>
        <div class="space-y-6">
            <!-- Order item example -->
            <div class="flex justify-between items-center border-b border-gray-200 pb-3">
                <div class="flex items-center space-x-4">
                    <img
                        src="https://storage.googleapis.com/a1aa/image/e72cf40c-a28d-43e4-c773-8026180fb5a0.jpg"
                        alt="Galaxy X Pro smartphone front view with colorful app icons"
                        class="w-16 h-16 object-contain rounded"
                    />
                    <div>
                        <p class="font-semibold text-gray-800">Galaxy X Pro</p>
                        <p class="text-xs text-gray-600">Quantity: 2</p>
                    </div>
                </div>
                <div class="text-sm font-semibold text-gray-900">$1,798</div>
            </div>
            <div class="flex justify-between items-center border-b border-gray-200 pb-3">
                <div class="flex items-center space-x-4">
                    <img
                        src="https://storage.googleapis.com/a1aa/image/3b2443aa-377c-40b7-cdb8-2be60f2a9b51.jpg"
                        alt="iPhone Ultra smartphone front view with blue and purple wallpaper"
                        class="w-16 h-16 object-contain rounded bg-[#fef0f5]"
                    />
                    <div>
                        <p class="font-semibold text-gray-800">iPhone Ultra</p>
                        <p class="text-xs text-gray-600">Quantity: 1</p>
                    </div>
                </div>
                <div class="text-sm font-semibold text-gray-900">$1,099</div>
            </div>
            <!-- Subtotal -->
            <div class="flex justify-between items-center border-t border-gray-300 pt-4">
                <span class="font-semibold text-gray-900">Subtotal</span>
                <span class="font-semibold text-gray-900">$2,897</span>
            </div>
            <!-- Tax -->
            <div class="flex justify-between items-center mt-2">
                <span class="text-gray-700">Tax (10%)</span>
                <span class="text-gray-700">$289.70</span>
            </div>
            <!-- Total -->
            <div class="flex justify-between items-center mt-4 border-t border-gray-300 pt-4">
                <span class="text-lg font-bold text-gray-900">Total</span>
                <span class="text-lg font-bold text-gray-900">$3,186.70</span>
            </div>
        </div>
    </section>
    <!-- Checkout Form -->
    <section>
        <h1 class="text-2xl font-semibold mb-6 text-gray-900">Checkout</h1>
        <form id="checkoutForm">
            <div class="mb-5">
                <label for="receiverName" class="block text-sm font-semibold mb-1 text-gray-700">Receiver Name</label>
                <input
                    type="text"
                    id="receiverName"
                    name="receiverName"
                    placeholder="Enter receiver's name"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div class="mb-5">
                <label for="phoneNumber" class="block text-sm font-semibold mb-1 text-gray-700">Phone Number</label>
                <input
                    type="tel"
                    id="phoneNumber"
                    name="phoneNumber"
                    placeholder="Enter phone number"
                    required
                    pattern="[0-9]{9,15}"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div class="mb-5">
                <label for="address" class="block text-sm font-semibold mb-1 text-gray-700">Receiver Address</label>
                <textarea
                    id="address"
                    name="address"
                    placeholder="Enter receiver's address"
                    required
                    rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>
            <div class="mb-5">
                <label for="email" class="block text-sm font-semibold mb-1 text-gray-700">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter email address"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <fieldset class="mb-6">
                <legend class="text-sm font-semibold mb-2 text-gray-700">Payment Method</legend>
                <div class="flex flex-col space-y-3">
                    <label class="inline-flex items-center space-x-2 text-gray-700 text-sm cursor-pointer">
                        <input
                            type="radio"
                            name="paymentMethod"
                            value="cod"
                            required
                            class="form-radio text-blue-600"
                            onchange="toggleZalopayInfo(false)"
                        />
                        <span>Cash on Delivery (COD)</span>
                    </label>
                    <label class="inline-flex items-center space-x-2 text-gray-700 text-sm cursor-pointer">
                        <input
                            type="radio"
                            name="paymentMethod"
                            value="zalopay"
                            required
                            class="form-radio text-blue-600"
                            onchange="toggleZalopayInfo(true)"
                        />
                        <span>e-wallet Zalopay</span>
                    </label>
                </div>
            </fieldset>
            <!-- Zalopay info dropdown -->
            <div id="zalopayInfo" class="mb-6 hidden border border-gray-300 rounded p-4 bg-gray-50">
                <h3 class="text-sm font-semibold mb-3 text-gray-700">Zalopay e-wallet Information</h3>
                <div class="mb-4">
                    <label for="zalopayId" class="block text-xs font-semibold mb-1 text-gray-700">Zalopay ID</label>
                    <input
                        type="text"
                        id="zalopayId"
                        name="zalopayId"
                        placeholder="Enter your Zalopay ID"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div>
                    <label for="zalopayPhone" class="block text-xs font-semibold mb-1 text-gray-700">Phone Number Linked to Zalopay</label>
                    <input
                        type="tel"
                        id="zalopayPhone"
                        name="zalopayPhone"
                        placeholder="Enter phone number"
                        pattern="[0-9]{9,15}"
                        class="w-full border border-gray-300 rounded px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
            </div>
            <button
                type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-3 rounded hover:bg-blue-700 transition-colors"
            >
                Place Order
            </button>
        </form>
    </section>
</main>
<script>
    function toggleZalopayInfo(show) {
        const zalopayDiv = document.getElementById('zalopayInfo');
        if (show) {
            zalopayDiv.classList.remove('hidden');
            // Make inputs required when visible
            zalopayDiv.querySelectorAll('input').forEach(input => input.required = true);
        } else {
            zalopayDiv.classList.add('hidden');
            // Remove required attribute when hidden
            zalopayDiv.querySelectorAll('input').forEach(input => input.required = false);
        }
    }
</script>
<!-- Footer -->
@include('client.footer')
</body>
</html>

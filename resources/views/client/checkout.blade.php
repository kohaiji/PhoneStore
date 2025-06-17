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
            background-color: #f3f4f6; /* Tailwind's gray-100 */
        }
        /* Fix input height for textarea */
        textarea {
            height: auto;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
<!-- Header -->
@include('client.header')
<main class="max-w-5xl w-full mx-auto my-8 grid grid-cols-1 md:grid-cols-2 gap-10 px-4 mt-16" style="margin-top: 100px">
    <!-- Order Summary -->
    <section class="bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-semibold mb-8 text-gray-900 border-b border-gray-200 pb-3">Order Summary</h2>
        <div class="space-y-6 max-h-[600px] overflow-y-auto pr-2">
            @foreach($cart as $obj)
                <!-- Order item example -->
                <div class="flex justify-between items-center border-b border-gray-200 pb-4">
                    <div class="flex items-center space-x-5">
                        <img
                            src="{{$obj["image_url"] ? '/image_product/' . $obj["image_url"] : $obj["image_url"]}}"
                            alt="{{$obj["product_name"]}}"
                            class="w-20 h-20 object-contain rounded"
                        />
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">{{$obj['product_name']}}</p>
                            <p class="text-xs text-gray-600">Quantity: {{$obj['quantity']}}</p>
                            <p class="text-xs text-gray-600">Color: {{$obj['color']}}</p>
                            <p class="text-xs text-gray-600">Storage: {{$obj['storage']}}</p>
                        </div>
                    </div>
                    <div class="text-sm font-semibold text-gray-900 whitespace-nowrap">{{ number_format($obj['price'] * $obj['quantity'], 0, ',', ',') }}đ</div>
                </div>
            @endforeach
            <!-- Subtotal -->
{{--            <div class="flex justify-between items-center border-t border-gray-300 pt-5 mt-5">--}}
{{--                <span class="font-semibold text-gray-900 text-base">Subtotal</span>--}}
{{--                <span class="font-semibold text-gray-900 text-base">{{ number_format($total, 0, ',', ',') }}đ</span>--}}
{{--            </div>--}}
            <!-- Tax -->
{{--            <div class="flex justify-between items-center mt-2">--}}
{{--                <span class="text-gray-700 text-sm">Tax (10%)</span>--}}
{{--                <span class="text-gray-700 text-sm">$289.70</span>--}}
{{--            </div>--}}
            <!-- Total -->
            <div class="flex justify-between items-center mt-6 border-t border-gray-300 pt-5">
                <span class="text-xl font-bold text-gray-900">Total</span>
                <span class="text-xl font-bold text-gray-900">{{ number_format($total, 0, ',', ',') }}đ</span>
            </div>
        </div>
    </section>

    <!-- Checkout Form -->
    <section>
        <h1 class="text-2xl font-semibold mb-8 text-gray-900 border-b border-gray-200 pb-3">Checkout Information</h1>
        <form id="checkoutForm" action="cart/checkout" method="post" class="space-y-6 bg-white rounded-lg shadow-lg p-8">
            @csrf
            <input type="hidden" name="total" value="{{$total}}">
            <input type="hidden" name="userId" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
            <div>
                <label for="email" class="block text-sm font-semibold mb-2 text-gray-700">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter email address"
                    required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                />
            </div>
            <div>
                <label for="phoneNumber" class="block text-sm font-semibold mb-2 text-gray-700">Phone Number</label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    placeholder="Enter phone number"
                    required
                    pattern="[0-9]{9,15}"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{\Illuminate\Support\Facades\Auth::user()->phone}}"
                />
            </div>
            <div>
                <label for="receiverName" class="block text-sm font-semibold mb-2 text-gray-700">Receiver Name</label>
                <input
                    type="text"
                    id="receiverName"
                    name="receiverName"
                    placeholder="Enter receiver's name"
                    required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{\Illuminate\Support\Facades\Auth::user()->name}}"
                />
            </div>
            <div>
                <label for="address" class="block text-sm font-semibold mb-2 text-gray-700">Receiver Address</label>
                <textarea
                    id="address"
                    name="address"
                    placeholder="Enter receiver's address"
                    required
                    rows="3"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{\Illuminate\Support\Facades\Auth::user()->address}}</textarea>
            </div>
            <fieldset class="mb-6">
                <legend class="text-sm font-semibold mb-3 text-gray-700">Payment Method</legend>
                <div class="flex flex-col space-y-4">
                    <label class="inline-flex items-center space-x-3 text-gray-700 text-sm cursor-pointer">
                        <input
                            type="radio"
                            name="paymentMethod"
                            value="cod"
                            required
                            class="form-radio text-blue-600 h-5 w-5"
                            onchange="toggleZalopayInfo(false)"
                        />
                        <span>Cash on Delivery (COD)</span>
                    </label>

{{--                    <label class="inline-flex items-center space-x-3 text-gray-700 text-sm cursor-pointer">--}}
{{--                        <input--}}
{{--                            type="radio"--}}
{{--                            name="paymentMethod"--}}
{{--                            value="zalopay"--}}
{{--                            required--}}
{{--                            class="form-radio text-blue-600 h-5 w-5"--}}
{{--                            onchange="toggleZalopayInfo(true)"--}}
{{--                        />--}}
{{--                        <span>e-wallet Zalopay</span>--}}
{{--                    </label>--}}

                    <label class="inline-flex items-center space-x-3 text-gray-700 text-sm cursor-pointer">
                        <input
                            type="radio"
                            name="paymentMethod"
                            value="payos"
                            required
                            class="form-radio text-blue-600 h-5 w-5"
                            onchange="togglePayOSInfo(true)"
                        />
                        <span>PayOS</span>
                    </label>
                </div>
            </fieldset>

            <div id="payosInfo" class="mb-6 hidden border border-gray-300 rounded-md p-5 bg-gray-50">
                <h3 class="text-sm font-semibold mb-4 text-gray-700">PayOS Payment</h3>
                <p class="text-xs text-gray-600">
                    You will be redirected to PayOS payment gateway after placing order
                </p>
            </div>
            <!-- Zalopay info dropdown -->
            <div id="zalopayInfo" class="mb-6 hidden border border-gray-300 rounded-md p-5 bg-gray-50">
                <h3 class="text-sm font-semibold mb-4 text-gray-700">Zalopay e-wallet Information</h3>
                <div class="mb-5">
                    <label for="zalopayId" class="block text-xs font-semibold mb-2 text-gray-700">Zalopay ID</label>
                    <input
                        type="text"
                        id="zalopayId"
                        name="zalopayId"
                        placeholder="Enter your Zalopay ID"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div>
                    <label for="zalopayPhone" class="block text-xs font-semibold mb-2 text-gray-700">Phone Number Linked to Zalopay</label>
                    <input
                        type="tel"
                        id="zalopayPhone"
                        name="zalopayPhone"
                        placeholder="Enter phone number"
                        pattern="[0-9]{9,15}"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
            </div>
            <button
                type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-md hover:bg-blue-700 transition-colors"
            >
                Place Order
            </button>
        </form>
    </section>
</main>
<script>
    function togglePayOSInfo(show) {
        const payosDiv = document.getElementById('payosInfo');
        if (show) {
            payosDiv.classList.remove('hidden');
        } else {
            payosDiv.classList.add('hidden');
        }
    }

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
        togglePayOSInfo(false);
    }
</script>
<!-- Footer -->
@include('client.footer')
<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
    });
    @endif
</script>
</body>
</html>

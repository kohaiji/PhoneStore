<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>
        PhoneStore Cart
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            font-size: 1.125rem; /* 18px, noticeably bigger */
        }
    </style>
</head>
<body class="bg-white text-gray-900 flex flex-col min-h-screen">
<!-- Header -->
@include('client.header')
<!-- Main content -->
<main class="max-w-6xl mx-auto px-6 py-10 flex-grow">
    <h2 class="text-center font-semibold text-lg mb-6" style="margin-top: 60px; font-size:35px">
        Your Shopping Cart
    </h2>
    <div class="max-w-5xl mx-auto">
        <a class="text-red-600 mb-4 inline-block underline hover:text-blue-500" href="#">
            Remove All
        </a>
        <div class="flex flex-col md:flex-row md:space-x-8">
            <div class="flex-1 space-y-4">
                <!-- Item 1 -->
                <div class="flex items-center space-x-4 bg-white rounded-lg p-4 shadow-sm border border-transparent hover:border-gray-100">
                    <div class="flex-shrink-0 bg-[#F9F0F7] rounded-md p-2">
                        <img alt="Galaxy X Pro phone with colorful screen angled view" class="w-16 h-16 object-contain" height="64" src="https://storage.googleapis.com/a1aa/image/fa71cf39-a8e5-4adb-c044-9b22daa62230.jpg" width="64"/>
                    </div>
                    <div class="flex-1 text-gray-700">
                        <a class="text-[#0057FF] font-semibold text-sm leading-tight" href="#">
                            Galaxy X Pro
                        </a>
                        <p class="mt-1 leading-tight text-base">
                            Experience the power of the latest Galaxy X Pro with stunning display and fast
                            performance.
                        </p>
                        <div class="flex items-center space-x-4 mt-2 font-semibold text-gray-900 text-base">
         <span>
          <span class="font-bold">
           $899
          </span>
         </span>
                            <span>
          Quantity:
         </span>
                            <input class="w-16 border border-gray-300 rounded px-1 py-0.5 text-base" min="1" type="number" value="1"/>
                            <a class="text-red-600 font-normal text-base hover:text-blue-500" href="#">
                                Remove
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="flex items-center space-x-4 bg-white rounded-lg p-4 shadow-sm border border-transparent hover:border-gray-100">
                    <div class="flex-shrink-0 bg-[#F9F0F7] rounded-md p-2">
                        <img alt="iPhone Ultra phone black back with pink background" class="w-16 h-16 object-contain" height="64" src="https://storage.googleapis.com/a1aa/image/6ab9284f-51a6-4771-eb33-47fa955ac262.jpg" width="64"/>
                    </div>
                    <div class="flex-1 text-gray-700">
                        <a class="text-[#0057FF] font-semibold text-sm leading-tight" href="#">
                            iPhone Ultra
                        </a>
                        <p class="mt-1 leading-tight text-base">
                            The new iPhone Ultra offers incredible camera quality and smooth user experience.
                        </p>
                        <div class="flex items-center space-x-4 mt-2 font-semibold text-gray-900 text-base">
         <span>
          <span class="font-bold">
           $1099
          </span>
         </span>
                            <span>
          Quantity:
         </span>
                            <input class="w-16 border border-gray-300 rounded px-1 py-0.5 text-base" min="1" type="number" value="1"/>
                            <a class="text-red-600 font-normal text-base hover:text-blue-500" href="#">
                                Remove
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Summary -->
            <div class="mt-6 md:mt-0 w-full md:w-80 bg-white rounded-lg p-6 shadow-sm border border-transparent hover:border-gray-100 text-base">
                <h3 class="font-semibold mb-4">
                    Order Summary
                </h3>
                <div class="flex justify-between text-gray-700 mb-2">
       <span>
        Subtotal
       </span>
                    <span>
        $1998
       </span>
                </div>
                <div class="flex justify-between text-gray-700 mb-4">
       <span>
        Tax (8%)
       </span>
                    <span>
        $159.84
       </span>
                </div>
                <hr class="border-gray-200 mb-4"/>
                <div class="flex justify-between font-semibold mb-6">
       <span>
        Total
       </span>
                    <span>
        $2157.84
       </span>
                </div>
                <button class="w-full bg-[#0057FF] text-white font-semibold py-2 rounded hover:bg-[#0046d1] transition text-base">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>
</main>
<!-- Footer -->
@include('client.footer')
</body>
</html>

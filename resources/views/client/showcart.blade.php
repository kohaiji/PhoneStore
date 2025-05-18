<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>
        PhoneStore - Cart DeTails
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-gray-900">
<!-- Navbar -->
<nav class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
    <div class="flex items-center space-x-2">
        <div class="bg-[#0a1f3f] p-2 rounded-sm">
            <img alt="PhoneStore logo icon with letter J on dark blue background" class="w-6 h-6" height="24" src="https://storage.googleapis.com/a1aa/image/b221a0ec-f660-49c9-4237-5ad994d32aec.jpg" width="24"/>
        </div>
        <span class="text-blue-600 font-extrabold text-lg select-none">
     PhoneStore
    </span>
    </div>
    <ul class="hidden md:flex space-x-8 text-xs font-semibold text-gray-700 tracking-wide">
        <li>
            <a class="hover:text-gray-900" href="#">
                HOME
            </a>
        </li>
        <li>
            <a class="hover:text-gray-900" href="#">
                PRODUCTS
            </a>
        </li>
        <li>
            <a class="hover:text-gray-900" href="#">
                ABOUT
            </a>
        </li>
        <li>
            <a class="hover:text-gray-900" href="#">
                SERVICES
            </a>
        </li>
        <li>
            <a class="hover:text-gray-900" href="#">
                NEWS
            </a>
        </li>
        <li>
            <a class="hover:text-gray-900" href="#">
                CONTACT
            </a>
        </li>
    </ul>
    <div class="hidden md:flex items-center space-x-4">
        <div class="flex items-center space-x-2 text-gray-700 text-sm font-normal">
            <i class="fas fa-phone-alt">
            </i>
            <span>
      +1 234 567 890
     </span>
        </div>
        <button class="bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-blue-700 transition">
            UserName
        </button>
    </div>
</nav>
<!-- Cart Page Content -->
<main class="max-w-7xl mx-auto px-6 py-16">
    <h1 class="text-2xl font-extrabold text-gray-900 mb-10 text-center">
        Your Shopping Cart
    </h1>
    <div style="text-align: left; margin: 10px 0 20px 20px;">
        <a href="#" style="color: red; text-decoration: underline; font-size: 16px; font-weight: 500; hover:text-red-800" onclick="removeAllItems()">Remove All</a>
    </div>

    <div class="flex flex-col md:flex-row md:space-x-12">
        <!-- Cart Items -->
        <div class="flex-1">
            <div class="space-y-6">
                <!-- Cart Item 1 -->
                <div class="flex items-center bg-white rounded-lg shadow-md p-6">
                    <img alt="Galaxy X Pro smartphone front view with colorful app icons on screen" class="w-24 h-24 rounded-md object-cover" src="https://storage.googleapis.com/a1aa/image/182606ba-9726-435e-1ea2-76e4d0f35ceb.jpg"/>
                    <div class="ml-6 flex-1">
                        <a class="text-blue-600 font-semibold text-lg hover:underline" href="#">
                            Galaxy X Pro
                        </a>
                        <p class="text-gray-600 text-sm mt-1">
                            Experience the power of the latest Galaxy X Pro with stunning display and fast performance.
                        </p>
                        <div class="flex items-center mt-4 space-x-6">
         <span class="font-extrabold text-gray-900 text-base">
          $899
         </span>
                            <div class="flex items-center space-x-2">
                                <label class="text-gray-700 font-semibold text-sm" for="qty1">
                                    Quanity:
                                </label>
                                <input class="w-16 border border-gray-300 rounded-md text-center text-sm focus:outline-none focus:ring-2 focus:ring-blue-600" id="qty1" min="1" type="number" value="1"/>
                            </div>
                            <button aria-label="Remove Galaxy X Pro from cart" class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Cart Item 2 -->
                <div class="flex items-center bg-white rounded-lg shadow-md p-6">
                    <img alt="iPhone Ultra smartphone front view on pink background" class="w-24 h-24 rounded-md object-cover" src="https://storage.googleapis.com/a1aa/image/e77c1fd1-76b4-4753-974b-77854b80e5b8.jpg"/>
                    <div class="ml-6 flex-1">
                        <a class="text-blue-600 font-semibold text-lg hover:underline" href="#">
                            iPhone Ultra
                        </a>
                        <p class="text-gray-600 text-sm mt-1">
                            The new iPhone Ultra offers incredible camera quality and smooth user experience.
                        </p>
                        <div class="flex items-center mt-4 space-x-6">
         <span class="font-extrabold text-gray-900 text-base">
          $1099
         </span>
                            <div class="flex items-center space-x-2">
                                <label class="text-gray-700 font-semibold text-sm" for="qty2">
                                    Quantity:
                                </label>
                                <input class="w-16 border border-gray-300 rounded-md text-center text-sm focus:outline-none focus:ring-2 focus:ring-blue-600" id="qty2" min="1" type="number" value="1"/>
                            </div>
                            <button aria-label="Remove iPhone Ultra from cart" class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Order Summary -->
        <aside class="mt-12 md:mt-0 md:w-96 bg-white rounded-lg shadow-md p-8">
            <h2 class="text-xl font-extrabold text-gray-900 mb-6">
                Order Summary
            </h2>
            <div class="flex justify-between text-gray-700 mb-4">
      <span>
       Subtotal
      </span>
                <span class="font-semibold">
       $1998
      </span>
            </div>
            <div class="flex justify-between text-gray-700 mb-4">
      <span>
       Tax (8%)
      </span>
                <span class="font-semibold">
       $159.84
      </span>
            </div>
            <div class="flex justify-between text-gray-900 font-extrabold text-lg border-t border-gray-300 pt-4 mb-8">
      <span>
       Total
      </span>
                <span>
       $2157.84
      </span>
            </div>
            <button class="w-full bg-blue-600 text-white text-sm font-semibold px-4 py-3 rounded-md hover:bg-blue-700 transition">
                Proceed to Checkout
            </button>
        </aside>
    </div>
</main>
</body>
</html>

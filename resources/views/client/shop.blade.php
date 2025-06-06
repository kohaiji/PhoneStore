<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>
        PhoneStore
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-white">
<!-- Header -->
@include('client.header')
<!-- Hero Blue Bar -->
<div class="bg-gradient-to-r from-[#3b82f6] to-[#60a5fa] h-30 mb-6 flex items-end">
    <h2 class="text-white font-bold text-3xl px-10 pb-4">
        Products
    </h2>
</div>
<!-- Search bar centered and bigger with button -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
    <div class="flex justify-center">
        <form class="flex w-full sm:w-3/4 md:w-1/2" style="margin-top: 40px">
            <input aria-label="Search products" class="flex-grow px-4 py-3 border border-gray-300 rounded-l text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search product..." type="search"/>
            <button class="bg-[#2563eb] text-white px-6 py-3 rounded-r text-sm font-semibold hover:bg-[#1e40af]" type="submit">
                Search
            </button>
        </form>
    </div>
</section>
<!-- Main content with sidebar on left and products on right -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 flex flex-col md:flex-row md:space-x-6">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 mb-10 md:mb-0 bg-white border border-gray-200 rounded-lg p-6 shadow-md flex flex-col">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900">
                Filter
            </h3>
            <a class="text-sm text-[#2563eb] hover:underline whitespace-nowrap" href="#">
                View All
            </a>
        </div>
        <!-- Price Filter -->
        <div class="mb-6">
            <label class="block text-sm font-semibold mb-2 text-gray-700" for="price-range">
                Price Range
            </label>
            <select class="w-full border border-gray-300 rounded px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-blue-500" id="price-range" name="price-range">
                <option value="">
                    Select Price
                </option>
                <option value="under-500">
                    Under $500
                </option>
                <option value="500-1000">
                    $500 - $1000
                </option>
                <option value="1000-1500">
                    $1000 - $1500
                </option>
                <option value="1500-plus">
                    $1500+
                </option>
            </select>
        </div>
        <!-- Brand Filter -->
        <div class="mb-6">
            <label class="block text-sm font-semibold mb-2 text-gray-700">
                Brand
            </label>
            <div class="flex flex-col space-y-2 text-xs text-gray-700">
                <label class="inline-flex items-center">
                    <input class="form-checkbox" type="checkbox" value="Samsung"/>
                    <span class="ml-2">
        Samsung
       </span>
                </label>
                <label class="inline-flex items-center">
                    <input class="form-checkbox" type="checkbox" value="Apple"/>
                    <span class="ml-2">
        Apple
       </span>
                </label>
                <label class="inline-flex items-center">
                    <input class="form-checkbox" type="checkbox" value="Redmi"/>
                    <span class="ml-2">
        Redmi
       </span>
                </label>
                <label class="inline-flex items-center">
                    <input class="form-checkbox" type="checkbox" value="OnePlus"/>
                    <span class="ml-2">
        OnePlus
       </span>
                </label>
            </div>
        </div>
        <!-- Other filters can be added similarly -->
        <button class="w-full bg-[#2563eb] text-white text-xs font-semibold py-2 rounded hover:bg-[#1e40af] mt-auto">
            Apply Filters
        </button>
    </aside>
    <!-- Products grid -->
    @foreach($products as $obj)
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img alt="Front view of Samsung Galaxy S20 smartphone with colorful app icons on screen and dark blue background" class="w-full object-contain bg-[#0a2a5a]" height="250" src="https://storage.googleapis.com/a1aa/image/6c2d3190-1201-417a-8c2b-f466ebfe60b3.jpg" width="250"/>
        <div class="p-4">
            <h3 class="text-[#2563eb] font-semibold text-sm mb-1">
                Samsung Galaxy S20
            </h3>
            <p class="text-gray-600 text-xs mb-4 leading-tight">
                The Samsung Galaxy S20 features a stunning display and powerful performance.
            </p>
            <div class="flex items-center justify-between">
       <span class="font-bold text-xs">
        $999
       </span>
                <button class="bg-[#2563eb] text-white text-xs font-semibold px-3 py-2 rounded hover:bg-[#1e40af]">
                    Buy Now
                </button>
            </div>
        </div>
    </div>
    @endforeach
</section>
<!-- Footer -->
@include('client.footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('cart_empty'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Giỏ hàng trống',
            text: '{{ session('cart_empty') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

</body>
</html>



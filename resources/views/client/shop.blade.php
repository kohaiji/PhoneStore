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
<div class="bg-gradient-to-r from-[#3b82f6] to-[#60a5fa] h-36 mb-6 flex items-end">
    <h2 class="text-white font-bold text-3xl px-10 pb-4">
        Our Products
    </h2>
</div>
<!-- Search bar below blue bar -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
    <div class="flex justify-end">
        <div class="flex items-center space-x-4 w-full sm:w-auto">
            <input aria-label="Search products" class="w-full sm:w-64 px-3 py-2 border border-gray-300 rounded text-xs focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Search product..." type="search"/>
            <a class="text-sm text-[#2563eb] hover:underline whitespace-nowrap" href="#">
                View All
            </a>
        </div>
    </div>
</section>
<!-- Products Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Product 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img alt="Front view of Galaxy X Pro smartphone with colorful app icons on screen" class="w-full object-contain" height="250" src="https://storage.googleapis.com/a1aa/image/e72cf40c-a28d-43e4-c773-8026180fb5a0.jpg" width="250"/>
            <div class="p-4">
                <h3 class="text-[#2563eb] font-semibold text-sm mb-1">
                    Galaxy X Pro
                </h3>
                <p class="text-gray-600 text-xs mb-4 leading-tight">
                    Experience the power of the latest Galaxy X Pro with stunning display and fast performance.
                </p>
                <div class="flex items-center justify-between">
       <span class="font-bold text-xs">
        $899
       </span>
                    <button class="bg-[#2563eb] text-white text-xs font-semibold px-3 py-2 rounded hover:bg-[#1e40af]">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
        <!-- Product 2 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img alt="Front view of iPhone Ultra smartphone with blue and purple wallpaper on screen" class="w-full object-contain bg-[#fef0f5]" height="250" src="https://storage.googleapis.com/a1aa/image/3b2443aa-377c-40b7-cdb8-2be60f2a9b51.jpg" width="250"/>
            <div class="p-4">
                <h3 class="text-[#2563eb] font-semibold text-sm mb-1">
                    iPhone Ultra
                </h3>
                <p class="text-gray-600 text-xs mb-4 leading-tight">
                    The new iPhone Ultra offers incredible camera quality and smooth user experience.
                </p>
                <div class="flex items-center justify-between">
       <span class="font-bold text-xs">
        $1099
       </span>
                    <button class="bg-[#2563eb] text-white text-xs font-semibold px-3 py-2 rounded hover:bg-[#1e40af]">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
        <!-- Product 3 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img alt="Front view of iPhone Ultra smartphone with blue and purple wallpaper on screen" class="w-full object-contain bg-[#fef0f5]" height="250" src="https://storage.googleapis.com/a1aa/image/3b2443aa-377c-40b7-cdb8-2be60f2a9b51.jpg" width="250"/>
            <div class="p-4">
                <h3 class="text-[#2563eb] font-semibold text-sm mb-1">
                    iPhone Ultra
                </h3>
                <p class="text-gray-600 text-xs mb-4 leading-tight">
                    The new iPhone Ultra offers incredible camera quality and smooth user experience.
                </p>
                <div class="flex items-center justify-between">
       <span class="font-bold text-xs">
        $1099
       </span>
                    <button class="bg-[#2563eb] text-white text-xs font-semibold px-3 py-2 rounded hover:bg-[#1e40af]">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
        <!-- Product 4 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img alt="Front view of iPhone Ultra smartphone with blue and purple wallpaper on screen" class="w-full object-contain bg-[#fef0f5]" height="250" src="https://storage.googleapis.com/a1aa/image/3b2443aa-377c-40b7-cdb8-2be60f2a9b51.jpg" width="250"/>
            <div class="p-4">
                <h3 class="text-[#2563eb] font-semibold text-sm mb-1">
                    iPhone Ultra
                </h3>
                <p class="text-gray-600 text-xs mb-4 leading-tight">
                    The new iPhone Ultra offers incredible camera quality and smooth user experience.
                </p>
                <div class="flex items-center justify-between">
       <span class="font-bold text-xs">
        $1099
       </span>
                    <button class="bg-[#2563eb] text-white text-xs font-semibold px-3 py-2 rounded hover:bg-[#1e40af]">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
        <!-- Product 5 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img alt="Front view of iPhone Ultra smartphone with blue and purple wallpaper on screen" class="w-full object-contain bg-[#fef0f5]" height="250" src="https://storage.googleapis.com/a1aa/image/3b2443aa-377c-40b7-cdb8-2be60f2a9b51.jpg" width="250"/>
            <div class="p-4">
                <h3 class="text-[#2563eb] font-semibold text-sm mb-1">
                    iPhone Ultra
                </h3>
                <p class="text-gray-600 text-xs mb-4 leading-tight">
                    The new iPhone Ultra offers incredible camera quality and smooth user experience.
                </p>
                <div class="flex items-center justify-between">
       <span class="font-bold text-xs">
        $1099
       </span>
                    <button class="bg-[#2563eb] text-white text-xs font-semibold px-3 py-2 rounded hover:bg-[#1e40af]">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
        <!-- Product 6 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img alt="Front view of iPhone Ultra smartphone with blue and purple wallpaper on screen" class="w-full object-contain bg-[#fef0f5]" height="250" src="https://storage.googleapis.com/a1aa/image/3b2443aa-377c-40b7-cdb8-2be60f2a9b51.jpg" width="250"/>
            <div class="p-4">
                <h3 class="text-[#2563eb] font-semibold text-sm mb-1">
                    iPhone Ultra
                </h3>
                <p class="text-gray-600 text-xs mb-4 leading-tight">
                    The new iPhone Ultra offers incredible camera quality and smooth user experience.
                </p>
                <div class="flex items-center justify-between">
       <span class="font-bold text-xs">
        $1099
       </span>
                    <button class="bg-[#2563eb] text-white text-xs font-semibold px-3 py-2 rounded hover:bg-[#1e40af]">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
        <!-- Product 7 -->
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
        <!-- Product 8 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img alt="Front view of red smartphone with colorful abstract wallpaper on screen" class="w-full object-contain" height="250" src="https://storage.googleapis.com/a1aa/image/d237103d-f683-4572-357d-a97d138bfe70.jpg" width="250"/>
            <div class="p-4">
                <h3 class="text-[#2563eb] font-semibold text-sm mb-1">
                    Red Smartphone
                </h3>
                <p class="text-gray-600 text-xs mb-4 leading-tight">
                    A vibrant red smartphone with excellent display and camera features.
                </p>
                <div class="flex items-center justify-between">
       <span class="font-bold text-xs">
        $799
       </span>
                    <button class="bg-[#2563eb] text-white text-xs font-semibold px-3 py-2 rounded hover:bg-[#1e40af]">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
@include('client.footer')
</body>
</html>



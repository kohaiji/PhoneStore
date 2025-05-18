<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>
        Product Details - PhoneStore
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
<body class="bg-[#f8fafc] text-[#1e293b]">
<!-- Header -->
<header class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
    <div class="container mx-auto flex items-center justify-between px-6 py-4 max-w-7xl">
        <a class="flex items-center space-x-2" href="#">
            <img alt="Company logo, stylized phone icon in blue and white" class="w-10 h-10" height="40" src="https://storage.googleapis.com/a1aa/image/3b8cf454-20ca-4227-3813-fb32e614492d.jpg" width="40"/>
            <span class="text-2xl font-bold text-blue-600">
      PhoneStore
     </span>
        </a>
        <nav class="hidden md:flex space-x-8 font-semibold text-gray-700 text-sm uppercase tracking-wide">
            <a class="hover:text-blue-600 transition" href="#">
                Home
            </a>
            <a class="hover:text-blue-600 transition" href="#products">
                Products
            </a>
            <a class="hover:text-blue-600 transition" href="#about">
                About
            </a>
            <a class="hover:text-blue-600 transition" href="#services">
                Services
            </a>
            <a class="hover:text-blue-600 transition" href="#news">
                News
            </a>
            <a class="hover:text-blue-600 transition" href="#contact">
                Contact
            </a>
        </nav>
        <div class="hidden md:flex items-center space-x-6">
            <a class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition" href="tel:+18001234567">
                <i class="fas fa-phone-alt">
                </i>
                <span>
       +1 234 567 890
      </span>
            </a>
            <a class="bg-blue-600 text-white px-5 py-2 rounded-md font-semibold hover:bg-blue-700 transition" href="#contact">
                Sign in
            </a>
            <a class="bg-green-600 text-white px-5 py-2 rounded-md font-semibold hover:bg-blue-700 transition" href="#contact">
                Sign up
            </a>
        </div>
        <button aria-label="Open menu" class="md:hidden text-gray-700 focus:outline-none" id="mobile-menu-button">
            <i class="fas fa-bars fa-lg">
            </i>
        </button>
    </div>
    <nav class="md:hidden bg-white shadow-md hidden flex-col space-y-4 px-6 py-6" id="mobile-menu">
        <a class="block font-semibold text-gray-700 hover:text-blue-600 transition uppercase tracking-wide text-sm" href="#">
            Home
        </a>
        <a class="block font-semibold text-gray-700 hover:text-blue-600 transition uppercase tracking-wide text-sm" href="#products">
            Products
        </a>
        <a class="block font-semibold text-gray-700 hover:text-blue-600 transition uppercase tracking-wide text-sm" href="#about">
            About
        </a>
        <a class="block font-semibold text-gray-700 hover:text-blue-600 transition uppercase tracking-wide text-sm" href="#services">
            Services
        </a>
        <a class="block font-semibold text-gray-700 hover:text-blue-600 transition uppercase tracking-wide text-sm" href="#news">
            News
        </a>
        <a class="block font-semibold text-gray-700 hover:text-blue-600 transition uppercase tracking-wide text-sm" href="#contact">
            Contact
        </a>
        <a class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 transition" href="tel:+18001234567">
            <i class="fas fa-phone-alt">
            </i>
            <span>
      +1 800 123 4567
     </span>
        </a>
        <a class="bg-blue-600 text-white px-5 py-2 rounded-md font-semibold hover:bg-blue-700 transition text-center" href="#contact">
            Order Now
        </a>
    </nav>
</header>
<!-- Hero background bar -->
<div class="w-full h-36 bg-gradient-to-r from-[#3B82F6] to-[#60A5FA]">
</div>
<!-- Product Detail Section -->
<section class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 -mt-20 pb-20 space-y-16">
    <div class="pt-24">
        <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col md:flex-row gap-10">
            <!-- Product Images -->
            <div class="md:w-1/2 flex flex-col space-y-4">
                <img alt="iPhone Ultra front view with colorful wallpaper on light pink background" class="rounded-lg shadow-md object-contain w-full max-h-[400px]" src="https://storage.googleapis.com/a1aa/image/ff408632-80d6-4813-a1d4-b56d3a80488d.jpg"/>
                <div class="flex space-x-4 overflow-x-auto">
                    <img alt="iPhone Ultra side view with white background" class="w-20 h-20 rounded-lg border border-gray-200 cursor-pointer object-contain hover:ring-2 hover:ring-[#2563EB]" height="200" src="https://storage.googleapis.com/a1aa/image/dc8b5180-9b22-4332-21ab-0aa7ccddf34a.jpg" width="200"/>
                    <img alt="iPhone Ultra back view with white background" class="w-20 h-20 rounded-lg border border-gray-200 cursor-pointer object-contain hover:ring-2 hover:ring-[#2563EB]" height="200" src="https://storage.googleapis.com/a1aa/image/31536188-2f94-4a6b-8ae7-e34cf014e079.jpg" width="200"/>
                    <img alt="iPhone Ultra angled view with white background" class="w-20 h-20 rounded-lg border border-gray-200 cursor-pointer object-contain hover:ring-2 hover:ring-[#2563EB]" height="200" src="https://storage.googleapis.com/a1aa/image/5fa47fae-41d5-48e4-80f7-34b5b97cb0b5.jpg" width="200"/>
                </div>
            </div>
            <!-- Product Info -->
            <div class="md:w-1/2 flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-extrabold text-[#2563EB] mb-4">
                        iPhone Ultra
                    </h1>
                    <p class="text-gray-700 text-base mb-6 leading-relaxed">
                        The new iPhone Ultra offers incredible camera quality and smooth user experience. Featuring a stunning OLED display, powerful A15 Bionic chip, and advanced dual-camera system, it is designed to deliver the best smartphone experience.
                    </p>
                    <ul class="text-gray-700 space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         6.7-inch OLED Super Retina XDR display
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         A15 Bionic chip with 6-core CPU
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Dual 12MP camera system with Night mode
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         5G capable for faster downloads and streaming
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Up to 20 hours video playback
        </span>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6">
      <span class="text-2xl font-extrabold text-gray-900 mb-4 sm:mb-0">
       $1099
      </span>
                    <button class="bg-[#2563EB] text-white text-sm font-semibold px-6 py-3 rounded-md hover:bg-[#1e4bb8] transition w-full sm:w-auto">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Reviews Section -->
    <section>
        <h2 class="text-2xl font-extrabold text-gray-900 mb-8">
            Customer Reviews
        </h2>
        <div class="space-y-8 max-w-4xl mx-auto">
            <!-- Review 1 -->
            <div class="border border-gray-200 rounded-lg p-6 shadow-sm">
                <div class="flex items-center mb-3">
                    <div class="flex space-x-1 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="ml-3 text-gray-700 font-semibold">
        by Sarah M.
       </span>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Amazing phone with stunning display and excellent camera quality. Battery life lasts all day even with heavy use. Highly recommend!
                </p>
            </div>
            <!-- Review 2 -->
            <div class="border border-gray-200 rounded-lg p-6 shadow-sm">
                <div class="flex items-center mb-3">
                    <div class="flex space-x-1 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <span class="ml-3 text-gray-700 font-semibold">
        by James L.
       </span>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Smooth performance and very user friendly. The camera is fantastic for photos and videos. Worth every penny.
                </p>
            </div>
            <!-- Review 3 -->
            <div class="border border-gray-200 rounded-lg p-6 shadow-sm">
                <div class="flex items-center mb-3">
                    <div class="flex space-x-1 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <span class="ml-3 text-gray-700 font-semibold">
        by Emily R.
       </span>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Great phone but battery could be better. Still, the display and camera make it a top choice.
                </p>
            </div>
        </div>
    </section>
    <!-- Related Products Section -->
    <section>
        <h2 class="text-2xl font-extrabold text-gray-900 mb-8">
            Related Products
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 max-w-7xl mx-auto">
            <!-- Related Product 1 -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
                <img alt="Galaxy X Pro smartphone front view with colorful app icons on screen" class="w-full h-60 object-contain rounded-md mb-4" height="240" src="https://storage.googleapis.com/a1aa/image/59121169-f4f7-4d05-ac0f-053aa6faf971.jpg" width="160"/>
                <a class="text-[#2563EB] font-semibold text-base mb-1 hover:underline" href="#">
                    Galaxy X Pro
                </a>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                    Experience the power of the latest Galaxy X Pro with stunning display and fast performance.
                </p>
                <div class="flex items-center justify-between mt-auto">
       <span class="font-extrabold text-gray-900 text-sm">
        $899
       </span>
                    <button class="bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-[#1e4bb8] transition">
                        Buy Now
                    </button>
                </div>
            </div>
            <!-- Related Product 2 -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
                <img alt="Pixel Nova smartphone front view with colorful app icons on blue background" class="w-full h-60 object-contain rounded-md mb-4" height="240" src="https://storage.googleapis.com/a1aa/image/92b37009-fe97-4de3-2006-c577e2e17a85.jpg" width="160"/>
                <a class="text-[#2563EB] font-semibold text-base mb-1 hover:underline" href="#">
                    Pixel Nova
                </a>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                    Pixel Nova delivers pure Android experience with excellent camera and battery life.
                </p>
                <div class="flex items-center justify-between mt-auto">
       <span class="font-extrabold text-gray-900 text-sm">
        $799
       </span>
                    <button class="bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-[#1e4bb8] transition">
                        Buy Now
                    </button>
                </div>
            </div>
            <!-- Related Product 3 -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
                <img alt="OnePlus Flash smartphone front view with vibrant orange and purple wallpaper" class="w-full h-60 object-contain rounded-md mb-4" height="240" src="https://storage.googleapis.com/a1aa/image/edc33ced-1231-454e-468b-0641b1e04e59.jpg" width="160"/>
                <a class="text-[#2563EB] font-semibold text-base mb-1 hover:underline" href="#">
                    OnePlus Flash
                </a>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                    OnePlus Flash offers blazing fast charging and smooth performance at a great price.
                </p>
                <div class="flex items-center justify-between mt-auto">
       <span class="font-extrabold text-gray-900 text-sm">
        $699
       </span>
                    <button class="bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-[#1e4bb8] transition">
                        Buy Now
                    </button>
                </div>
            </div>
            <!-- Related Product 4 -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
                <img alt="iPhone Ultra smartphone front view on light pink background" class="w-full h-60 object-contain rounded-md mb-4" height="240" src="https://storage.googleapis.com/a1aa/image/ff408632-80d6-4813-a1d4-b56d3a80488d.jpg" width="160"/>
                <a class="text-[#2563EB] font-semibold text-base mb-1 hover:underline" href="#">
                    iPhone Ultra
                </a>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                    The new iPhone Ultra offers incredible camera quality and smooth user experience.
                </p>
                <div class="flex items-center justify-between mt-auto">
       <span class="font-extrabold text-gray-900 text-sm">
        $1099
       </span>
                    <button class="bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-[#1e4bb8] transition">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
    </section>
</section>
<!-- Footer -->
<footer class="bg-blue-600 text-white py-10">
    <div class="container mx-auto px-6 max-w-7xl flex flex-col md:flex-row justify-between items-center">
        <p class="mb-4 md:mb-0">
            © 2024 PhoneStore. All rights reserved.
        </p>
        <div class="flex space-x-6 text-xl">
            <a aria-label="Facebook" class="hover:text-gray-300 transition" href="#">
                <i class="fab fa-facebook-f">
                </i>
            </a>
            <a aria-label="Twitter" class="hover:text-gray-300 transition" href="#">
                <i class="fab fa-twitter">
                </i>
            </a>
            <a aria-label="Instagram" class="hover:text-gray-300 transition" href="#">
                <i class="fab fa-instagram">
                </i>
            </a>
            <a aria-label="LinkedIn" class="hover:text-gray-300 transition" href="#">
                <i class="fab fa-linkedin-in">
                </i>
            </a>
        </div>
    </div>
</footer>

</body>
</html>

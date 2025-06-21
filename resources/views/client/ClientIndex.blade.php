<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>
        Phone Store
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: "Montserrat", sans-serif;
        }
    </style>
</head>
<body class="bg-white text-gray-800">
<!-- Header -->
@include('client.header')

<!-- Mobile menu container (hidden by default) -->
<nav id="mobile-menu" class="hidden fixed top-16 right-0 left-0 bg-white shadow-md border-t border-gray-200 z-50 md:hidden">
    <div class="flex flex-col px-6 py-4 space-y-4 font-semibold text-gray-700">
        <a href="ClientIndex" class="hover:text-blue-600 transition">Home</a>
        <a href="/shop" class="hover:text-blue-600 transition">Products</a>
        <a href="/ClientIndex/#about" class="hover:text-blue-600 transition">About</a>
        <a href="/ClientIndex/#services" class="hover:text-blue-600 transition">Services</a>
        <a href="/ClientIndex/#news" class="hover:text-blue-600 transition">News</a>
        <a href="/ClientIndex/#contact" class="hover:text-blue-600 transition">Contact</a>
        <a href="/cart" class="hover:text-blue-600 transition flex items-center">
            <i class="fas fa-shopping-cart mr-2"></i> Cart
        </a>
    </div>
</nav>

<!-- Hero Section -->
<section aria-label="Hero section with phone sales promotion" class="pt-24 bg-gradient-to-r from-blue-600 to-blue-400 text-white">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center md:space-x-12 py-20 max-w-7xl">
        <!-- Text Content -->
        <div class="md:w-1/2 text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                Latest Smartphones at Best Prices
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-xl mx-auto md:mx-0">
                Discover the newest models with amazing features and unbeatable deals.
            </p>
            <div class="flex flex-col sm:flex-row justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                <a class="bg-white text-blue-600 font-semibold px-8 py-3 rounded-md shadow-md hover:bg-gray-100 transition" href="/shop">
                    Shop Now
                </a>
                <a class="border border-white text-white font-semibold px-8 py-3 rounded-md hover:bg-white hover:text-blue-600 transition" href="#contact">
                    Contact Us
                </a>
            </div>
        </div>

        <!-- Slideshow with Fade Effect -->
        <div class="md:w-1/2 mt-12 md:mt-0">
            <div class="relative w-full max-w-md h-[400px] mx-auto overflow-hidden rounded-lg shadow-lg">
                <img id="slide-img-1"
                     class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-100"
                     src="https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-16-pro-max.png" alt="Slide 1"/>
                <img id="slide-img-2"
                     class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0"
                     src="https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/1/5/15_2_7_2_5.jpg" alt="Slide 2"/>
            </div>
        </div>
    </div>
</section>
<!-- Products Section -->
<section aria-label="Smartphone products available for sale" class="container mx-auto px-6 py-20 max-w-7xl" id="products">
    <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">
        Featured Products
    </h2>
    <div class="view-all-container" style="text-align: right; margin-top: -24px;margin-bottom: 20px; ">
        <a href="/shop" class="view-all-button" style="font-size: 1.125rem; font-weight: 600; color: #3b82f6; text-decoration: underline; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; transition: color 0.3s ease;">View All</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">
        @foreach($products as $obj)
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition flex flex-col">
                <a href="/product-details/{{$obj->id}}"><img alt="{{$obj->product_name}}" class="w-full h-full object-cover" height="300" src="{{ $obj->image_url ? '/image_product/' . $obj->image_url : 'https://storage.googleapis.com/a1aa/image/aa88dfbe-ab80-4fca-db94-141b7c08ed91.jpg' }}" width="400"/></a>
                <div class="p-6 flex flex-col flex-grow">
                    <a class="text-xl font-semibold mb-2 text-blue-600" href="/product-details/{{$obj->id}}">
                        {{$obj->product_name}}
                    </a>
                    <p class="text-gray-600 flex-grow">
                        {{$obj->description}}
                    </p>
                    <div class="mt-4 flex items-center justify-between">
       <span class="text-lg font-bold text-gray-900">
        {{ number_format($obj->price, 0, ',', ',') }}đ
       </span>
                        <a class="bg-blue-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-700 transition" href="/product-details/{{$obj->id}}">
                            Buy Now
                        </a>
                    </div>
                </div>
            </article>
        @endforeach

    </div>
</section>
<!-- About Section -->
<section aria-label="About the phone sales company" class="bg-gray-50 py-20" id="about">
    <div class="container mx-auto px-6 max-w-7xl flex flex-col md:flex-row items-center md:space-x-16">
        <div class="md:w-1/2 mb-12 md:mb-0">
            <img alt="Interior of a modern phone store with phones on display and customers browsing" class="rounded-lg shadow-lg mx-auto" height="400" src="https://storage.googleapis.com/a1aa/image/17989335-6fcc-4980-5ab0-fb06e361c30f.jpg" width="600"/>
        </div>
        <div class="md:w-1/2">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">
                About Us
            </h2>
            <p class="text-gray-700 mb-6 leading-relaxed">
                PhoneStore has been a trusted retailer of the latest smartphones and
                accessories for over 15 years. We pride ourselves on offering the
                best prices and excellent customer service.
            </p>
            <p class="text-gray-700 mb-6 leading-relaxed">
                Our knowledgeable staff is here to help you find the perfect phone
                to fit your needs and budget. Shop with confidence knowing you’re
                getting genuine products and reliable support.
            </p>
            <a class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-700 transition" href="#contact">
                Contact Us
            </a>
        </div>
    </div>
</section>
<!-- Services Section -->
<section aria-label="Services offered by the phone sales company" class="container mx-auto px-6 py-20 max-w-7xl" id="services">
    <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">
        Our Services
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center hover:shadow-xl transition">
            <img alt="Icon representing warranty service with shield and checkmark" class="mb-6" height="120" src="https://storage.googleapis.com/a1aa/image/a65c3e2d-aded-447d-9d57-e36e5f295a8d.jpg" width="120"/>
            <h3 class="text-xl font-semibold mb-2 text-blue-600">
                Warranty
            </h3>
            <p class="text-gray-600">
                All phones come with manufacturer warranty for peace of mind.
            </p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center hover:shadow-xl transition">
            <img alt="Icon representing phone repair service with wrench and smartphone" class="mb-6" height="120" src="https://storage.googleapis.com/a1aa/image/95e1f036-a449-4703-f3ae-babf12dce4c6.jpg" width="120"/>
            <h3 class="text-xl font-semibold mb-2 text-blue-600">
                Repair
            </h3>
            <p class="text-gray-600">
                Expert phone repair services for screen, battery, and more.
            </p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center hover:shadow-xl transition">
            <img alt="Icon representing phone accessories with headphones and charger" class="mb-6" height="120" src="https://storage.googleapis.com/a1aa/image/bdf5c50f-a64b-49ae-4a0c-6ca6aee9d6e2.jpg" width="120"/>
            <h3 class="text-xl font-semibold mb-2 text-blue-600">
                Accessories
            </h3>
            <p class="text-gray-600">
                Wide range of phone accessories including cases, chargers, and more.
            </p>
        </div>
    </div>
</section>
<!-- News Section -->
<section aria-label="Latest news and articles about phones and technology" class="bg-gray-50 py-20" id="news">
    <div class="container mx-auto px-6 max-w-7xl">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">
            News
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <img alt="Image showing a new smartphone launch event with stage and audience" class="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/a952fa81-da07-4549-26f4-baf4c8463bd2.jpg" width="600"/>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-blue-600">
                        New Phone Launch: Galaxy X Pro
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Discover the features and specs of the new Galaxy X Pro, now
                        available in our store.
                    </p>
                    <a class="text-blue-600 font-semibold hover:underline flex items-center" href="#">
                        Read More
                        <i class="fas fa-arrow-right ml-2">
                        </i>
                    </a>
                </div>
            </article>
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <img alt="Image of a person holding a smartphone with tips displayed on screen" class="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/4f2213ba-c07b-4628-0b38-4a8d34c2e214.jpg" width="600"/>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-blue-600">
                        Top 5 Tips to Extend Your Phone Battery Life
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Learn how to maximize your smartphone battery life with these
                        simple tips.
                    </p>
                    <a class="text-blue-600 font-semibold hover:underline flex items-center" href="#">
                        Read More
                        <i class="fas fa-arrow-right ml-2">
                        </i>
                    </a>
                </div>
            </article>
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <img alt="Image of a technician repairing a smartphone screen with tools" class="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/d8337116-c3a4-4588-2fca-8154b913762f.jpg" width="600"/>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-blue-600">
                        How to Choose a Reliable Phone Repair Service
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Tips on selecting trustworthy repair shops for your smartphone.
                    </p>
                    <a class="text-blue-600 font-semibold hover:underline flex items-center" href="#">
                        Read More
                        <i class="fas fa-arrow-right ml-2">
                        </i>
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>
<!-- Contact Section -->
<section aria-label="Contact form and company contact information" class="container mx-auto px-6 py-20 max-w-4xl" id="contact">
    <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">
        Contact Us
    </h2>
    <div class="bg-white rounded-lg shadow-md p-8">
        <form action="#" aria-label="Contact form to order or ask questions" class="space-y-6" method="POST">
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="name">
                    Full Name
                </label>
                <input class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-600" id="name" name="name" placeholder="Your full name" required="" type="text"/>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="email">
                    Email Address
                </label>
                <input class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-600" id="email" name="email" placeholder="you@example.com" required="" type="email"/>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="phone">
                    Phone Number
                </label>
                <input class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-600" id="phone" name="phone" placeholder="+1 800 123 4567" type="tel"/>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="message">
                    Message
                </label>
                <textarea class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-600" id="message" name="message" placeholder="Write your message here" required="" rows="4"></textarea>
            </div>
            <button class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-md hover:bg-blue-700 transition w-full" type="submit">
                Send Message
            </button>
        </form>
        <div class="mt-10 text-center text-gray-700 space-y-2">
            <p>
                <i class="fas fa-map-marker-alt mr-2 text-blue-600">
                </i>
                A17, No. 17 Ta Quang Buu
            </p>
            <p>
                <i class="fas fa-phone-alt mr-2 text-blue-600">
                </i>
                <a class="hover:underline" href="tel:+18001234567">
                    +84 904577324
                </a>
            </p>
            <p>
                <i class="fas fa-envelope mr-2 text-blue-600">
                </i>
                <a class="hover:underline" href="mailto:ntg1611@gmail.com">
                    ntg1611@gmail.com
                </a>
            </p>
        </div>
    </div>
</section>
<!-- Footer -->
@include('client.footer')
<script>
    // Toggle mobile menu visibility
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener("click", () => {
                mobileMenu.classList.toggle("hidden");
            });
        }
    });
</script>
<script>
    const images = [
        "https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-14_1.png",
        "https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-16-plus-1.png",
        "https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-16-pro_2.png"
    ];

    let currentIndex = 0;
    let isFirst = true;

    const img1 = document.getElementById('slide-img-1');
    const img2 = document.getElementById('slide-img-2');

    setInterval(() => {
        const nextIndex = (currentIndex + 1) % images.length;

        if (isFirst) {
            img2.src = images[nextIndex];
            img1.classList.replace('opacity-100', 'opacity-0');
            img2.classList.replace('opacity-0', 'opacity-100');
        } else {
            img1.src = images[nextIndex];
            img2.classList.replace('opacity-100', 'opacity-0');
            img1.classList.replace('opacity-0', 'opacity-100');
        }

        currentIndex = nextIndex;
        isFirst = !isFirst;
    }, 1500);
</script>
</body>
</html>

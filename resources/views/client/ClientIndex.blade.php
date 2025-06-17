<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>
        Phone Store
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
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
<!-- Hero Section -->
<section aria-label="Hero section with phone sales promotion" class="pt-24 bg-gradient-to-r from-blue-600 to-blue-400 text-white">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center md:space-x-12 py-20 max-w-7xl">
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
        <!-- Image Slide -->
        <div class="md:w-1/2 mt-12 md:mt-0">
            <div class="relative w-full h-[400px] flex items-center justify-center">
                <img id="hero-slider-img"
                     class="rounded-lg shadow-lg w-auto h-full object-contain transition-opacity duration-1000"
                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYFGd1bdiiJ40K6aVWpBTb0rk0OhAxbYRnfg&s"
                     alt="iPhone slide" />
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
                123 Phone St,
                Tech City, USA
            </p>
            <p>
                <i class="fas fa-phone-alt mr-2 text-blue-600">
                </i>
                <a class="hover:underline" href="tel:+18001234567">
                    +1 800 123 4567
                </a>
            </p>
            <p>
                <i class="fas fa-envelope mr-2 text-blue-600">
                </i>
                <a class="hover:underline" href="mailto:info@phonestore.com">
                    info@phonestore.com
                </a>
            </p>
        </div>
    </div>
</section>
<!-- Footer -->
    @include('client.footer')
<script>
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");

    mobileMenuButton.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
    });
</script>
<script>
    const sliderImages = [
        "data:image/jpeg;base64,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", // iPhone 11
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPzmuvaV2HUGzCIKMnZu-brB_AfhcpfJ7a5g&s",
        "data:image/jpeg;base64,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"  // iPhone 13
    ];

    let current = 0;
    const slider = document.getElementById('hero-slider-img');

    setInterval(() => {
        current = (current + 1) % sliderImages.length;
        slider.src = sliderImages[current];
    }, 3000);
</script>
</body>
</html>

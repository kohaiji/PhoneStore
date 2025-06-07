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
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-gray-700 flex flex-col min-h-screen">
<!-- Header -->
@include('client.header')
<!-- Hero Blue Bar -->
<div class="bg-gradient-to-r from-[#3b82f6] to-[#60a5fa] h-36 mb-6 flex items-end" style="margin-top: 50px;">
    <h1 class="text-white font-bold text-3xl px-10 pb-4 text-center" >
        Products
    </h1>
</div>
<!-- Search bar -->
<section class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 mb-10">
    <div class="flex justify-center">
        <form class="flex w-full max-w-6xl" style="margin-top: 40px">
            <input
                aria-label="Search products"
                class="flex-grow px-4 py-3 border border-gray-300 rounded-l text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Search product..."
                type="search"
                style="width: 800px"
            />
            <button
                class="bg-[#2563eb] text-white px-6 py-3 rounded-r text-sm font-semibold hover:bg-[#1e40af]"
                type="submit"
            >
                Search
            </button>
        </form>
    </div>
</section>
<!-- Main content -->
<main class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 mt-10 flex max-w-7xl gap-6">
    <!-- Filter box -->
    <aside
        class="w-72 border border-gray-200 rounded-md p-6 text-xs text-gray-700 font-normal sticky top-20 self-start"
        style="min-height: calc(100vh - 6rem)"
    >
        <div class="flex justify-between items-center mb-3">
            <span class="font-semibold text-sm">Filter</span>
            <a class="text-xs text-[#3B8BFF] hover:underline" href="#">View All</a>
        </div>
        <div class="mb-3">
            <label class="block font-semibold text-xs mb-1">Price Range</label>
            <select
                class="w-full border border-gray-300 rounded text-xs text-gray-700 px-2 py-1"
            >
                <option>Select Price</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-xs mb-1">Brand</label>
            <div class="space-y-1 text-xs text-gray-600 font-normal">
                <label class="flex items-center space-x-2">
                    <input class="form-checkbox" type="checkbox" />
                    <span>Samsung</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input class="form-checkbox" type="checkbox" />
                    <span>Apple</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input class="form-checkbox" type="checkbox" />
                    <span>Redmi</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input class="form-checkbox" type="checkbox" />
                    <span>OnePlus</span>
                </label>
            </div>
        </div>
        <button
            class="w-full bg-[#3B8BFF] text-white text-xs font-semibold py-2 rounded hover:bg-[#2a6ad1] focus:outline-none focus:ring-2 focus:ring-[#3B8BFF]"
        >
            Apply Filters
        </button>
    </aside>
    <!-- Products grid -->
    <section
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 flex-grow"
    >
        @foreach ($products as $obj)
            <article
                class="border border-gray-200 rounded-md overflow-hidden flex flex-col max-w-[240px]"
            >
                <a href="/product-details/{{$obj->id}}">
                    <img
                        alt="{{$obj->product_name}}"
                        class="w-full h-full object-cover"
                        height="224"
                        src="{{ $obj->image_url ? '/image_product/' . $obj->image_url : 'https://storage.googleapis.com/a1aa/image/aa88dfbe-ab80-4fca-db94-141b7c08ed91.jpg' }}"
                        width="240"
                    />
                </a>
                <div class="p-5 flex flex-col flex-grow">
                    <a
                        class="text-lg font-semibold mb-2 text-blue-600"
                        href="/product-details/{{$obj->id}}"
                    >
                        {{$obj->product_name}}
                    </a>
                    <p class="text-gray-600 flex-grow text-xs leading-tight">
                        {{$obj->description}}
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-base font-bold text-gray-900">
                            {{ number_format($obj->price, 0, ',', ',') }}đ
                        </span>
                        <a
                            class="bg-blue-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-700 transition text-xs"
                            href="/product-details/{{$obj->id}}"
                        >
                            Buy Now
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
        {{$products->links('pagination::tailwind')}}
    </section>
</main>
<!-- Footer -->
@include('client.footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('cart_empty'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Cart is empty!',
            text: '{{ session('cart_empty') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

</body>
</html>



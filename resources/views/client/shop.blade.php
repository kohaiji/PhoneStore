<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>
        PhoneStore
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        h1.products-title {
            font-family: 'Roboto Slab', serif;
            font-weight: 700;
            font-size: 3.5rem; /* slightly larger */
            letter-spacing: 0.05em;
            text-transform: uppercase;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.15);
            color: #f3f4f6; /* lighter white for subtlety */
        }
        nav[role="navigation"] ul {
            display: flex;
            gap: 0.25rem;
            flex-wrap: wrap;
            justify-content: center;
            padding-left: 0;
            list-style: none;
            font-size: 1.125rem; /* increased font size for pagination */
            font-weight: 600;
        }
        nav[role="navigation"] ul li span,
        nav[role="navigation"] ul li a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 2.5rem;
            height: 2.5rem;
            padding: 0 0.75rem;
            font-size: 1.125rem;
            font-weight: 600;
            border-radius: 0.375rem;
            border: 1px solid #d1d5db; /* gray-300 */
            color: #374151; /* gray-700 */
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.2s, border-color 0.2s;
        }
        nav[role="navigation"] ul li span[aria-current="page"] {
            background-color: #2563eb; /* blue-600 */
            color: white;
            border-color: #2563eb;
            cursor: default;
        }
        nav[role="navigation"] ul li a:hover {
            background-color: #2563eb; /* blue-600 */
            color: white;
            border-color: #2563eb;
        }
        nav[role="navigation"] ul li:first-child a,
        nav[role="navigation"] ul li:last-child a {
            font-weight: 700;
            font-size: 1.25rem;
            padding: 0 1rem;
        }
        main {
            margin-bottom: 6rem; /* add margin between content body and footer */
        }
    </style>
</head>
<body class="bg-white text-gray-700 flex flex-col min-h-screen">
<!-- Header -->
@include('client.header')

<div class="bg-gradient-to-r from-[#3b82f6] to-[#60a5fa] h-36 mb-6 flex items-end" style="margin-top: 50px;">
    <h1 class="products-title px-10 pb-4 text-center w-full">
        Products
    </h1>
</div>
<!-- Search bar -->
<section class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 mb-10">
    <div class="flex justify-center">
        <form action="{{ route('shop') }}" method="GET" class="flex w-full max-w-6xl" style="margin-top: 40px">
            <input
                name="search"
                aria-label="Search products"
                class="flex-grow px-4 py-3 border border-gray-300 rounded-l text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Search By Product Name..."
                type="search"
                style="width: 800px"
                value="{{ request('search') }}"
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
<main class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 mt-10 max-w-7xl">
    <div class="grid grid-cols-12 gap-x-12 min-h-[calc(100vh-6rem)]">
        <!-- Filter Sidebar -->
        <aside class="col-span-12 md:col-span-3 border border-gray-200 rounded-md p-6 text-xs text-gray-700 font-normal sticky top-20 self-start"
               style="min-height: calc(100vh - 6rem); width: 280px;">
            <form action="{{ route('shop') }}" method="GET">
                <input type="hidden" name="search" value="{{ request('search') }}">

                <div class="flex justify-between items-center mb-3">
                    <span class="font-semibold text-sm">Filter</span>
                    <a class="text-xs text-[#3B8BFF] hover:underline" href="{{ route('shop') }}">Reset</a>
                </div>

                <!-- Sắp xếp giá -->
                <div class="mb-3">
                    <label class="block font-semibold text-xs mb-1">Sort by Price</label>
                    <select name="sort_price" class="w-full border border-gray-300 rounded text-xs text-gray-700 px-2 py-1">
                        <option value="">Select Price Order</option>
                        <option value="asc" {{ request('sort_price') == 'asc' ? 'selected' : '' }}>Low to High</option>
                        <option value="desc" {{ request('sort_price') == 'desc' ? 'selected' : '' }}>High to Low</option>
                    </select>
                </div>

                <!-- Brand -->
                <div class="mb-4">
                    <label class="block font-semibold text-xs mb-1">Brand</label>
                    <div class="space-y-1 text-xs text-gray-600 font-normal">
                        @foreach($brands as $brand)
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                                    {{ in_array($brand->id, (array)request('brands')) ? 'checked' : '' }}>
                                <span>{{ $brand->brand_name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Screen Size -->
                <div class="mb-4">
                    <label class="block font-semibold text-xs mb-1">Screen Size</label>
                    <div class="space-y-1 text-xs text-gray-600 font-normal">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="screen_size_group[]" value="under6" {{ in_array('under6', (array)request('screen_size_group')) ? 'checked' : '' }}>
                            <span>Under 6 inches</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="screen_size_group[]" value="above6" {{ in_array('above6', (array)request('screen_size_group')) ? 'checked' : '' }}>
                            <span>Above 6 inches</span>
                        </label>
                    </div>
                </div>

                <!-- Refresh Rate -->
                <div class="mb-4">
                    <label class="block font-semibold text-xs mb-1">Refresh Rate</label>
                    <div class="space-y-1 text-xs text-gray-600 font-normal">
                        @foreach($refresh_rates as $rate)
                            @if(!is_null($rate->refresh_rate))
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="refresh_rates[]" value="{{ $rate->refresh_rate }}"
                                        {{ in_array($rate->refresh_rate, (array)request('refresh_rates')) ? 'checked' : '' }}>
                                    <span>{{ $rate->refresh_rate }}</span>
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- RAM -->
                <div class="mb-4">
                    <label class="block font-semibold text-xs mb-1">RAM</label>
                    <div class="space-y-1 text-xs text-gray-600 font-normal">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="ram_group[]" value="under4" {{ in_array('under4', (array)request('ram_group')) ? 'checked' : '' }}>
                            <span>Under 4GB</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="ram_group[]" value="4to6" {{ in_array('4to6', (array)request('ram_group')) ? 'checked' : '' }}>
                            <span>4GB - 6GB</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="ram_group[]" value="8to12" {{ in_array('8to12', (array)request('ram_group')) ? 'checked' : '' }}>
                            <span>8GB - 12GB</span>
                        </label>
                    </div>
                </div>

                <button
                    type="submit"
                    class="w-full bg-[#3B8BFF] text-white text-xs font-semibold py-2 rounded hover:bg-[#2a6ad1] focus:outline-none focus:ring-2 focus:ring-[#3B8BFF]"
                >
                    Apply Filters
                </button>
            </form>
        </aside>
        <!-- Products-->
        <section id="product-container"
            class="col-span-12 md:col-span-9 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-x-14 gap-y-14"
            style="min-height: calc(100vh - 6rem);"
        >
            @if($products->count() == 0)
                <div class="col-span-full flex justify-center items-center text-gray-500 text-lg font-semibold" style="height: calc(100vh - 6rem);">
                    No products found.
                </div>
            @else
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
            @endif
                <div class="col-span-full flex justify-center mt-6">
                    @if(count($allProducts) > $perPage)
                        <button
                            id="loadMoreBtn"
                            class="bg-blue-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-700 transition"
                            data-per-page="{{ $perPage }}"
                        >
                            See more
                        </button>
                    @endif
                </div>
        </section>
    </div>
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

<script>
    // Lấy dữ liệu sản phẩm từ PHP
    const allProducts = @json($allProducts);
    let perPage = parseInt(document.getElementById('loadMoreBtn')?.dataset.perPage || 12);
    let currentIndex = perPage;

    document.getElementById('loadMoreBtn')?.addEventListener('click', () => {
        const productContainer = document.getElementById('product-container');
        const productsToShow = allProducts.slice(currentIndex, currentIndex + perPage);

        productsToShow.forEach(obj => {
            const article = document.createElement('article');
            article.className = "border border-gray-200 rounded-md overflow-hidden flex flex-col max-w-[240px]";
            article.innerHTML = `
                <a href="/product-details/${obj.id}">
                    <img alt="${obj.product_name}" class="w-full h-full object-cover" src="${obj.image_url ? '/image_product/' + obj.image_url : 'https://storage.googleapis.com/a1aa/image/aa88dfbe-ab80-4fca-db94-141b7c08ed91.jpg'}" width="240" height="224" />
                </a>
                <div class="p-5 flex flex-col flex-grow">
                    <a class="text-lg font-semibold mb-2 text-blue-600" href="/product-details/${obj.id}">
                        ${obj.product_name}
                    </a>
                    <p class="text-gray-600 flex-grow text-xs leading-tight">
                        ${obj.description}
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-base font-bold text-gray-900">
                            ${new Intl.NumberFormat('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(Number(obj.price))}đ
                        </span>
                        <a class="bg-blue-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-700 transition text-xs" href="/product-details/${obj.id}">
                            Buy Now
                        </a>
                    </div>
                </div>
            `;
            productContainer.appendChild(article);
        });

        currentIndex += perPage;

        if (currentIndex >= allProducts.length) {
            document.getElementById('loadMoreBtn').style.display = 'none';
        }
    });
</script>
</body>
</html>

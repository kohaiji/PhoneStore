<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>PhoneStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        'primary-dark': '#1e40af',
                        secondary: '#3b82f6',
                        accent: '#f97316',
                        dark: '#1f2937',
                        light: '#f9fafb'
                    },
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                        slab: ['Roboto Slab', 'serif']
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        .page-title {
            font-family: 'Roboto Slab', serif;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .filter-section {
            transition: all 0.3s ease;
        }
        .filter-section .filter-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        .filter-section.active .filter-content {
            max-height: 1000px; /* Tăng chiều cao tối đa */
        }
        .filter-scroll-container {
            max-height: 300px; /* Giới hạn chiều cao cho nội dung */
            overflow-y: auto;   /* Luôn hiển thị thanh cuộn khi cần */
            padding-right: 8px; /* Tạo khoảng trống cho thanh cuộn */
        }
        .product-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .price-tag {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }
        .sticky-filter {
            position: -webkit-sticky;
            position: sticky;
            top: 1rem;
        }
        /* Tùy chỉnh thanh cuộn cho đẹp mắt */
        .filter-scroll-container::-webkit-scrollbar {
            width: 6px;
        }
        .filter-scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .filter-scroll-container::-webkit-scrollbar-thumb {
            background: #c5c5c5;
            border-radius: 10px;
        }
        .filter-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-700 flex flex-col min-h-screen">
<!-- Header -->
@include('client.header')

<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-secondary h-44 md:h-52 flex items-end mb-8">
    <div class="container mx-auto px-4">
        <h1 class="page-title text-3xl md:text-4xl lg:text-5xl text-white px-4 pb-6 text-center w-full">
            Products
        </h1>
    </div>
</div>

<!-- Search bar -->
<section class="container mx-auto px-4 mb-10">
    <div class="max-w-4xl mx-auto">
        <form action="{{ route('shop') }}" method="GET" class="flex flex-col sm:flex-row gap-3 w-full">
            <div class="relative flex-grow">
                <input
                    name="search"
                    aria-label="Search products"
                    class="w-full px-5 py-4 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary focus:border-transparent transition text-base shadow-sm"
                    placeholder="Search by product name, brand or feature..."
                    type="search"
                    value="{{ request('search') }}"
                />
{{--                <button--}}
{{--                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary transition"--}}
{{--                    type="submit"--}}
{{--                >--}}
{{--                    <i class="fas fa-search"></i>--}}
{{--                </button>--}}
            </div>
            <button
                class="bg-primary hover:bg-primary-dark text-white px-6 py-4 rounded-lg font-semibold transition text-base shadow-md flex items-center justify-center gap-2"
                type="submit"
            >
                <i class="fas fa-search"></i> Search
            </button>
        </form>
    </div>
</section>

<!-- Main content -->
<main class="container mx-auto px-4 flex-grow mb-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Mobile filter button -->
        <div class="lg:hidden flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Products</h2>
            <button id="mobileFilterButton" class="bg-white border border-gray-300 rounded-lg px-4 py-2 font-medium flex items-center gap-2 shadow-sm">
                <i class="fas fa-filter"></i> Filters
            </button>
        </div>

        <!-- Filter Sidebar -->
        <aside class="hidden lg:block w-full lg:w-80 xl:w-96 bg-white rounded-xl p-6 shadow-md sticky-filter">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-800">Filters</h3>
                <a class="text-sm text-primary hover:underline" href="{{ route('shop') }}">
                    Reset All
                </a>
            </div>

            <form action="{{ route('shop') }}" method="GET" class="space-y-6">
                <input type="hidden" name="search" value="{{ request('search') }}">

                <!-- Sort by Price -->
                <div class="filter-section">
                    <h4 class="text-base font-semibold mb-3 cursor-pointer flex justify-between items-center">
                        <span>Sort by Price</span>
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </h4>
                    <div class="filter-content pl-1">
                        <select name="sort_price" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-gray-700 focus:ring-primary focus:border-transparent">
                            <option value="">Default Order</option>
                            <option value="asc" {{ request('sort_price') == 'asc' ? 'selected' : '' }}>Low to High</option>
                            <option value="desc" {{ request('sort_price') == 'desc' ? 'selected' : '' }}>High to Low</option>
                        </select>
                    </div>
                </div>

                <!-- Brand -->
                <div class="filter-section">
                    <h4 class="text-base font-semibold mb-3 cursor-pointer flex justify-between items-center">
                        <span>Brand</span>
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </h4>
                    <div class="filter-content pl-1">
                        <div class="filter-scroll-container"> <!-- Thêm container này -->
                            @foreach($brands as $brand)
                                <label class="flex items-center gap-3 py-1.5">
                                    <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                                           {{ in_array($brand->id, (array)request('brands')) ? 'checked' : '' }}
                                           class="rounded text-primary focus:ring-primary">
                                    <span class="text-gray-600">{{ $brand->brand_name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Screen Size -->
                <div class="filter-section">
                    <h4 class="text-base font-semibold mb-3 cursor-pointer flex justify-between items-center">
                        <span>Screen Size</span>
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </h4>
                    <div class="filter-content pl-1">
                        <div class="filter-scroll-container"> <!-- Thêm container này -->
                            <label class="flex items-center gap-3 py-1.5">
                                <input type="checkbox" name="screen_size_group[]" value="under6"
                                       {{ in_array('under6', (array)request('screen_size_group')) ? 'checked' : '' }}
                                       class="rounded text-primary focus:ring-primary">
                                <span class="text-gray-600">Under 6 inches</span>
                            </label>
                            <label class="flex items-center gap-3 py-1.5">
                                <input type="checkbox" name="screen_size_group[]" value="above6"
                                       {{ in_array('above6', (array)request('screen_size_group')) ? 'checked' : '' }}
                                       class="rounded text-primary focus:ring-primary">
                                <span class="text-gray-600">Above 6 inches</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Refresh Rate -->
                <div class="filter-section">
                    <h4 class="text-base font-semibold mb-3 cursor-pointer flex justify-between items-center">
                        <span>Refresh Rate</span>
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </h4>
                    <div class="filter-content pl-1">
                        <div class="filter-scroll-container"> <!-- Thêm container này -->
                            @foreach($refresh_rates as $rate)
                                @if(!is_null($rate->refresh_rate))
                                    <label class="flex items-center gap-3 py-1.5">
                                        <input type="checkbox" name="refresh_rates[]" value="{{ $rate->refresh_rate }}"
                                               {{ in_array($rate->refresh_rate, (array)request('refresh_rates')) ? 'checked' : '' }}
                                               class="rounded text-primary focus:ring-primary">
                                        <span class="text-gray-600">{{ $rate->refresh_rate }} Hz</span>
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- RAM -->
                <div class="filter-section">
                    <h4 class="text-base font-semibold mb-3 cursor-pointer flex justify-between items-center">
                        <span>RAM</span>
                        <i class="fas fa-chevron-down text-gray-400"></i>
                    </h4>
                    <div class="filter-content pl-1">
                        <div class="filter-scroll-container"> <!-- Thêm container này -->
                            <label class="flex items-center gap-3 py-1.5">
                                <input type="checkbox" name="ram_group[]" value="under4"
                                       {{ in_array('under4', (array)request('ram_group')) ? 'checked' : '' }}
                                       class="rounded text-primary focus:ring-primary">
                                <span class="text-gray-600">Under 4GB</span>
                            </label>
                            <label class="flex items-center gap-3 py-1.5">
                                <input type="checkbox" name="ram_group[]" value="4to6"
                                       {{ in_array('4to6', (array)request('ram_group')) ? 'checked' : '' }}
                                       class="rounded text-primary focus:ring-primary">
                                <span class="text-gray-600">4GB - 6GB</span>
                            </label>
                            <label class="flex items-center gap-3 py-1.5">
                                <input type="checkbox" name="ram_group[]" value="8to12"
                                       {{ in_array('8to12', (array)request('ram_group')) ? 'checked' : '' }}
                                       class="rounded text-primary focus:ring-primary">
                                <span class="text-gray-600">8GB - 12GB</span>
                            </label>
                        </div>
                    </div>
                </div>

                <button
                    type="submit"
                    class="w-full bg-primary hover:bg-primary-dark text-white font-semibold py-3 rounded-lg transition shadow-md mt-4"
                >
                    Apply Filters
                </button>
            </form>
        </aside>

        <!-- Mobile Filter Modal -->
        <div id="mobileFilterModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
            <div class="fixed inset-y-0 left-0 w-80 bg-white p-6 overflow-y-auto">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Filters</h3>
                    <button id="closeMobileFilter" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <form action="{{ route('shop') }}" method="GET" class="space-y-6">
                    <input type="hidden" name="search" value="{{ request('search') }}">

                    <!-- Sort by Price -->
                    <div class="filter-section">
                        <h4 class="text-base font-semibold mb-3 cursor-pointer flex justify-between items-center">
                            <span>Sort by Price</span>
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </h4>
                        <div class="filter-content pl-1">
                            <select name="sort_price" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-gray-700 focus:ring-primary focus:border-transparent">
                                <option value="">Default Order</option>
                                <option value="asc" {{ request('sort_price') == 'asc' ? 'selected' : '' }}>Low to High</option>
                                <option value="desc" {{ request('sort_price') == 'desc' ? 'selected' : '' }}>High to Low</option>
                            </select>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="filter-section">
                        <h4 class="text-base font-semibold mb-3 cursor-pointer flex justify-between items-center">
                            <span>Brand</span>
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </h4>
                        <div class="filter-content pl-1">
                            <div class="filter-scroll-container"> <!-- Thêm container này -->
                                @foreach($brands as $brand)
                                    <label class="flex items-center gap-3 py-1.5">
                                        <input type="checkbox" name="brands[]" value="{{ $brand->id }}"
                                               {{ in_array($brand->id, (array)request('brands')) ? 'checked' : '' }}
                                               class="rounded text-primary focus:ring-primary">
                                        <span class="text-gray-600">{{ $brand->brand_name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Screen Size -->
                    <div class="filter-section">
                        <h4 class="text-base font-semibold mb-3 cursor-pointer flex justify-between items-center">
                            <span>Screen Size</span>
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </h4>
                        <div class="filter-content pl-1">
                            <div class="filter-scroll-container"> <!-- Thêm container này -->
                                <label class="flex items-center gap-3 py-1.5">
                                    <input type="checkbox" name="screen_size_group[]" value="under6"
                                           {{ in_array('under6', (array)request('screen_size_group')) ? 'checked' : '' }}
                                           class="rounded text-primary focus:ring-primary">
                                    <span class="text-gray-600">Under 6 inches</span>
                                </label>
                                <label class="flex items-center gap-3 py-1.5">
                                    <input type="checkbox" name="screen_size_group[]" value="above6"
                                           {{ in_array('above6', (array)request('screen_size_group')) ? 'checked' : '' }}
                                           class="rounded text-primary focus:ring-primary">
                                    <span class="text-gray-600">Above 6 inches</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Refresh Rate -->
                    <div class="filter-section">
                        <h4 class="text-base font-semibold mb-3 cursor-pointer flex justify-between items-center">
                            <span>Refresh Rate</span>
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </h4>
                        <div class="filter-content pl-1">
                            <div class="filter-scroll-container"> <!-- Thêm container này -->
                                @foreach($refresh_rates as $rate)
                                    @if(!is_null($rate->refresh_rate))
                                        <label class="flex items-center gap-3 py-1.5">
                                            <input type="checkbox" name="refresh_rates[]" value="{{ $rate->refresh_rate }}"
                                                   {{ in_array($rate->refresh_rate, (array)request('refresh_rates')) ? 'checked' : '' }}
                                                   class="rounded text-primary focus:ring-primary">
                                            <span class="text-gray-600">{{ $rate->refresh_rate }} Hz</span>
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- RAM -->
                    <div class="filter-section">
                        <h4 class="text-base font-semibold mb-3 cursor-pointer flex justify-between items-center">
                            <span>RAM</span>
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </h4>
                        <div class="filter-content pl-1">
                            <div class="filter-scroll-container"> <!-- Thêm container này -->
                                <label class="flex items-center gap-3 py-1.5">
                                    <input type="checkbox" name="ram_group[]" value="under4"
                                           {{ in_array('under4', (array)request('ram_group')) ? 'checked' : '' }}
                                           class="rounded text-primary focus:ring-primary">
                                    <span class="text-gray-600">Under 4GB</span>
                                </label>
                                <label class="flex items-center gap-3 py-1.5">
                                    <input type="checkbox" name="ram_group[]" value="4to6"
                                           {{ in_array('4to6', (array)request('ram_group')) ? 'checked' : '' }}
                                           class="rounded text-primary focus:ring-primary">
                                    <span class="text-gray-600">4GB - 6GB</span>
                                </label>
                                <label class="flex items-center gap-3 py-1.5">
                                    <input type="checkbox" name="ram_group[]" value="8to12"
                                           {{ in_array('8to12', (array)request('ram_group')) ? 'checked' : '' }}
                                           class="rounded text-primary focus:ring-primary">
                                    <span class="text-gray-600">8GB - 12GB</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-3 mt-8">
                        <button
                            type="submit"
                            class="flex-1 bg-primary hover:bg-primary-dark text-white font-semibold py-3 rounded-lg transition shadow-md"
                        >
                            Apply Filters
                        </button>
                        <a href="{{ route('shop') }}" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 rounded-lg text-center transition">
                            Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Products Section -->
        <section class="flex-grow">
            @if($products->count() == 0)
                <div class="bg-white rounded-xl shadow-md p-10 text-center">
                    <i class="fas fa-search text-5xl text-gray-300 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Products Found</h3>
                    <p class="text-gray-500 mb-6">We couldn't find any products matching your criteria.</p>
                    <a href="{{ route('shop') }}" class="inline-block bg-primary hover:bg-primary-dark text-white font-medium py-3 px-6 rounded-lg transition">
                        Clear Filters
                    </a>
                </div>
            @else
                <!-- Products Grid -->
                <div id="product-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($products as $obj)
                        <article class="product-card bg-white rounded-xl overflow-hidden flex flex-col h-full">
                            <a href="/product-details/{{$obj->id}}" class="block overflow-hidden">
                                <div class="relative pb-[100%]">
                                    <img
                                        alt="{{$obj->product_name}}"
                                        class="absolute inset-0 w-full h-full transition duration-500 hover:scale-105"
                                        src="{{ $obj->image_url ? '/image_product/' . $obj->image_url : 'https://storage.googleapis.com/a1aa/image/aa88dfbe-ab80-4fca-db94-141b7c08ed91.jpg' }}"
                                    />
                                </div>
                            </a>
                            <div class="p-5 flex flex-col flex-grow">
                                <div class="flex justify-between items-start mb-2">
                                    <a class="text-lg font-bold text-gray-800 hover:text-primary transition" href="/product-details/{{$obj->id}}">
                                        {{$obj->product_name}}
                                    </a>
                                    <span class="price-tag text-xs font-bold text-white px-2 py-1 rounded-full">
                                        {{ number_format($obj->price, 0, ',', '.') }}đ
                                    </span>
                                </div>
                                <p class="text-gray-600 text-sm mb-4 flex-grow line-clamp-3">
                                    {{$obj->description}}
                                </p>
                                <div class="mt-auto">
                                    <a
                                        class="w-full bg-primary hover:bg-primary-dark text-white font-medium py-3 rounded-lg text-center transition flex items-center justify-center gap-2"
                                        href="/product-details/{{$obj->id}}"
                                    >
                                        <i class="fas fa-shopping-cart"></i> Buy Now
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Load More Button -->
                @if(count($allProducts) > $perPage)
                    <div class="mt-10 text-center">
                        <button
                            id="loadMoreBtn"
                            class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-lg font-semibold transition shadow-md"
                            data-per-page="{{ $perPage }}"
                        >
                            Load More Products
                        </button>
                    </div>
                @endif
            @endif
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
    // Mobile filter toggle
    const mobileFilterButton = document.getElementById('mobileFilterButton');
    const mobileFilterModal = document.getElementById('mobileFilterModal');
    const closeMobileFilter = document.getElementById('closeMobileFilter');

    if (mobileFilterButton) {
        mobileFilterButton.addEventListener('click', () => {
            mobileFilterModal.classList.remove('hidden');
        });
    }

    if (closeMobileFilter) {
        closeMobileFilter.addEventListener('click', () => {
            mobileFilterModal.classList.add('hidden');
        });
    }

    // Close modal when clicking outside
    mobileFilterModal.addEventListener('click', (e) => {
        if (e.target === mobileFilterModal) {
            mobileFilterModal.classList.add('hidden');
        }
    });

    // Filter accordion functionality
    const filterSections = document.querySelectorAll('.filter-section');
    filterSections.forEach(section => {
        const header = section.querySelector('h4');
        header.addEventListener('click', () => {
            section.classList.toggle('active');
            const icon = header.querySelector('i');
            if (section.classList.contains('active')) {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        });
    });

    // Load more functionality
    const allProducts = @json($allProducts);
    let perPage = parseInt(document.getElementById('loadMoreBtn')?.dataset.perPage || 12);
    let currentIndex = perPage;

    document.getElementById('loadMoreBtn')?.addEventListener('click', () => {
        const productContainer = document.getElementById('product-container');
        const productsToShow = allProducts.slice(currentIndex, currentIndex + perPage);

        productsToShow.forEach(obj => {
            const article = document.createElement('article');
            article.className = "product-card bg-white rounded-xl overflow-hidden flex flex-col h-full";
            article.innerHTML = `
                <a href="/product-details/${obj.id}" class="block overflow-hidden">
                    <div class="relative pb-[100%]">
                        <img alt="${obj.product_name}" class="absolute inset-0 w-full h-full object-cover transition duration-500 hover:scale-105"
                            src="${obj.image_url ? '/image_product/' + obj.image_url : 'https://storage.googleapis.com/a1aa/image/aa88dfbe-ab80-4fca-db94-141b7c08ed91.jpg'}">
                    </div>
                </a>
                <div class="p-5 flex flex-col flex-grow">
                    <div class="flex justify-between items-start mb-2">
                        <a class="text-lg font-bold text-gray-800 hover:text-primary transition" href="/product-details/${obj.id}">
                            ${obj.product_name}
                        </a>
                        <span class="price-tag text-xs font-bold text-white px-2 py-1 rounded-full">
                            ${new Intl.NumberFormat('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(Number(obj.price))}đ
                        </span>
                    </div>
                    <p class="text-gray-600 text-sm mb-4 flex-grow line-clamp-3">
                        ${obj.description}
                    </p>
                    <div class="mt-auto">
                        <a class="w-full bg-primary hover:bg-primary-dark text-white font-medium py-3 rounded-lg text-center transition flex items-center justify-center gap-2"
                            href="/product-details/${obj.id}">
                            <i class="fas fa-shopping-cart"></i> Buy Now
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

    // Single selection for filter groups
    function setupCheckboxGroups() {
        const groups = [
            { name: 'brands[]', className: 'brand-group' },
            { name: 'screen_size_group[]', className: 'screen-size-group' },
            { name: 'refresh_rates[]', className: 'refresh-rate-group' },
            { name: 'ram_group[]', className: 'ram-group' }
        ];

        groups.forEach(group => {
            const checkboxes = document.querySelectorAll(`input[name="${group.name}"]`);

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        checkboxes.forEach(other => {
                            if (other !== this) other.checked = false;
                        });
                    }
                });
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        setupCheckboxGroups();

        // Open filter sections that have selected options
        document.querySelectorAll('.filter-section').forEach(section => {
            const hasChecked = section.querySelector('input:checked');
            if (hasChecked) {
                section.classList.add('active');
                const icon = section.querySelector('h4 i');
                if (icon) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            }
        });
    });
</script>
</body>
</html>

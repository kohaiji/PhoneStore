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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Position arrows relative to image container */
        .image-slider-wrapper {
            position: relative;
        }
        .image-slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255 255 255 / 0.7);
            border-radius: 9999px;
            padding: 0.5rem;
            box-shadow: 0 2px 6px rgb(0 0 0 / 0.15);
            cursor: pointer;
            transition: background-color 0.2s ease;
            z-index: 10;
        }
        .image-slider-arrow:hover {
            background-color: rgba(255 255 255 / 1);
        }
        .image-slider-arrow-left {
            left: 0.5rem;
        }
        .image-slider-arrow-right {
            right: 0.5rem;
        }
    </style>
</head>
<body class="bg-[#f8fafc] text-[#1e293b]">
<!-- Header -->
@include('client.header')
<!-- Hero background bar -->
<div class="w-full h-36 bg-gradient-to-r from-[#3B82F6] to-[#60A5FA]">
</div>
<!-- Product Detail Section -->
<section class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 -mt-20 pb-20 space-y-16">
    <div class="pt-24">
        <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col md:flex-row gap-10">
            <!-- Product Images -->
            <div class="md:w-1/2 flex flex-col space-y-4">
                <div class="image-slider-wrapper relative">
                    <div class="relative w-full overflow-hidden">
                        @if($images && $images->isNotEmpty())
                            @foreach($images as $index => $img)
                                <img
                                    alt="Product Image"
                                    class="rounded-lg shadow-md object-contain w-full max-h-[400px] slider-image {{ $index === 0 ? '' : 'hidden' }}"
                                    src="{{ '/image_product/' . $img->image_url }}"
                                    data-index="{{ $index }}"
                                />
                            @endforeach
                        @else
                            <img
                                alt="Default Image"
                                class="rounded-lg shadow-md object-contain w-full max-h-[400px] slider-image"
                                src="https://storage.googleapis.com/a1aa/image/ff408632-80d6-4813-a1d4-b56d3a80488d.jpg"
                                data-index="0"
                            />
                        @endif
                    </div>

                    <!-- Left arrow -->
                    <button
                        aria-label="Previous image"
                        id="prevBtn"
                        class="image-slider-arrow image-slider-arrow-left absolute top-1/2 left-4 transform -translate-y-1/2 z-10"
                        type="button"
                    >
                        <i class="fas fa-chevron-left text-gray-700"></i>
                    </button>

                    <!-- Right arrow -->
                    <button
                        aria-label="Next image"
                        id="nextBtn"
                        class="image-slider-arrow image-slider-arrow-right absolute top-1/2 right-4 transform -translate-y-1/2 z-10"
                        type="button"
                    >
                        <i class="fas fa-chevron-right text-gray-700"></i>
                    </button>
                </div>
                <!-- Variants and Capacity options combined -->
                <div class="mt-4 grid grid-cols-3 gap-4">
                    <!-- Variant 1 -->
                    @foreach($variants as $obj)
                        <button type="button"
                                class="variant-btn border border-gray-200 rounded-md flex flex-col items-center p-2 hover:border-[#2563eb] focus:outline-none"
                                data-variant-id="{{ $obj->id }}"
                                data-stock="{{ $obj->stock }}">
                            <span class="text-xs text-gray-700">{{ $obj->color }} - {{ $obj->storage }}</span>
                            <span class="text-xs text-gray-700 font-bold">
                                    Price: {{ number_format($product->price + $obj->price_adjustment, 0, ',', ',') }}đ
                                </span>
                            <span class="text-xs text-gray-700">
                                    @if($obj->stock > 0)
                                    <i class="bi bi-check-lg text-green-600">In stock: {{$obj->stock}}</i>
                                @else
                                    <i class="bi bi-x-lg text-red-600">Out of stock</i>
                                @endif
                                </span>
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Product Info -->
            <div class="md:w-1/2 flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-extrabold text-[#2563EB] mb-4">
                        {{$product->product_name}}
                    </h1>
                    <p class="text-gray-700 text-base mb-6 leading-relaxed">
                        {{$product->description}}
                    </p>
                    <ul class="text-gray-700 space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Brand: {{$product->brand_name}}
        </span>

                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Screen Size: {{\Illuminate\Support\Str::endsWith($product->screen_size, ' inches') ? $product->screen_size : $product->screen_size . ' inches'}}
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Resolution: {{\Illuminate\Support\Str::endsWith($product->resolution, ' pixels') ? $product->resolution : $product->resolution . ' pixels'}}
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Ram: {{\Illuminate\Support\Str::endsWith($product->ram, 'GB') ? $product->ram : $product->ram . ' GB'}}
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Battery: {{\Illuminate\Support\Str::endsWith($product->battery_cap, ' mAh') ? $product->battery_cap : $product->battery_cap . ' mAh'}}
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Operating System: {{$product->os}}
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Chipset: {{$product->chipset}}
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Sim: {{$product->sim}}
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Camera: {{$product->camera}}
        </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-[#2563EB] mr-3">
                            </i>
                            <span>
         Refresh Rate: {{\Illuminate\Support\Str::endsWith($product->refresh_rate, 'Hz') ? $product->refresh_rate : $product->refresh_rate . 'Hz'}}
        </span>
                        </li>
                    </ul>
                </div>
                <div class="mt-6 flex items-center justify-center md:justify-start space-x-6">
      <span class="font-extrabold text-lg">
       Base Price: {{ number_format($product->price, 0, ',', ',') }}đ
      </span>
                    <div class="flex items-center border border-gray-300 rounded">
                        <button aria-label="Decrease quantity"
                                class="px-3 py-2 text-gray-600 hover:text-gray-900 focus:outline-none" id="decreaseBtn"
                                type="button">
                            <i class="fas fa-minus">
                            </i>
                        </button>
                        <input aria-label="Quantity"
                               class="w-16 text-center border-l border-r border-gray-300 focus:outline-none"
                               id="quantity" max="99" min="1" type="number" value="1" oninput="validateNumber(this)"/>
                        <input type="hidden" id="selectedVariantId" value="">
                        <input type="hidden" id="selectedVariantStock" value="">
                        <button aria-label="Increase quantity"
                                class="px-3 py-2 text-gray-600 hover:text-gray-900 focus:outline-none" id="increaseBtn"
                                type="button">
                            <i class="fas fa-plus">
                            </i>
                        </button>
                    </div>
                    <a href="#" id="btnAddToCart"
                       class="bg-[#2563eb] text-white font-semibold px-5 py-2 rounded hover:bg-[#1e40af] mt-3 inline-block"
                       attrId="">
                        Add to cart
                    </a>
                    <script>
                        var isLoggedIn = @json(auth()->check());
                    </script>

                    <script src="/js/jquery.min.js"></script>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                    <script>
                        $(document).ready(function () {
                            // Bắt sự kiện chọn variant
                            $('.variant-btn').click(function () {
                                $('.variant-btn').removeClass('border-blue-500');
                                $(this).addClass('border-blue-500');

                                let variantId = $(this).data('variant-id');
                                let stock = $(this).data('stock');

                                $('#selectedVariantId').val(variantId);
                                $('#selectedVariantStock').val(stock);
                            });

                            // Bắt sự kiện Add to cart
                            $('#btnAddToCart').click(function (e) {
                                e.preventDefault();

                                if (!isLoggedIn) {
                                    swal({
                                        title: "Warning!",
                                        text: "You must be logged in to make a purchase.",
                                        icon: "warning",
                                        buttons: true,
                                    }).then((willLogin) => {
                                        if (willLogin) {
                                            window.location.href = "/login";
                                        }
                                    });
                                    return;
                                }

                                let variantId = $('#selectedVariantId').val();
                                let stock = parseInt($('#selectedVariantStock').val());
                                let quantity = parseInt($('#quantity').val());

                                if (!variantId) {
                                    swal("Please choose a variant!", {
                                        icon: "info"
                                    });
                                    return;
                                }

                                if (quantity < 1 || isNaN(quantity)) {
                                    swal("Please enter a valid quantity!", {
                                        icon: "error"
                                    });
                                    return;
                                }

                                if (quantity > stock) {
                                    swal("Quantity exceeds stock!", {
                                        icon: "error"
                                    });
                                    return;
                                }

                                $.ajax({
                                    url: '{{ route("addToCart") }}',
                                    method: 'POST',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        variant_id: variantId,
                                        quantity: quantity
                                    },
                                    success: function (response) {
                                        if (response.success) {
                                            swal("Success!", response.message, "success");
                                            $('#cart-count').text(response.count);
                                        } else {
                                            swal("Error!", response.message, "error");
                                        }
                                    },
                                    error: function () {
                                        swal("Error!", "An unexpected error occurred!", "error");
                                    }
                                });
                            });
                        });

                        function validateNumber(input) {
                            var value = parseInt(input.value);
                            if (isNaN(value) || value < 1) {
                                input.value = 1;
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products Section -->
    <section>
        <h2 class="text-2xl font-extrabold text-gray-900 mb-8">
            Related Products
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 max-w-7xl mx-auto">

            @foreach($productRelated as $obj)
                <!-- Related Product -->
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
                    <a href="/product-details/{{$obj->id}}">
                        <img
                            alt="OnePlus Flash smartphone front view with vibrant orange and purple wallpaper"
                            class="w-full h-60 object-contain rounded-md mb-4"
                            height="240"
                            src="{{ $obj->image_url ? '/image_product/' . $obj->image_url : 'https://storage.googleapis.com/a1aa/image/aa88dfbe-ab80-4fca-db94-141b7c08ed91.jpg' }}"
                            width="160"
                        />
                    </a>
                    <a href="/product-details/{{$obj->id}}"
                       class="text-[#2563EB] font-semibold text-base mb-1 hover:underline">
                        {{$obj->product_name}}
                    </a>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                        {{$obj->description}}
                    </p>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="font-extrabold text-gray-900 text-md">{{ number_format($obj->price, 0, ',', ',') }}đ</span>
                        <a class="bg-[#2563EB] text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-[#1e4bb8] transition"
                           href="/product-details/{{$obj->id}}">
                            Buy Now
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <script>
        const decreaseBtn = document.getElementById('decreaseBtn');
        const increaseBtn = document.getElementById('increaseBtn');
        const quantityInput = document.getElementById('quantity');

        decreaseBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });
    </script>

</section>
<!-- Footer -->
@include('client.footer')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const images = document.querySelectorAll('.slider-image');
        let currentIndex = 0;

        function showImage(index) {
            images.forEach((img, i) => {
                img.classList.toggle('hidden', i !== index);
            });
        }

        document.getElementById('prevBtn').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            showImage(currentIndex);
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        });

        // Khởi tạo ảnh đầu tiên
        showImage(currentIndex);
    });
</script>
</body>
</html>

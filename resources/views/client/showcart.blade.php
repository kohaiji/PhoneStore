<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>
        PhoneStore Cart
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            font-size: 1.125rem; /* 18px, noticeably bigger */
        }

        .updating {
            position: relative;
        }

        .updating::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('gif/497.gif')
            center center no-repeat
            rgba(255,255,255,0.8);
            background-size: 40px;
        }
    </style>
</head>
<body class="bg-white text-gray-900 flex flex-col min-h-screen">
<!-- Header -->
@include('client.header')
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-10 flex-grow">
    <h2 class="text-center font-semibold text-lg mb-6" style="margin-top: 60px; font-size:35px">
        Your Shopping Cart
    </h2>

    <div class="flex flex-col lg:flex-row gap-6 lg:gap-16">
        <!-- Cart Items -->
        <div class="flex-1 space-y-4">
            <a onclick="return confirm('Are you sure to remove all products?')" class="text-red-600 mb-4 inline-block underline hover:text-blue-500" href="/cartRemoveAll">
                Remove All
            </a>

            @foreach($cart as $obj)
                <div class="grid grid-cols-1 sm:grid-cols-5 lg:grid-cols-12 gap-4 items-start sm:items-center bg-white rounded-lg p-4 shadow-sm border border-transparent hover:border-gray-100 gap-4" id="item-{{ $obj['variant_id'] }}" data-variant="{{ $obj['variant_id'] }}">
                    <!-- Image -->
                    <div class="sm:col-span-1 lg:col-span-2 flex justify-center bg-[#F9F0F7] rounded-md p-2">
                        <img alt="{{$obj["product_name"]}}" class="w-14 h-14 sm:w-16 sm:h-16 object-contain" src="{{$obj["image_url"] ? '/image_product/' . $obj["image_url"] : $obj["image_url"]}}"/>
                    </div>

                    <!-- Info -->
                    <div class="sm:col-span-2 lg:col-span-4 text-gray-700 space-y-1">
                        <a class="text-[#0057FF] font-semibold text-sm leading-tight block" href="/product-details/{{$obj["product_id"]}}">
                            {{$obj["product_name"]}} {{$obj["color"]}}
                        </a>
                        <p class="font-semibold text-sm leading-tight">Storage: {{$obj["storage"]}}</p>
                        <p class="font-semibold text-sm leading-tight">In stock: {{$obj["stock"]}}</p>
                        <p class="leading-tight text-base">{{$obj["description"]}}</p>
                    </div>

                    <!-- Price -->
                    <div class="sm:col-span-1 lg:col-span-2 font-semibold text-center">
                <span class="font-bold item-total" id="item-total-{{ $obj['variant_id'] }}" data-price="{{ $obj['price'] }}">
                    {{ number_format($obj["price"] * $obj["quantity"], 0, ',', '.') }}đ
                </span>
                    </div>

                    <!-- Quantity & Remove -->
                    <div class="sm:col-span-1 lg:col-span-4 flex flex-col sm:flex-row sm:items-center justify-center space-y-2 sm:space-y-0 sm:space-x-2">
                        <label class="text-sm">Quantity:</label>
                        <input
                            class="w-16 border border-gray-300 rounded px-1 py-0.5 text-base item-quantity text-center"
                            min="1"
                            max="{{$obj['stock']}}"
                            type="number"
                            value="{{$obj["quantity"]}}"
                            data-id="{{ $obj['variant_id'] }}"
                            data-stock="{{ $obj['stock'] }}"
                            oninput="validateQuantity(this)"/>
                        <a onclick="return handleRemove(event, {{ $obj['variant_id'] }})" href="javascript:void(0);" class="text-red-600 font-normal text-base hover:text-blue-500 btn-remove" data-id="{{ $obj['variant_id'] }}">
                            Remove
                        </a>
                    </div>
                </div>
            @endforeach
        </div>


        <!-- Order Summary -->
        <div class="mt-8 lg:mt-0 w-full max-w-md mx-auto lg:mx-0 lg:w-80 bg-white rounded-lg p-6 shadow-sm border border-transparent hover:border-gray-100 text-base">
            <h3 class="font-semibold mb-4">Order Summary</h3>
{{--            <div class="flex justify-between text-gray-700 mb-2">--}}
{{--                <span>Subtotal</span>--}}
{{--                <span>{{ number_format($total, 0, ',', '.') }}đ</span>--}}
{{--            </div>--}}
{{--            <div class="flex justify-between text-gray-700 mb-4">--}}
{{--                <span>Tax (8%)</span>--}}
{{--                <span>$159.84</span>--}}
{{--            </div>--}}
            <hr class="border-gray-200 mb-4"/>
            <div class="flex justify-between font-semibold mb-6">
                <span>Total</span>
                <span id="cart-total">{{ number_format($total, 0, ',', '.') }}đ</span>
            </div>
            <a
                href="/checkout"
                class="w-full block text-center bg-[#0057FF] text-white font-semibold py-2 rounded hover:bg-[#0046d1] transition text-base">
                Proceed to Checkout
            </a>
        </div>
    </div>

</main>
<!-- Footer -->
@include('client.footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function validateQuantity(input) {
        const stock = parseInt(input.dataset.stock);
        let value = parseInt(input.value) || 1;

        if (value > stock) {
            input.value = stock;
            Swal.fire({
                icon: 'warning',
                title: 'Exceeded In Stock!',
                text: `Maximum quantity for this product is ${stock}`
            });
        }

        if (value < 1 || isNaN(value)) {
            input.value = 1;
        }
    }

    $(document).ready(function () {
        $(document).on('change', '.item-quantity', function () {
            const variantId = $(this).data('id');
            let quantity = parseInt($(this).val());
            const stock = parseInt($(this).data('stock'));

            if (quantity > stock) {
                quantity = stock;
                $(this).val(stock);
                Swal.fire({
                    icon: 'warning',
                    title: 'Exceeded In Stock!',
                    text: `Quantity not to exceed ${stock}`
                });
            }

            if (quantity < 1 || isNaN(quantity)) {
                quantity = 1;
                $(this).val(1);
            }

            const itemElement = $(this).closest(`[data-variant="${variantId}"]`);
            itemElement.addClass('updating').css('opacity', '0.7');

            $.ajax({
                url: '{{ route("cart.updateQuantity") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    variant_id: variantId,
                    quantity: quantity
                },
                success: function (response) {
                    if (response.success) {
                        $(`#item-total-${variantId}`).text(response.item_total + 'đ');
                        $('#cart-total').text(response.cart_total + 'đ');
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while updating the quantity.'
                    });
                },
                complete: function () {
                    itemElement.removeClass('updating').css('opacity', '1');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.btn-remove').click(function () {
            const variantId = $(this).data('id');
            const itemDiv = $('#item-' + variantId);

            $.ajax({
                url: '{{ route("cart.remove") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    variant_id: variantId
                },
                success: function (response) {
                    if (response.success) {
                        itemDiv.remove();
                        $('#cart-total').text(response.total);
                        $('#cart-count').text(response.count);

                        // Kiểm tra nếu không còn sản phẩm nào
                        if ($('.btn-remove').length === 0) {
                            $('main h2').text('Your Shopping Cart is empty, go shopping!');
                            $('main').children().not('h2').remove();
                        }
                    }
                }
            });
        });
    });
</script>

<script>
    function handleRemove(e, variantId) {
        if (!confirm('Are you sure to remove this product from your cart?')) {
            e.stopImmediatePropagation();
            return false;
        }
        return true;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Notification',
        text: '{{ session('error') }}',
    });
    @endif
</script>
</body>
</html>

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
    </style>
</head>
<body class="bg-white text-gray-900 flex flex-col min-h-screen">
<!-- Header -->
@include('client.header')
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-grow">
    <h2 class="text-center font-semibold text-lg mb-6" style="margin-top: 60px; font-size:35px">
        Your Shopping Cart
    </h2>

    <div class="flex flex-col md:flex-row" style="gap: 160px;">
        <!-- Cart Items -->
        <div class="flex-1 space-y-4">
                <a class="text-red-600 mb-4 inline-block underline hover:text-blue-500" href="/cartRemoveAll">
                    Remove All
                </a>

            @foreach($cart as $obj)
                <div class="flex items-center space-x-4 bg-white rounded-lg p-4 shadow-sm border border-transparent hover:border-gray-100" id="item-{{ $obj['variant_id'] }}">
                    <div class="flex-shrink-0 bg-[#F9F0F7] rounded-md p-2">
                        <img alt="{{$obj["product_name"]}}" class="w-16 h-16 object-contain" src="{{$obj["image_url"] ? '/image_product/' . $obj["image_url"] : $obj["image_url"]}}"/>
                    </div>
                    <div class="flex-1 text-gray-700">
                        <a class="text-[#0057FF] font-semibold text-sm leading-tight" href="/product-details/{{$obj["product_id"]}}">
                            {{$obj["product_name"]}} {{$obj["color"]}}
                        </a>
                        <p class="font-semibold text-sm leading-tight">Storage: {{$obj["storage"]}}</p>
                        <p class="mt-1 leading-tight text-base">{{$obj["description"]}}</p>
                        <div class="flex items-center space-x-4 mt-2 font-semibold text-gray-900 text-base">
                            <span><span class="font-bold">{{ number_format($obj["price"], 0, ',', ',') }}đ</span></span>
                            <span>Quantity:</span>
                            <input class="w-16 border border-gray-300 rounded px-1 py-0.5 text-base" min="1" type="number" value="{{$obj["quantity"]}}"/>
                            <a href="javascript:void(0);" class="text-red-600 font-normal text-base hover:text-blue-500 btn-remove" data-id="{{ $obj['variant_id'] }}">
                                Remove
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <!-- Order Summary -->
        <div class="mt-8 md:mt-0 w-full md:w-80 bg-white rounded-lg p-6 shadow-sm border border-transparent hover:border-gray-100 text-base">
            <h3 class="font-semibold mb-4">Order Summary</h3>
            <div class="flex justify-between text-gray-700 mb-2">
                <span>Subtotal</span>
                <span>$1998</span>
            </div>
            <div class="flex justify-between text-gray-700 mb-4">
                <span>Tax (8%)</span>
                <span>$159.84</span>
            </div>
            <hr class="border-gray-200 mb-4"/>
            <div class="flex justify-between font-semibold mb-6">
                <span>Total</span>
                <span id="cart-total">{{ number_format($total, 0, ',', ',') }}đ</span>
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
</body>
</html>

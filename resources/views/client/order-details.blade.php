<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Order Details - PhoneStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
<!-- Header -->
@include('client.header')
<main class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
    <h1 class="text-2xl font-semibold mb-6 text-gray-900">Order Details</h1>
    <section class="mb-8">
        <h2 class="text-xl font-semibold mb-4 text-gray-900">Order Information</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
            <div><span class="font-semibold">Order ID:</span> {{$orderId}}</div>
            <div><span class="font-semibold">Order Date:</span> {{$order->order_date}}</div>
            <!-- THÊM THÔNG TIN KHÁCH HÀNG -->
            <div><span class="font-semibold">Customer Name:</span> {{$order->full_name}}</div>
            <div><span class="font-semibold">Status:</span> <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-{{
                                                                $order->status == 'Completed' ? 'green-500' :
                                                                ($order->status == 'Cancelled' ? 'red-500' :
                                                                ($order->status == 'Shipping' ? 'blue-500' :
                                                                ($order->status == 'Pending' ? 'yellow-500' : 'orange-500'
                                                                )))
                                                            }}">
                                                                {{ $order->status }}
                                                            </span>
            </div>
            <div><span class="font-semibold">Payment Method:</span> {{$order->payment_method}}</div>
            <div><span class="font-semibold">Phone Number:</span> {{$order->phone}}</div>
            <div><span class="font-semibold">Address:</span> {{$order->address}}</div>
        </div>
    </section>

    <section>
        <h2 class="text-xl font-semibold mb-4 text-gray-900">Ordered Products</h2>

        <div class="space-y-6">
            <!-- Product 2 -->
            @foreach($orderDetails as $obj)
            <div class="flex items-center space-x-4 border-b border-gray-200 pb-4">
                <img src="{{ '/image_product/' . $obj->image_url }}" alt="{{ $obj->product_name }}" class="w-20 h-20 object-contain rounded bg-[#fef0f5]" />
                <div class="flex-1">
                    <p class="font-semibold text-gray-800">{{$obj->product_name}}</p>
                    <!-- THÊM THÔNG TIN SPECS -->
                    <div class="mt-1 text-sm text-gray-600">
                        <div><span class="font-medium">Color:</span> {{$obj->color}}</div>
                        <div><span class="font-medium">Storage:</span> {{$obj->storage}}</div>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Quantity: {{$obj->quantity}}</p>
                </div>
                <div class="text-sm font-semibold text-gray-900">{{ number_format($obj->price, 0, ',', ',') }}đ</div>
                <div class="text-sm font-semibold text-gray-900">{{ number_format($obj->price*$obj->quantity, 0, ',', ',') }}đ</div>
            </div>
            @endforeach
            <!-- Summary -->
            <div class="flex justify-between border-t border-gray-300 pt-4 text-lg font-bold text-gray-900">
                <span>Total</span>
                <span>{{ number_format($order->total, 0, ',', ',') }}đ</span>
            </div>
        </div>
    </section>
    <a href="/order" class="inline-block mt-6 bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition-colors text-center">Back to Order History</a>
</main>
<!-- Footer -->
@include('client.footer')
</body>
</html>

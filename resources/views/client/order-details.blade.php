<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Order Details - PhoneStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#f7f9fc] flex flex-col min-h-screen">
<!-- Header -->
@include('client.header')

<!-- Spacer to separate header and main content -->
<div class="h-16"></div>

<main class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 my-10 text-base">
    <h1 class="text-2xl font-bold mb-8 text-gray-900 select-none">Order Details</h1>
    <section class="mb-10">
        <h2 class="text-lg font-bold mb-5 text-gray-900 select-none border-b border-gray-200 pb-3">Order Information</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4 text-gray-700">
            <div><span class="font-semibold select-none">Order Date:</span> {{$order->order_date}}</div>
            <div><span class="font-semibold select-none">Customer Name:</span> {{$order->full_name}}</div>
            <div>
                <span class="font-semibold select-none">Status:</span>
                <span class="inline-block px-3 py-1 text-xs font-semibold text-white rounded select-none
                    {{ $order->status == 'Completed' ? 'bg-green-600' :
                       ($order->status == 'Cancelled' ? 'bg-red-600' :
                       ($order->status == 'Shipping' ? 'bg-blue-600' :
                       ($order->status == 'Pending' ? 'bg-yellow-500 text-gray-900' : 'bg-orange-500'))) }}">
                    {{ $order->status }}
                </span>
            </div>
            <div><span class="font-semibold select-none">Payment Method:</span> {{$order->payment_method}}</div>
            <div><span class="font-semibold select-none">Phone Number:</span> {{$order->phone}}</div>
            <div><span class="font-semibold select-none">Address:</span> {{$order->address}}</div>
        </div>
    </section>

    <section>
        <div class="flex items-center justify-between mb-6 border-b border-gray-200 pb-3">
            <h2 class="text-lg font-bold text-gray-900 select-none">Ordered Products</h2>
            <div class="flex space-x-10 text-gray-900 font-semibold select-none text-sm">
                <span class="w-20 text-right">Unit Price</span>
                <span class="w-24 text-right">Total Price</span>
            </div>
        </div>

        <div class="space-y-8">
            @foreach($orderDetails as $obj)
                <div class="flex items-center space-x-5 border-b border-gray-200 pb-5 text-gray-700">
                    <img src="{{ '/image_product/' . $obj->image_url }}" alt="{{ $obj->product_name }}" class="w-20 h-20 object-contain rounded bg-[#fef0f5]" />
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900 select-none">{{$obj->product_name}}</p>
                        <div class="mt-1 space-y-0.5">
                            <div class="text-sm text-gray-600"><span class="font-medium select-none">Color:</span> {{$obj->color}}</div>
                            <div class="text-sm text-gray-600"><span class="font-medium select-none">Storage:</span> {{$obj->storage}}</div>
                        </div>
                        <p class="text-sm text-gray-600 mt-1 select-none">Quantity: {{$obj->quantity}}</p>
                    </div>
                    <div class="text-sm font-semibold text-gray-900 text-right w-20 select-none">{{ number_format($obj->price, 0, ',', '.') }}đ</div>
                    <div class="text-sm font-semibold text-gray-900 text-right w-24 select-none">{{ number_format($obj->price*$obj->quantity, 0, ',', '.') }}đ</div>
                </div>
            @endforeach
            <div class="flex justify-between border-t border-gray-300 pt-5 text-lg font-bold text-gray-900 select-none">
                <span>Total</span>
                <span>{{ number_format($order->total, 0, ',', '.') }}đ</span>
            </div>
        </div>
    </section>
    <a href="/order" class="inline-block mt-8 bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition-colors text-center select-none">Back to Order History</a>
</main>
<!-- Footer -->
@include('client.footer')
</body>
</html>

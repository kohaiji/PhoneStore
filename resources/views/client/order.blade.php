<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Order History - PhoneStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
        rel="stylesheet"
    />
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen text-base sm:text-lg">
<!-- Header -->

@include('client.header')

<!-- Main content container -->
<main class="flex-grow flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 mt-6 mb-12 max-w-7xl mx-auto text-center">
    <h2 class="text-2xl font-semibold mb-6 select-none self-start">Order History</h2>
    <div class="overflow-x-auto rounded-lg bg-white shadow w-full max-w-6xl">
        <!-- Responsive table for md and up -->
        <table class="min-w-full divide-y divide-gray-200 text-lg hidden md:table">
            <thead class="bg-gray-100">
            <tr>
                <th
                    scope="col"
                    class="px-8 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider select-none"
                >
                    FULL NAME
                </th>
                <th
                    scope="col"
                    class="px-8 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider select-none"
                >
                    DATE
                </th>
                <th
                    scope="col"
                    class="px-8 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider select-none"
                >
                    STATUS
                </th>
                <th
                    scope="col"
                    class="px-8 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider select-none"
                >
                    TOTAL
                </th>
                <th
                    scope="col"
                    class="px-8 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider select-none"
                >
                    ACTIONS
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($orders as $index => $obj)
                <tr>
                    <td class="px-8 py-6 whitespace-nowrap text-gray-900 select-text">
                        {{$obj->full_name}}
                    </td>
                    <td class="px-8 py-6 whitespace-nowrap text-gray-900 select-text">
                        {{$obj->order_date}}
                    </td>
                    <td class="px-8 py-6 whitespace-nowrap">
                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded select-none
                        {{ $obj->status == 'Completed' ? 'text-green-700 bg-green-100' :
                           ($obj->status == 'Cancelled' ? 'text-red-700 bg-red-100' :
                           ($obj->status == 'Shipping' ? 'text-blue-700 bg-blue-100' :
                           ($obj->status == 'Pending' ? 'text-yellow-700 bg-yellow-100' : 'text-orange-500 bg-orange-100'))) }}">
                        {{ $obj->status }}
                    </span>
                    </td>
                    <td class="px-8 py-6 whitespace-nowrap font-bold text-gray-900 select-text">
                        {{ number_format($obj->total, 0, ',', ',') }}đ
                    </td>
                    <td class="px-8 py-6 whitespace-nowrap">
                        <a href="/order-details/{{$obj->id}}" class="text-blue-600 hover:underline select-text">
                            View Details
                        </a>

                        @if($obj->status === 'Pending' || $obj->status === 'Confirmed')
                            <form method="POST" action="{{ route('orders.updateStatus', $obj->id) }}" class="inline-block ml-6"
                                  onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="action" value="cancel">
                                <button type="submit" class="text-red-600 hover:underline">Cancel</button>
                            </form>
                        @endif

                        @if($obj->status === 'Shipping')
                            <form method="POST" action="{{ route('orders.updateStatus', $obj->id) }}" class="inline-block ml-6"
                                  onsubmit="return confirm('Confirm you received the order?');">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="action" value="complete">
                                <button type="submit" class="text-green-600 hover:underline">Mark as Received</button>
                            </form>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Mobile friendly card list for small screens -->
        <div class="md:hidden space-y-4 p-2">
            @foreach($orders as $obj)
                <div class="bg-white rounded-lg shadow p-4 text-left">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-semibold text-lg text-gray-900 select-text">{{$obj->full_name}}</h3>
                        <span class="inline-block px-3 py-1 text-sm font-semibold rounded select-none
                        {{ $obj->status == 'Completed' ? 'text-green-700 bg-green-100' :
                           ($obj->status == 'Cancelled' ? 'text-red-700 bg-red-100' :
                           ($obj->status == 'Shipping' ? 'text-blue-700 bg-blue-100' :
                           ($obj->status == 'Pending' ? 'text-yellow-700 bg-yellow-100' : 'text-orange-500 bg-orange-100'))) }}">
                        {{ $obj->status }}
                    </span>
                    </div>
                    <p class="text-gray-700 select-text"><span class="font-semibold">Date:</span> {{$obj->order_date}}</p>
                    <p class="text-gray-900 font-bold select-text mt-1"><span class="font-semibold">Total:</span> {{ number_format($obj->total, 0, ',', ',') }}đ</p>
                    <div class="mt-4 flex flex-wrap gap-4">
                        <a href="/order-details/{{$obj->id}}" class="text-blue-600 hover:underline select-text">
                            View Details
                        </a>

                        @if($obj->status === 'Pending' || $obj->status === 'Confirmed')
                            <form method="POST" action="{{ route('orders.updateStatus', $obj->id) }}" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="action" value="cancel">
                                <button type="submit" class="text-red-600 hover:underline">Cancel</button>
                            </form>
                        @endif

                        @if($obj->status === 'Shipping')
                            <form method="POST" action="{{ route('orders.updateStatus', $obj->id) }}" class="inline-block"
                                  onsubmit="return confirm('Confirm you received the order?');">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="action" value="complete">
                                <button type="submit" class="text-green-600 hover:underline">Mark as Received</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>

<!-- Footer -->
@include('client.footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33'
        });
    </script>
@endif
</body>
</html>

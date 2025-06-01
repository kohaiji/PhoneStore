<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Order History - PhoneStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen p-6">
<!-- Header -->
@include('client.header')
<main class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-8">
    <h1 class="text-2xl font-semibold mb-6 text-gray-900">Order History</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Order ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Date</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Total</th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            <!-- Order Row 1 -->
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">#1001</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2024-06-01</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <span class="inline-flex px-2 py-1 rounded text-xs font-semibold bg-green-100 text-green-800">Delivered</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">$320.00</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                    <a href="order-details" class="text-blue-600 hover:underline">View Details</a>
                    <button disabled class="text-gray-400 cursor-not-allowed">Cancel</button>
                </td>
            </tr>
            <!-- Order Row 2 -->
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">#1002</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2024-06-10</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <span class="inline-flex px-2 py-1 rounded text-xs font-semibold bg-yellow-100 text-yellow-800">Processing</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">$1,099.00</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                    <a href="order-details" class="text-blue-600 hover:underline">View Details</a>
                    <button onclick="cancelOrder('1002')" class="text-red-600 hover:underline">Cancel</button>
                </td>
            </tr>
            <!-- Order Row 3 -->
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">#1003</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2024-06-15</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <span class="inline-flex px-2 py-1 rounded text-xs font-semibold bg-blue-100 text-blue-800">Shipped</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">$899.00</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                    <a href="order-details" class="text-blue-600 hover:underline">View Details</a>
                    <button onclick="cancelOrder('1003')" class="text-red-600 hover:underline">Cancel</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
<!-- Footer -->
@include('client.footer')

</body>
</html>

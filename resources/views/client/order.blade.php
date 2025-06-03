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
<!-- Navbar -->

@include('client.header')

<!-- Main content container -->
<main class="flex-grow flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 mt-6 mb-12 max-w-7xl mx-auto text-center">
    <h2 class="text-2xl font-semibold mb-6 select-none self-start">Order History</h2>
    <div class="overflow-x-auto rounded-lg bg-white shadow w-full max-w-6xl">
        <table class="min-w-full divide-y divide-gray-200 text-lg">
            <thead class="bg-gray-100">
            <tr>
                <th
                    scope="col"
                    class="px-8 py-4 text-left font-semibold text-gray-500 uppercase tracking-wider select-none"
                >
                    ORDER ID
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
            <tr>
                <td class="px-8 py-6 whitespace-nowrap text-gray-900 select-text">
                    #1001
                </td>
                <td class="px-8 py-6 whitespace-nowrap text-gray-900 select-text">
                    2024-06-01
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
              <span
                  class="inline-block px-3 py-1 text-sm font-semibold text-green-700 bg-green-100 rounded select-none"
              >Delivered</span
              >
                </td>
                <td class="px-8 py-6 whitespace-nowrap font-bold text-gray-900 select-text">
                    $320.00
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
                    <a
                        href="#"
                        class="text-blue-600 hover:underline select-text"
                    >View Details</a
                    >
                    <span class="text-gray-400 ml-6 select-none cursor-default"
                    >Cancel</span
                    >
                </td>
            </tr>
            <tr>
                <td class="px-8 py-6 whitespace-nowrap text-gray-900 select-text">
                    #1002
                </td>
                <td class="px-8 py-6 whitespace-nowrap text-gray-900 select-text">
                    2024-06-10
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
              <span
                  class="inline-block px-3 py-1 text-sm font-semibold text-yellow-700 bg-yellow-100 rounded select-none"
              >Processing</span
              >
                </td>
                <td class="px-8 py-6 whitespace-nowrap font-bold text-gray-900 select-text">
                    $1,099.00
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
                    <a
                        href="#"
                        class="text-blue-600 hover:underline select-text"
                    >View Details</a
                    >
                    <a
                        href="#"
                        class="text-red-600 hover:underline ml-6 select-text"
                    >Cancel</a
                    >
                </td>
            </tr>
            <tr>
                <td class="px-8 py-6 whitespace-nowrap text-gray-900 select-text">
                    #1003
                </td>
                <td class="px-8 py-6 whitespace-nowrap text-gray-900 select-text">
                    2024-06-15
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
              <span
                  class="inline-block px-3 py-1 text-sm font-semibold text-blue-700 bg-blue-100 rounded select-none"
              >Shipped</span
              >
                </td>
                <td class="px-8 py-6 whitespace-nowrap font-bold text-gray-900 select-text">
                    $899.00
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
                    <a
                        href="#"
                        class="text-blue-600 hover:underline select-text"
                    >View Details</a
                    >
                    <a
                        href="#"
                        class="text-red-600 hover:underline ml-6 select-text"
                    >Cancel</a
                    >
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

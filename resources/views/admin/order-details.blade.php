<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
<div id="app">
    @include('admin.sidebar')
    <div id="main" class='layout-navbar'>
        @include('admin.navbar')

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Order Details #{{ $order->id }}</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/admin/order-list">Order List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thông tin tổng quan đơn hàng -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Order Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Order ID:</strong> {{ $order->id }}</p>
                            <p><strong>Customer Name:</strong> {{ $order->full_name }}</p>
                            <p><strong>Address:</strong> {{ $order->address }}</p>
                            <p><strong>Phone:</strong> {{ $order->phone }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Total Amount:</strong> {{ number_format($order->total, 0, ',', '.') }}đ</p>
                            <p><strong>Status:</strong>
                                <span class="badge bg-{{
                                    $order->status == 'Completed' ? 'success' :
                                    ($order->status == 'Cancelled' ? 'danger' :
                                    ($order->status == 'Shipping' ? 'primary' : 'warning'))
                                }}">
                                    {{ $order->status }}
                                </span>
                            </p>
                            <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
                            <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chi tiết sản phẩm -->
            <div class="card">
                <div class="card-header">
                    <h4>Order Items</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Image</th>
                                <th>Specs</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderDetails as $item)
                                <tr>
                                    <td>{{ $item->product_name }}</td>
                                    <td>
                                        @if($item->image_url)
                                            <img src="{{ '/image_product/' . $item->image_url }}" alt="{{ $item->product_name }}"
                                                 class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center"
                                                 style="width: 80px; height: 80px;">
                                                <i class="bi bi-image" style="font-size: 2rem;"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div><strong>Color:</strong> {{ $item->color ?? 'N/A' }}</div>
                                        <div><strong>Storage:</strong> {{ $item->storage ?? 'N/A' }}</div>
                                    </td>
                                    <td>{{ number_format($item->price, 0, ',', '.') }}đ</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->price*$item->quantity, 0, ',', '.') }}đ</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5" class="text-end"><strong>Grand Total:</strong></td>
                                <td><strong>{{ number_format($order->total, 0, ',', '.') }}đ</strong></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>
<script src="/assets/js/main.js"></script>
</body>
</html>

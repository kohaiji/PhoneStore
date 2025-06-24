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
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>List Order</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order List
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                        <form action="{{ route('admin.order.search') }}" method="get">
                            <div class="row mt-2">
                                <div class="col-9">
                                    <input placeholder="Search By Customer Name..." class="form-control" type="text" name="data" value="{{ $data ?? '' }}">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-secondary btn-sm rounded-pill" type="submit"><i class="bi bi-search"></i></button>
                                </div>
                                <div class="col-auto">
                                    <a class="btn btn-success btn-sm rounded-pill" href="/admin/order-list">View All</a>
                                </div>
                                <div class="col-auto">
                                    <a href="/admin/cancel-expired-payos" onclick="return confirm('Are you sure you want to cancel all orders that have expired?')" class="btn btn-danger btn-sm rounded-pill">Cancel overdue orders</a>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-4">
                                        <select class="form-select" name="status" onchange="this.form.submit()">
                                            <option value="all" {{ $currentFilter === 'all' ? 'selected' : '' }}>All Status</option>
                                            <option value="Paid" {{ $currentFilter === 'Paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="Pending" {{ $currentFilter === 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Confirmed" {{ $currentFilter === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="Shipping" {{ $currentFilter === 'Shipping' ? 'selected' : '' }}>Shipping</option>
                                            <option value="Completed" {{ $currentFilter === 'Completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="Cancelled" {{ $currentFilter === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <select class="form-select" name="payment_method" onchange="this.form.submit()">
                                            <option value="all" {{ $currentPaymentMethod === 'all' ? 'selected' : '' }}>All Methods</option>
                                            <option value="cod" {{ $currentPaymentMethod === 'cod' ? 'selected' : '' }}>COD</option>
                                            <option value="payos" {{ $currentPaymentMethod === 'payos' ? 'selected' : '' }}>PayOS</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </form>

                </div>
            </div>
{{--            <div class="row mt-3">--}}
{{--                <div class="col-md-3">--}}
{{--                    <form method="GET" action="{{ route('admin.orders.list') }}">--}}
{{--                        <div class="input-group mb-3">--}}
{{--                            <label class="input-group-text" for="statusFilter">Status</label>--}}
{{--                            <select class="form-select" id="statusFilter" name="status" onchange="this.form.submit()">--}}
{{--                                <option value="all" {{ $currentFilter === 'all' ? 'selected' : '' }}>All Status</option>--}}
{{--                                <option value="Pending" {{ $currentFilter === 'Pending' ? 'selected' : '' }}>Pending</option>--}}
{{--                                <option value="Confirmed" {{ $currentFilter === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>--}}
{{--                                <option value="Shipping" {{ $currentFilter === 'Shipping' ? 'selected' : '' }}>Shipping</option>--}}
{{--                                <option value="Completed" {{ $currentFilter === 'Completed' ? 'selected' : '' }}>Completed</option>--}}
{{--                                <option value="Cancelled" {{ $currentFilter === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="table-responsive">
                <table class="table table-light mb-0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Receiver Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Total Order</th>
                        <th>Status</th>
                        <th>Payment Method</th>
                        <th>Order Date</th>
                        <th class="text-center" colspan="1">ACTION</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($orders as $obj)
                        <tr>
                            <td>{{$obj->id}}</td>
                            <td>{{$obj->full_name}}</td>
                            <td>{{$obj->address}}</td>
                            <td>{{$obj->phone}}</td>
                            <td>{{ number_format($obj->total, 0, ',', '.') }}đ</td>
                            <td>
                                @if(in_array($obj->status, ['Completed', 'Cancelled']))
                                    {{ $obj->status }}
                                @else
                                    <form action="/admin/order-update-status/{{$obj->id}}" method="POST">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                            <option value="Paid" {{ $obj->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="Pending" {{ $obj->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Confirmed" {{ $obj->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="Shipping" {{ $obj->status == 'Shipping' ? 'selected' : '' }}>Shipping</option>
                                            <option value="Completed" {{ $obj->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="Cancelled" {{ $obj->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                @endif
                            </td>
                            <td>{{$obj->payment_method}}</td>
                            <td>{{$obj->order_date}}</td>
                            <td class="text-center">
                                <a href="/admin/order-details/{{$obj->id}}" class="btn btn-outline-success btn-sm">Details Order</a>
                            </td>
{{--                            <td class="text-center">--}}
{{--                                <a onclick="return confirm('Are you sure?')" href="/admin/brand-delete/{{$obj->id}}" class="btn btn-outline-danger btn-sm">Delete</a>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-1">
                    {{ $orders->appends(['status' => $currentFilter])->links() }}
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

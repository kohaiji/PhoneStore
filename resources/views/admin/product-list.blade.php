<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

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
                            <h3>List Product</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product List
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <form action="/admin/product-search" method="get">
                        <div class="row">
                            <div class="col-10">
                                <input placeholder="Search Something......" class="form-control" type="text" name="data" value="{{$data}}">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-secondary btn-sm rounded-pill" type="submit"><i class="bi bi-search" aria-hidden="true" ></i></button>
                            </div>
                            <div class="col-auto"><span><a class="btn btn-success btn-sm rounded-pill" href="/admin/product-list">View All</a></span></div>
                        </div>
                    </form>

                    <a href="/admin/product-add" class="btn btn-primary rounded-pill mt-3 mb-1">Add Product</a>
                </div>
            </div>



            <div class="table-responsive">
                <table class="table table-light mb-0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th class="text-center" colspan="3">ACTION</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($products as $obj)
                    <tr>
                        <td>{{$obj->id}}</td>
                        <td>{{$obj->product_name}}</td>
                        <td>{{$obj->price}}</td>
                        <td class="text-center">
                            <a href="/admin/product-details/{{$obj->id}}" class="btn btn-outline-success btn-sm">Details</a>
                        </td>
                        <td class="text-center">
                            <a href="/admin/product-edit/{{$obj->id}}" class="btn btn-outline-primary btn-sm">Edit</a>
                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Are you sure?')" href="/admin/product-delete/{{$obj->id}}" class="btn btn-outline-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-1">
                    {{$products->links()}}
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

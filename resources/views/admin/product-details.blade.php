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
                            <h3>Product Details</h3>
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
                </div>
            </div>

            <table class="table table-hover  table-striped">
                <tr>
                    <th>Id</th>
                    <td>{{$products->id}}</td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td>{{$products->product_name}}</td>
                </tr>
                <tr>
                    <th>Brand Name</th>
                    <td>{{$products->brand_name}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$products->description}}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{$products->price}}</td>
                </tr>
                <tr>
                    <th>Screen Size</th>
                    <td>{{$products->screen_size}}</td>
                </tr>
                <tr>
                    <th>Resolution</th>
                    <td>{{$products->resolution}}</td>
                </tr>
                <tr>
                    <th>Ram</th>
                    <td>{{$products->ram}}</td>
                </tr>
                <tr>
                    <th>Battery Cap</th>
                    <td>{{$products->battery_cap}}</td>
                </tr>
                <tr>
                    <th>Operating System</th>
                    <td>{{$products->os}}</td>
                </tr>
                <tr>
                    <th>Chip Set</th>
                    <td>{{$products->chipset}}</td>
                </tr>
                <tr>
                    <th>Sim</th>
                    <td>{{$products->sim}}</td>
                </tr>
                <tr>
                    <th>Camera</th>
                    <td>{{$products->camera}}</td>
                </tr>
                <tr>
                    <th>Refresh Rate</th>
                    <td>{{$products->refresh_rate}}</td>
                </tr>
            </table>

            <a class="btn btn-primary" href="/admin/product-list">Go back</a>
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

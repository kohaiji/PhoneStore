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
                            <h3>Edit Product</h3>
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

            <form action="/admin/product-update/{{$products->id}}" method="post" enctype="multipart/form-data" name="form1" onsubmit="required()" class="col-10">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Id</b></span>
                    <input type="text" name="productId" value="{{$products->id}}" class="form-control form-control-sm" disabled>
                </div>

                <div class="mt-2 mb-3">
                    <label for="">Brands</label>

                    <select name="brandId" id="" class="form-control form-control-sm" required>
                        <option value="">None</option>
                        @foreach($brands as $object)
                            <option value="{{$object->id}}" @if($object->id == $products->brand_id){{'selected'}}@endif>{{$object->brand_name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Product Name</b></span>
                    <input type="text" name="productName" value="{{$products->product_name}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Description</b></span>
                    <input type="text" name="description" value="{{$products->description}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Price</b></span>
                    <input type="text" name="price" value="{{$products->price}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Screen Size</b></span>
                    <input type="text" name="screenSize" value="{{$products->screen_size}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Resolution</b></span>
                    <input type="text" name="resolution" value="{{$products->resolution}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Ram</b></span>
                    <input type="text" name="ram" value="{{$products->ram}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Battery Cap</b></span>
                    <input type="text" name="batteryCap" value="{{$products->battery_cap}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>OS</b></span>
                    <input type="text" name="os" value="{{$products->os}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Chip Set</b></span>
                    <input type="text" name="chipset" value="{{$products->chipset}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Sim</b></span>
                    <input type="text" name="sim" value="{{$products->sim}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Camera</b></span>
                    <input type="text" name="camera" value="{{$products->camera}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Refresh Rate</b></span>
                    <input type="text" name="refreshRate" value="{{$products->refresh_rate}}" class="form-control form-control-sm">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Release Date</b></span>
                    <input type="date" name="releaseDate" value="{{$products->release_date}}" class="form-control form-control-sm">
                </div>

                <div class="mb-2 mt-2">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>

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

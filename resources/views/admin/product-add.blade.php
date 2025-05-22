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
                            <h3>Add Product</h3>
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

            <form action="/admin/product-save" method="post" enctype="multipart/form-data" name="form1" onsubmit="required()" class="col-10">
                @csrf
                <div class="mt-2 mb-2">
                    <label for="">Product Name</label>
                    <input type="text" name="productName" class="form-control form-control-sm" required/>
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control form-control-sm" />
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Price</label>
                    <input type="text" name="price" class="form-control form-control-sm" required/>
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Screen Size</label>
                    <input type="text" name="screenSize" class="form-control form-control-sm"/>
                </div>


                <div class="mt-2 mb-2">
                    <label for="">Resolution</label>
                    <input type="text" name="resolution" class="form-control form-control-sm"/>
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Ram</label>
                    <input type="text" name="ram" class="form-control form-control-sm"/>
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Battery Cap</label>
                    <input type="text" name="batteryCap" class="form-control form-control-sm"/>
                </div>

                <div class="mt-2 mb-2">
                    <label for="">OS</label>
                    <input type="text" name="os" class="form-control form-control-sm"/>
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Chip Set</label>
                    <input type="text" name="chipset" class="form-control form-control-sm"/>
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Sim</label>
                    <input type="text" name="sim" class="form-control form-control-sm"/>
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Camera</label>
                    <input type="text" name="camera" class="form-control form-control-sm"/>
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Refresh Rate</label>
                    <input type="text" name="refreshRate" class="form-control form-control-sm"/>
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control form-control-sm" />
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Release Date</label>
                    <input type="date" name="releaseDate" class="form-control form-control-sm"/>
                </div>

                <div class="mt-2 mb-2">
                    <label for="">Brand</label>
                    <select name="brandId" id="" class="form-control form-control-sm" required>
                        <option value="">None</option>
                        @foreach($brands as $obj)
                            <option value="{{$obj->id}}">{{$obj->brand_name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mt-2 mb-2">
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

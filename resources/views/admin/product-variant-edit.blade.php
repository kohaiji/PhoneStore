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
                            <h3>Edit Product Variant</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Product Variant
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <form action="/admin/product-variant-update/{{$product_variants->id}}" method="post" enctype="multipart/form-data" name="form1" onsubmit="required()" class="col-10">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Id Variant</b></span>
                    <input type="text" name="productId" value="{{$product_variants->id}}" class="form-control form-control-sm" disabled>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Product Name</b></span>
                    <input type="text" name="productName" value="{{$product_variants->product_name}}" class="form-control form-control-sm" disabled>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Color</b></span>
                    <input type="text" name="color" value="{{$product_variants->color}}" class="form-control form-control-sm" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Storage</b></span>
                    <input type="text" name="storage" value="{{$product_variants->storage}}" class="form-control form-control-sm" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Price</b></span>
                    <input type="text" name="priceAdjustment" value="{{$product_variants->price_adjustment}}" class="form-control form-control-sm" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Stock</b></span>
                    <input type="text" name="stock" value="{{$product_variants->stock}}" class="form-control form-control-sm" required>
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

<script>
    document.forms['form1'].addEventListener('submit', function (e) {
        const priceAdjustment = document.forms['form1']['priceAdjustment'].value.trim();
        const stock = document.forms['form1']['stock'].value.trim();

        let errorMsg = '';

        if (priceAdjustment) {
            if (isNaN(priceAdjustment)) {
                errorMsg += 'Price must be a number.\n';
            } else if (Number(priceAdjustment) < 0) {
                errorMsg += 'Price cannot be negative.\n';
            }
        }

        if (stock && isNaN(stock)) {
            errorMsg += 'Stock must be a number.\n';
        }

        if (errorMsg) {
            alert(errorMsg);
            e.preventDefault(); // Prevent form submission if there are errors
        }
    });
</script>
</body>

</html>

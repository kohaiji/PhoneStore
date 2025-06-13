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
                            <h3>Edit Brand</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/admin/brand-list">Brand List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <form action="/admin/brand-update/{{$brands->id}}" method="post" enctype="multipart/form-data" name="form1" onsubmit="required()" class="col-10">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Id</b></span>
                    <input type="text" name="brandId" value="{{$brands->id}}" class="form-control" disabled>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Brand Name</b></span>
                    <input type="text" name="brandName" value="{{$brands->brand_name}}" class="form-control">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><b>Logo</b></span>
                    <input type="file" name="logo" class="form-control" id="logoInput">
                </div>
                <input type="hidden" name="oldLogo" value="{{$brands->logo_url}}">
                @if($brands->logo_url)
                    <div class="mb-3">
                        <img id="logoPreview" src="/brand_logo/{{$brands->logo_url}}" alt="Current Logo" style="max-height: 100px;">
                    </div>
                @else
                    <div class="mb-3">
                        <img id="logoPreview" src="/brand_logo/{{null}}" alt="Current Logo" style="max-height: 100px;">
                    </div>
                @endif

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
    document.getElementById('logoInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('logoPreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
</body>

</html>

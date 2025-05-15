<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/admincss/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/admincss/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
        @include("admin.sidebar")
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        @include("admin.navbar")
        <!-- Navbar End -->


        <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <h3>Product Details</h3>
                <table class="table table-hover  table-striped">

                        <thead>
                        <tr>
                            <th>Id</th>
                            <td>{{$product->id}}</td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td>{{$product->product_name}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{$product->price}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$product->description}}</td>
                        </tr>
                        <tr>
                            <th>In Stock</th>
                            <td>{{$product->stock}}</td>
                        </tr>
                        <tr>
                            <th>ISBN</th>
                            <td>{{$product->isbn_code}}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img height="100" src="/image_product/{{$product->image}}" alt=""></td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <td>{{$product->category_name}}</td>
                        </tr>
                        <tr>
                            <th>Publisher Name</th>
                            <td>{{$product->publisher_name}}</td>
                        </tr>
                        <tr>
                            <th>Author Name</th>
                            <td>{{$product->author_name}}</td>
                        </tr>

                        </thead>
                </table>
                <a href="/admin/product-list" class="btn btn-primary">Go Back</a>
            </div>
        <!-- Blank End -->


        <!-- Footer Start -->

        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/lib/chart/chart.min.js"></script>
<script src="/lib/easing/easing.min.js"></script>
<script src="/lib/waypoints/waypoints.min.js"></script>
<script src="/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="/lib/tempusdominus/js/moment.min.js"></script>
<script src="/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="/js/main.js"></script>
</body>

</html>

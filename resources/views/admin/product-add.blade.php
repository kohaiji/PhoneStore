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
                <h3>Add Product</h3>
                <form action="/admin/product-save" method="post" enctype="multipart/form-data" name="form1" onsubmit="required()">
                    @csrf
                    <div class="mt-2 mb-2">
                        <label for="">Product Name</label>
                        <input type="text" name="productName" class="form-control form-control-sm" required/>
                    </div>

                    <div class="mt-2 mb-2">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control form-control-sm" required/>
                    </div>

                    <div class="mt-2 mb-2">
                        <label for="">Description</label>
                        <input type="text" name="description" class="form-control form-control-sm" />
                    </div>

                    <div class="mt-2 mb-2">
                        <label for="">Stock</label>
                        <input type="number" name="stock" class="form-control form-control-sm" required/>
                    </div>

                    <div class="mt-2 mb-2">
                        <label for="">ISBN Code</label>
                        <input type="text" name="isbn" class="form-control form-control-sm" required/>
                    </div>

                    <div class="mt-2 mb-2">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control form-control-sm" />
                    </div>

                    <div class="mt-2 mb-2">
                        <label for="">Category</label>
                        <select name="categoryId" id="" class="form-control form-control-sm" required>
                            <option value="">None</option>
                            @foreach($categories as $obj)
                                <option value="{{$obj->id}}">{{$obj->category_name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mt-2 mb-2">
                        <label for="">Publisher</label>
                        <select name="publisherId" id="" class="form-control form-control-sm" required>
                            <option value="">None</option>
                            @foreach($publisher as $obj)
                                <option value="{{$obj->id}}">{{$obj->publisher_name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mt-2 mb-2">
                        <label for="">Author</label>
                        <select name="authorId" id="" class="form-control form-control-sm" required>
                            <option value="">None</option>
                            @foreach($author as $obj)
                                <option value="{{$obj->id}}">{{$obj->author_name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mt-2 mb-2">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
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

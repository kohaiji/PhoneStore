<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>
    <link rel="icon" href="img/book-logo.png" type="image">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

{{--HEADER--}}
@include('client.header')
{{--HEADER--}}

<section class = "hero-page">
    <div class = "hero-bg">
        <h2>Shop</h2>
        <div class = "line">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <p class = "text">
            All books are sell here!
        </p>
    </div>

    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="padding-left: 30px;">

                    <div class="row">
                        <h4 class="text-center text-black mt-2">BOOKS</h4>
                        <!-- Dropdown Menu For Filtering -->
                        <div class="dropdown mt-3 d-flex justify-content-evenly align-items-center">
                        <h4 class="mt-1 text-center">Filter:</h4>

                            <select class="btn btn-outline-secondary dropdown-toggle fw-bold" id="dropdownMenuButton" onchange="location = this.value;">
                                <option value="" disabled selected hidden>Category</option>
                                <option value="/shop">Show All</option>
                                @foreach($category as $obj)
                                    <option value="/shop/{{$obj->category_name}}">{{$obj->category_name}}</option>
                                @endforeach


                            </select>

                            <select class="btn btn-outline-secondary dropdown-toggle fw-bold" id="dropdownMenuButton" onchange="location = this.value;">
                                <option value="" disabled selected hidden>Publisher</option>
                                <option value="/shop">Show All</option>
                                @foreach($publisher as $obj)
                                    <option value="/shop/{{$obj->publisher_name}}">{{$obj->publisher_name}}</option>
                                @endforeach
                            </select>

                            <select class="btn btn-outline-secondary dropdown-toggle fw-bold" id="dropdownMenuButton" onchange="location = this.value;">
                                <option value="" disabled selected hidden>Author</option>
                                <option value="/shop">Show All</option>
                                @foreach($author as $obj)
                                    <option value="/shop/{{$obj->author_name}}">{{$obj->author_name}}</option>
                                @endforeach
                            </select>

                            <select class="btn btn-outline-secondary dropdown-toggle fw-bold" id="dropdownMenuButton" onchange="location = this.value;">
                                <option value="" disabled selected hidden>Sort</option>
                                <option value="/shop">Show All</option>
                                <option value="/shop/az">Sort A -> Z</option>
                                <option value="/shop/za">Sort Z -> A</option>
                                <option value="/shop/priceAsc">Sort By Price (Low -> High)</option>
                                <option value="/shop/priceDesc">Sort By Price (High -> Low)</option>
                            </select>
                        </div>

                    </div>

                    <div>&nbsp;</div>

                    <div class="row">
                        @foreach($products as $obj)
                        <div class="col-3">
                            <a href="/product-details/{{$obj->id}}"><img src="/image_product/{{$obj -> image}}" class="product-image"> </a>
                            <h4><b>{{$obj->product_name}}</b></h4>
                            <p>Description: {{$obj->description}}</p>
                            <p>Category: {{$obj->category_name}}</p>
                            <p>Publisher: {{$obj->publisher_name}}</p>
                            <p>Author: {{$obj->author_name}}</p>
                            <p>Price: {{$obj->price}} đ</p>
                            <a href="/product-details/{{$obj->id}}" class="btn btn-success button-text"><i class="far fa-eye" aria-hidden="true"></i> View Details</a>
                            <div>&nbsp;</div>
                        </div>
                        @endforeach
                        {{$products->links()}}
                    </div>
                    <!-- Sorting by <div class="row"> -->

                    <div>&nbsp;</div>

                </div>
                <!--END  <div class="col-lg-9">-->

            </div>
        </div>
    </section>
</section>

{{--FOOTER--}}
@include("client.footer")
{{--FOOTER--}}

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!--Custom JS file link-->
    <script src="/js/script.js"></script>
</body>
</html>

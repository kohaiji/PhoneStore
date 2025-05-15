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
        <h2>Order History</h2>
        <div class = "line">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <p class = "text">
            List of your orders!!!
        </p>
    </div>

    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="padding-left: 30px;">
                    <div>&nbsp;</div>

                    <div class="row">
                        @if(count($orders) == 0)
                            <h4>There are no orders!!</h4>
                        @endif
                        @foreach($orders as $i => $obj)
                            <div class="col-3">
                                <h4>Order: {{$i + 1}}</h4>
{{--                                <h5>Book Title: {{$obj->product_name}}</h5>--}}
{{--                                <p>Quantity: {{$obj->quantity}}</p>--}}
{{--                                <p>Price: {{$obj->price}} đ</p>--}}
{{--                                <p><img src="/image_product/{{$obj -> image}}" class="product-image"> </p>--}}
                                <p>Full Name: {{$obj->full_name}}</p>
                                <p>Address: {{$obj->address}}</p>
                                <p>Phone Number: {{$obj->phone}}</p>
                                <h6>Status: {{$obj->status}}</h6>
                                <h5>Total: {{$obj->total}} đ</h5>
                                <a href="/order-details/{{$obj->id}}/{{$i + 1}}" class="btn btn-success btn-sm"><i class="far fa-eye" aria-hidden="true"></i> View Details</a> <br>
                                @if($obj->status == "PENDING" || $obj->status == "CONFIRMED")
                                    <a onclick="return confirm('Are you sure to cancel the order?')" class="btn btn-danger btn-sm mt-1" href="/order-update-status/{{$obj->id}}/CANCELED">Cancel Order</a>
                                @elseif($obj->status == "SHIPPING")
                                    <a onclick="return confirm('Are you received the order?')" class="btn btn-primary btn-sm mt-1" href="/order-update-status/{{$obj->id}}/RECEIVED">Received Order</a>
                                @else

                                @endif
                                <div>&nbsp;</div>
                            </div>
                        @endforeach
                        {{$orders->links()}}
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore | Product Details</title>
    <link rel="icon" href="/image/book-logo.png" type="image">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<style>
    img {
        width: 600px;
        height: 660px;
    }
</style>

<body>

{{--HEADER--}}
@include('client.header')
{{--HEADER--}}

<section class="product-details-page">
    <div class="product-details-container">
        <div class = "card-wrapper">
            <div class = "card">
                <div class = "product-imgs">
                    <div class = "img-display">
                        <div class = "img-showcase">
                            <img src = "/image_product/{{$products->image}}">
                        </div>
                    </div>
                </div>
                <div class = "product-content">
                    <h2 class = "product-title">{{$products->product_name}}</h2>
                    <div class = "product-rating">
                        <i class = "fas fa-star"></i>
                        <i class = "fas fa-star"></i>
                        <i class = "fas fa-star"></i>
                        <i class = "fas fa-star"></i>
                        <i class = "fas fa-star-half-alt"></i>
                        <span>4.7(21)</span>
                    </div>

                    <div class = "product-price">
                        <h4>Price: <span>{{$products->price}} đ</span></h4>
                    </div>

                    <h4>In Stock:
                        @if($products->stock > 0)
                            {{$products->stock}} <i style="color: green" class="fas fa-check"></i>
                        @else
                            {{"0"}} <i style="color: red" class="fas fa-times"></i>
                        @endif
                    </h4>

                    <div class = "product-detail">
                        <ul>
                            <li><p>ISBN Code: {{$products->isbn_code}}</p></li>
                            <li><p>Description: {{$products->description}}</p></li>
                            <li><p>Category: {{$products->category_name}}</p></li>
                            <li><p>Publisher: {{$products->publisher_name}}</p></li>
                            <li><p>Author: {{$products->author_name}}</p></li>
                        </ul>
                    </div>

                    <div class = "purchase-info">
                        <input type = "number" id="quantity" min = "1" value = "1" max="{{$products->stock}}" oninput="validateNumber(this)">
                        <a href="#" id="btnAddToCart" attrId="{{$products->id}}" type="button"><i class = "fas fa-shopping-cart"></i>
                            Add to Cart
                        </a>
                        <script>
                            var isLoggedIn = @json(auth()->check());
                        </script>
                        <script src="/js/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#btnAddToCart').click(function(e) {
                                    e.preventDefault(); // Ngăn chặn việc truy cập đến đường dẫn mặc định

                                    if (!isLoggedIn) {
                                        // Các thao tác nếu người dùng chưa đăng nhập
                                        swal({
                                            title: "Warning!",
                                            text: "You must be logged in to make a purchase.",
                                            icon: "warning",
                                            buttons: true,
                                        }).then((willLogin) => {
                                            if (willLogin) {
                                                window.location.href = "/login"; // Chuyển hướng người dùng đến trang đăng nhập
                                            }
                                        });
                                    } else {
                                        // Thêm đoạn kiểm tra số lượng hàng còn trước khi thực hiện thêm vào giỏ
                                        let stock = parseInt('{{$products->stock}}');
                                        if (stock > 0) {
                                            // Nếu còn hàng, thực hiện thêm vào giỏ
                                            let quantity = $("#quantity").val();
                                            let id = $(this).attr("attrId");
                                            if(quantity > stock){
                                                swal({
                                                    title: "Exceed stock quantity!",
                                                    text: "The quantity you entered is higher than the stock quantity.",
                                                    icon: "error",
                                                });
                                                return;
                                            }
                                            window.location.href = '/add-to-cart/' + id + '/' + quantity;
                                        } else {
                                            // Hiển thị thông báo hết hàng
                                            swal({
                                                title: "Out of Stock!",
                                                text: "This product is currently out of stock.",
                                                icon: "error",
                                            });
                                        }
                                    }
                                });
                            });

                            function validateNumber(input) {
                                var value = parseFloat(input.value);
                                if (value < 1) {
                                    input.value = "";
                                }
                            }

                            // $(function () {
                            //     $("#btnAddToCart").click(function () {
                            //         let quantity = $("#quantity").val();
                            //         let id = $("#btnAddToCart").attr("attrId");
                            //
                            //         location.href = "/add-to-cart/" + id + "/" + quantity;
                            //     });
                            // });

                        </script>
{{--                        <button type = "button" class = "btn"> <i class = "fas fa-heart"></i> Add to Wishlist</button>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="related">
<div class="featured" id="featured">
    <h1 class="heading"><span>Related Products</span></h1>
    <div class="swiper featured-slider">
        <div class="swiper-wrapper">
            @foreach($productRelated as $obj)
                <div class="swiper-slide box">
                    <div class="featured-icons">
{{--                        <a href="#" class="fas fa-search"></a>--}}
{{--                        <a href="#" class="fas fa-heart"></a>--}}
{{--                        <a href="product-details/{{$obj->id}}" class="fas fa-eye"></a>--}}
                        <a href="{{$obj->id}}" class="fas fa-eye"></a>
                    </div>
                    <div class="images">
                        <img src="/image_product/{{$obj->image}}" style="height: 200px; width: 200px">
                    </div>
                    <div class="content">
                        <h3><a >{{$obj->product_name}}</h3>
                        <div class="price">{{$obj->price}} đ</div>
                        <p class="text-dark fs-5 fw-bold mb-0">{{$obj->description}}</p>
{{--                        <a href="cart" class="featured-btn">Add to Cart</a>--}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</div>
</section>

{{--FOOTER--}}
@include("client.footer")
{{--FOOTER--}}


<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!--JS file link-->
<script src="/js/script.js"></script>

</body>
</html>


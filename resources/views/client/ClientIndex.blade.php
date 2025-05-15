<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>
    <link rel="icon" href="img/book-logo.png" type="image">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
</head>

<body>

{{--HEADER--}}
@include('client.header')
{{--HEADER--}}

<!-- Hero Section -->

<section class="hero" id="hero">

    <div class="row">

        <div class="content">
            <h1>Get books up to 50% Off!</h1>
            <p>A person who won’t read has no advantage over one who can’t read.</p>
            <a href="/shop" class="hero-btn">Shop Now</a>
        </div>

        <div class="swiper books-slider">
            <div class="swiper-wrapper">
                @foreach($products as $obj)
                    <a href="#" class="swiper-slide"><img style="height: 550px; width: 460px" src="/image_product/{{$obj -> image}}" alt=""></a>
                @endforeach
{{--                <a href="#" class="swiper-slide"><img src="image/deep-as-sky.jpg" alt=""></a>--}}
{{--                <a href="#" class="swiper-slide"><img src="image/mocking-jay.jpg" alt=""></a>--}}
{{--                <a href="#" class="swiper-slide"><img src="image/throne-of-glass.jpg" alt=""></a>--}}
{{--                <a href="#" class="swiper-slide"><img src="image/the-burning-god.jpg" alt=""></a>--}}
{{--                <a href="#" class="swiper-slide"><img src="image/catching-fire.jpg" alt=""></a>--}}
            </div>
        </div>
    </div>

</section>

<section class="support">

    <div class="support-icons">
        <i class="fas fa-plane"></i>
        <div class="support-content">
            <h3>Free Shipping</h3>
            <p>Orders over $100</p>
        </div>
    </div>

    <div class="support-icons">
        <i class="fas fa-headset"></i>
        <div class="support-content">
            <h3>24/7 Support</h3>
            <p>Call us anytime</p>
        </div>
    </div>

    <div class="support-icons">
        <i class="fas fa-lock"></i>
        <div class="support-content">
            <h3>Secure Payment</h3>
            <p>100% secure payment</p>
        </div>
    </div>

    <div class="support-icons">
        <i class="fas fa-arrow-rotate-left"></i>
        <div class="support-content">
            <h3>Easy Return</h3>
            <p>7 days return</p>
        </div>
    </div>
</section>

{{--<section class="featured" id="featured">--}}
{{--    <h1 class="heading"><span>Featured Books</span></h1>--}}
{{--    <p>Check out our selection of books on sale</p>--}}
{{--    <div class="swiper featured-slider">--}}
{{--        <div class="swiper-wrapper">--}}
{{--            @foreach($products as $obj)--}}
{{--            <div class="swiper-slide box">--}}
{{--              --}}
{{--                <div class="featured-icons">--}}
{{--                    <a href="#" class="fas fa-search"></a>--}}
{{--                    <a href="#" class="fas fa-heart"></a>--}}
{{--                    <a href="product-details/{{$obj->id}}" class="fas fa-eye"></a>--}}
{{--                </div>--}}
{{--                <div class="images">--}}
{{--                    <img src="image/{{$obj->image}}">--}}
{{--                </div>--}}
{{--                <div class="content">--}}
{{--                    <h3><a >{{$obj->product_name}}</h3>--}}
{{--                    <div class="price">${{$obj->price}}<span>$821.88</span></div>--}}
{{--                    <p class="text-dark fs-5 fw-bold mb-0">{{$obj->description}}</p>--}}
{{--                    <a href="cart" class="featured-btn">Add to Cart</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    --}}

    <section class="featured" id="featured">
        <h1 class="heading"><span>Featured Books</span></h1>
        <p>Check out our selection of books on sale</p>
        <div class="swiper featured-slider">
            <div class="swiper-wrapper">
                @foreach($products as $obj)
                <div class="swiper-slide box">
                    <div class="featured-icons">
{{--                        <a href="#" class="fas fa-search"></a>--}}
{{--                        <a href="#" class="fas fa-heart"></a>--}}
                        <a href="/product-details/{{$obj->id}}" class="fas fa-eye"></a>
                    </div>
                    <div class="images">
                        <img src="/image_product/{{$obj->image}}" style="width: 200px; height: 300px">
                    </div>
                    <div class="content">
                        <h3><a >{{$obj->product_name}}</h3>
                        <div class="price">{{$obj->price}} đ</div>
                        <p class="text-dark fs-5 fw-bold mb-0">{{$obj->description}}</p>
{{--                        <a href="#" class="featured-btn">Add to Cart</a>--}}
                    </div>
                </div>
        @endforeach
</section>

{{--<section class="arrivals" id="arrivals">--}}

{{--    <h1 class="heading"><span>New Arrivals</span></h1>--}}
{{--    <p>New books are here! Find the perfect book for you.</p>--}}

{{--    <div class="swiper arrivals-slider">--}}

{{--        <div class="swiper-wrapper">--}}
{{--            @foreach($products as $obj)--}}
{{--                <a href="#" class="swiper-slide box">--}}
{{--                    <div class="arrivals-image">--}}
{{--                        <img src="/image_product/{{$obj -> image}}" alt="" style="width: 200px; height: 200px">--}}
{{--                    </div>--}}
{{--                    <div class="arrivals-content">--}}
{{--                        <h3>{{$obj -> product_name}}</h3>--}}
{{--                        <div class="arrivals-price">{{$obj -> price}} đ</div>--}}
{{--                        <div class="arrivals-stars">--}}
{{--                            <i class="fas fa-star"></i>--}}
{{--                            <i class="fas fa-star"></i>--}}
{{--                            <i class="fas fa-star"></i>--}}
{{--                            <i class="fas fa-star"></i>--}}
{{--                            <i class="fas fa-star"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            @endforeach--}}


{{--            <a href="#" class="swiper-slide box">--}}
{{--                <div class="arrivals-image">--}}
{{--                    <img src="img/book-12.jpg" alt="">--}}
{{--                </div>--}}
{{--                <div class="arrivals-content">--}}
{{--                    <h3>Yellowface</h3>--}}
{{--                    <div class="arrivals-price">&#8369;666.66<span>&#8369;999.99</span></div>--}}
{{--                    <div class="arrivals-stars">--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star-half-alt"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}

{{--            <a href="#" class="swiper-slide box">--}}
{{--                <div class="arrivals-image">--}}
{{--                    <img src="img/book-13.jpg" alt="">--}}
{{--                </div>--}}
{{--                <div class="arrivals-content">--}}
{{--                    <h3>Deep As The Sky, Red As The Sea</h3>--}}
{{--                    <div class="arrivals-price">&#8369;666.66<span>&#8369;999.99</span></div>--}}
{{--                    <div class="arrivals-stars">--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star-half-alt"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}

{{--            <a href="#" class="swiper-slide box">--}}
{{--                <div class="arrivals-image">--}}
{{--                    <img src="img/book-14.jpg" alt="">--}}
{{--                </div>--}}
{{--                <div class="arrivals-content">--}}
{{--                    <h3>Alone With You In The Ether</h3>--}}
{{--                    <div class="arrivals-price">&#8369;666.66<span>&#8369;999.99</span></div>--}}
{{--                    <div class="arrivals-stars">--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star-half-alt"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}

{{--            <a href="#" class="swiper-slide box">--}}
{{--                <div class="arrivals-image">--}}
{{--                    <img src="img/book-15.jpg" alt="">--}}
{{--                </div>--}}
{{--                <div class="arrivals-content">--}}
{{--                    <h3>Daisy Jones & The Six</h3>--}}
{{--                    <div class="arrivals-price">&#8369;666.66<span>&#8369;999.99</span></div>--}}
{{--                    <div class="arrivals-stars">--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star-half-alt"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}

{{--            <a href="#" class="swiper-slide box">--}}
{{--                <div class="arrivals-image">--}}
{{--                    <img src="img/book-16.jpg" alt="">--}}
{{--                </div>--}}
{{--                <div class="arrivals-content">--}}
{{--                    <h3>If We Were Villains</h3>--}}
{{--                    <div class="arrivals-price">&#8369;666.66<span>&#8369;999.99</span></div>--}}
{{--                    <div class="arrivals-stars">--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star-half-alt"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}

{{--            <a href="#" class="swiper-slide box">--}}
{{--                <div class="arrivals-image">--}}
{{--                    <img src="img/book-17.jpg" alt="">--}}
{{--                </div>--}}
{{--                <div class="arrivals-content">--}}
{{--                    <h3>The Secret History</h3>--}}
{{--                    <div class="arrivals-price">&#8369;666.66<span>&#8369;999.99</span></div>--}}
{{--                    <div class="arrivals-stars">--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star-half-alt"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}

{{--            <a href="#" class="swiper-slide box">--}}
{{--                <div class="arrivals-image">--}}
{{--                    <img src="img/book-18.jpg" alt="">--}}
{{--                </div>--}}
{{--                <div class="arrivals-content">--}}
{{--                    <h3>Normal People</h3>--}}
{{--                    <div class="arrivals-price">&#8369;666.66<span>&#8369;999.99</span></div>--}}
{{--                    <div class="arrivals-stars">--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star-half-alt"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}

{{--            <a href="#" class="swiper-slide box">--}}
{{--                <div class="arrivals-image">--}}
{{--                    <img src="img/book-19.jpg" alt="">--}}
{{--                </div>--}}
{{--                <div class="arrivals-content">--}}
{{--                    <h3>The Picture of Dorian Gray</h3>--}}
{{--                    <div class="arrivals-price">&#8369;666.66<span>&#8369;999.99</span></div>--}}
{{--                    <div class="arrivals-stars">--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star-half-alt"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}

{{--            <a href="#" class="swiper-slide box">--}}
{{--                <div class="arrivals-image">--}}
{{--                    <img src="img/book-20.png" alt="">--}}
{{--                </div>--}}
{{--                <div class="arrivals-content">--}}
{{--                    <h3>The Master & Margarita</h3>--}}
{{--                    <div class="arrivals-price">&#8369;666.66<span>&#8369;999.99</span></div>--}}
{{--                    <div class="arrivals-stars">--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star"></i>--}}
{{--                        <i class="fas fa-star-half-alt"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<section class="deal">
    <div class="content">
        <h3>Deal of the Day</h3>
        <h1>Enjoy Exclusive Discounts on Books Today!</h1>
        <p>Indulge your passion for reading while saving big with our exclusive selection of discounted books. Explore a treasure trove of literary gems at unbeatable prices, where quality meets affordability. </p>
        <a href="/shop" class="deal-btn">Shop Now</a>
    </div>

    <div class="image">
        <img src="img/deal.jpg" alt="">
    </div>
</section>

<section class="reviews" id="reviews">
    <h1 class="reviews-heading"><span>Client's Reviews</span></h1>
    <div class="swiper reviews-slider">
        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <img src="img/people-1.jpg" alt="">
                <h3>Mary Jane</h3>
                <p>Interesting!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="img/people-2.jpg" alt="">
                <h3>Juan Cruz</h3>
                <p>A lot of good books!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="img/people-3.jpg" alt="">
                <h3>Crisostomo Ibarra</h3>
                <p>The books are really useful.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="img/people-6.jpg" alt="">
                <h3>Queen Charlotte</h3>
                <p>Very Nice!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

        </div>
    </div>
</section>

{{--FOOTER--}}
@include("client.footer")
{{--FOOTER--}}

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!--Custom JS file link-->
<script src="/js/script.js"></script>

</body>
</html>


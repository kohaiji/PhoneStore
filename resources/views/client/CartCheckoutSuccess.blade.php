<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Success !</title>
    <link rel="icon" href="img/book-logo.png" type="image">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
</head>
    <style>
        .header-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-left: 50px;
        }
        .heart {
            display: flex;
            align-items: center;
        }

        body {
            background-image: linear-gradient(#3f2874,#6e07696f ),url('img/background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        h1 {
            text-align: center;
            align-content: center;
            padding: 1rem;
        }

        #page-wrap {
            position: relative;
            z-index: 2;
            width: 30%;
            border-radius: 15px;
            margin: 50px auto;
            margin-top: 150px;
            padding: 10px 30px;
            background: rgba(255, 255, 255, 0.7); /* Updated background with 30% transparency */
            box-shadow: 0 0 20px black;
            padding-bottom: 5rem;
        }


    </style>
</head>
<body>

{{--HEADER--}}
@include('client.header')
{{--HEADER--}}

<form action="cart/checkout" method="post">
    <div id="page-wrap">
            <div class="small-container cart-page">
                <h1>Checkout Successfully</h1>
                <a href="/ClientIndex"><h2 style="text-align: center;">GO BACK</h2></a>
            </div>
    </div>






<!--Custom JS file link-->
<script src="/js/script.js"></script>
</body>
</html>

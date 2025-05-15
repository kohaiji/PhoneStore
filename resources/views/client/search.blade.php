<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookStore</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        section {
            font-family: Poppins, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }

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
            background-image: linear-gradient(#3f2874,#6e07696f ),url('img/background2.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        #page-wrap {
            position: relative;
            z-index: 2;
            width: 600px;
            border-radius: 15px;
            margin: 50px auto;
            margin-top: 25%; /* Updated margin-top value */
            padding: 20px;
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 20px black;
            list-style: none;
            padding: 10px;
        }

        #page-wrap .book-item:not(:last-child) {
            border-bottom: 5px solid #3f2874;
            padding-bottom: 20px;
        }

        .pqs {
            display: flex;
            justify-content: space-between;
        }

        #bookList img{
            width: 250px;
            height: auto;
            align-items: center;
        }

        .container {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 500px;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 60px;
            padding: 30px 20px;
        }

        #searchInput {
            font-size: 20px;
        }

        .book-item {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
            background-color: rgba(255, 255, 255, 0); /* Set the background color to 100% transparent */
            padding: 20px;
            width: 300px;
            margin: 5px auto;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .book-item img{
            width: 250px;
            height: auto;
        }

        #bookList {
            margin-top: 10%;
            list-style: none;
            padding: 0;
        }

        .content h3 {
            color: black;
        }

        .content .price span {
            text-decoration: line-through;
            color: black;
        }



    </style>
</head>

<body>
{{--HEADER--}}
@include('client.header')
{{--HEADER--}}

<section>
    <form action="" method="get">
        <div class="row">
            <input class="container" type="text" id="searchInput" placeholder="Search..." value="{{$data}}" name="data">
        </div>
    </form>


    <div id="page-wrap">
        @foreach($products as $obj)
        <ul id="bookList">
            <li class="book-item">
                <img src="/image_product/{{$obj->image}}" alt="Book Cover">
                <div class="content">
                    <h3>{{$obj->product_name}}</h3>
                    <div class="">
                        <h4>{{$obj->price}} đ</h4>
                    </div>
                    <p>{{$obj->description}}</p>
                    <a href="/product-details/{{$obj->id}}" class="btn btn-success button-text"><i class="far fa-eye" aria-hidden="true"></i> View Details</a>
                </div>
            </li>
        </ul>
            @endforeach
    </div>

{{--    <script>--}}
{{--        const searchInput = document.getElementById('searchInput');--}}
{{--        const bookList = document.getElementById('bookList');--}}
{{--        const books = bookList.getElementsByTagName('li');--}}

{{--        searchInput.addEventListener('input', function() {--}}
{{--            const searchTerm = searchInput.value.toLowerCase();--}}

{{--            Array.from(books).forEach(function(book) {--}}
{{--                const bookName = book.textContent.toLowerCase();--}}
{{--                if (bookName.includes(searchTerm)) {--}}
{{--                    book.style.display = 'block';--}}
{{--                } else {--}}
{{--                    book.style.display = 'none';--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        searchInput.addEventListener('keyup', function() {--}}
{{--            if (searchInput.value === '') {--}}
{{--                Array.from(books).forEach(function(book) {--}}
{{--                    book.style.display = 'block';--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
</section>


{{--FOOTER--}}
@include("client.footer")
{{--FOOTER--}}


<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!--Custom JS file link-->
<script src="/js/script.js"></script>



</body>
</html>

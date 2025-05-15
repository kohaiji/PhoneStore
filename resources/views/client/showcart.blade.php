<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore | Cart</title>
    <link rel="icon" href="img/book-logo.png" type="image">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

        .checkout-button {
            position: relative;
            top: 20px;
            right: -1150px;
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .checkout-button:hover {
            background-color: #45a049;
        }

        #page-wrap {
            position: relative;
            z-index: 2;
            width: 80%;
            border-radius: 15px;
            margin: 50px auto;
            margin-top: 150px;
            padding: 10px 30px;
            background: rgba(255, 255, 255, 0.7); /* Updated background with 30% transparency */
            box-shadow: 0 0 20px black;
            padding-bottom: 5rem;
        }

        .pqs {
            display: flex;
            justify-content: space-between;
        }

        .cart {
            padding: 15px 10px;
            height: 30px;
            cursor: pointer;
            margin: 5px;
            margin-left: .9rem;
            display: flex;
            align-content: center;
            align-items: center;
            text-align: center;
            background: #3f2874;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            flex-wrap: wrap;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        .cart-info{
            display: flex;
            flex-wrap: wrap;

        }

        .cart-info {
            margin-top: 1rem;
        }

        .cart-info h3{
            padding: 1rem;
        }

        .cart-info p{
            padding: 1rem;
        }

        th{
            text-align: left;
            padding: 5px;
            color: #fff;
            background: #3f2874;
            font-weight: normal;
        }

        td{
            padding: 10px ;
        }

        td input{
            width: 40px;
            height: 30px;
            padding: 5px;
            background: rgba(255, 255, 255, 0.5);
        }

        .total-price{
            display: flex;
            justify-content: flex-end;
        }

        .total-price table{
            border-top: 3px solid #3f2874;
            width: 100%;
            max-width: 20%;

        }

        td:last-child{
            text-align: right;
        }

        th:last-child{
            text-align: right;
        }
        #total {
            font-size: 30px;
        }

    </style>
</head>
<body>
{{--HEADER--}}
@include('client.header')
{{--HEADER--}}


<div id="page-wrap">

    <div class="small-container cart-page">
        <h1>Shopping Cart</h1>

        <table>
            @if(count($cart) == [])
                <tr>
                    <td colspan="5"> Không có sản phẩm nào trong giỏ hàng</td>
                </tr>

            @else
                <div class="pqs">
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </div>
                <a href="/cartRemoveAll"><button class="cart">Remove All Items</button></a>
                @foreach($cart as $obj)
                    <tr>
                        <td>

                            <div class="cart-info">
                                <img src="/image_product/{{$obj->image}}" alt="wew" width="250px" height="auto" />
                                <div>
                                    <h3>Name: {{$obj->product_name}}"</h3>
                                    <p>Price: {{$obj->price}} đ</p>
                                    <p>Description: {{$obj->description}}</p>
                                    <p>Category: {{$obj->category_name}}</p>
                                    <p>Publisher: {{$obj->publisher_name}}</p>
                                    <p>Author: {{$obj->author_name}}</p>
                                    <a href="/cartRemove/{{$obj->id}}/{{$obj->quantity}}" type="submit"><button class="cart">Remove Item</button></a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a class="custom-minus" href="cart/update/sub/{{$obj->id}}/{{$obj->quantity}}">-</a>
                                {{$obj->quantity}}
                            <a class="custom-plus" href="cart/update/plus/{{$obj->id}}/{{$obj->quantity}}">+</a>
                        </td>
                        <td id="subtotal">{{$obj->price * $obj->quantity}} đ</td>
                    </tr>
                @endforeach
        </table>

        <div class="total-price">

            <table>
                <tr>
                    <td style="font-weight: bold" id="total" >Total</td>
                    <td id="total">{{$total}} đ</td>
                </tr>

            </table>
        </div>

        @endif
        @if(empty($cart))

        @else
            <a href="/checkout" class="checkout-button">Proceed to Checkout</a>
        @endif



    </div>
</div>

{{--FOOTER--}}
@include("client.footer")
{{--FOOTER--}}

<script>
    function removeImage(button) {
        var bookContainer = button.parentNode;
        bookContainer.parentNode.removeChild(bookContainer);
    }
</script>
<!--Custom JS file link-->
<script src="/js/script.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore | Checkout</title>
    <link rel="icon" href="img/book-logo.png" type="image">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
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
        #page-wrap2 {
            position: relative;
            z-index: 2;
            width: 30%;
            border-radius: 15px;
            margin: 50px auto;
            padding: 10px 30px;
            background: rgba(255, 255, 255, 0.7); /* Updated background with 30% transparency */
            box-shadow: 0 0 20px black;
            padding-bottom: 5rem;
        }
        #page-wrap3 {
            position: relative;
            z-index: 2;
            width: 30%;
            border-radius: 15px;
            margin: 50px auto;
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
            text-align: center;
            padding: 5px;
            color: #fff;
            background: #3f2874;
            font-weight: normal;
        }
        .agreement{
            text-align: left;
            text-align-last: center;
            /*align-items: left;*/
            padding: 15px;
            color: #000000;
            background: rgba(255, 255, 255, 0.7);
            font-weight: normal;
            font-size: 15px;
            float: left;
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
        }

        .total-price table{
            border-top: 3px solid #3f2874;
            width: 100%;
            max-width: 100%;

        }
        .total-price table{
            border-top: 3px solid #3f2874;
            width: 100%;
            max-width: 100%;
        }

        td:last-child{
            text-align: right;
        }

        th:last-child{
            text-align: right;
        }

        #check-input {
            border: 1px solid #ccc;
            padding: 5px 20px;
            font-size: 18px;
            border-radius: 5px;
            text-align: left;
            margin-bottom: 15px;
        }

        #total {
            font-size: 30px;
            font-weight: bold;
        }

        #btnPurchase {
            font-size: 30px;
            padding: 20px;

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
                <input type="hidden" name="total" value="{{$total}}">
                <input type="hidden" name="id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                <h1>Checkout</h1>
{{--                <div id="email">--}}
{{--                    @csrf--}}
{{--                    <div>--}}
{{--                        <label for="">Email: </label>--}}
{{--                        <input type="email" name="email" placeholder="Enter your Email" id="check-input" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" required>--}}
{{--                    </div>--}}
{{--                </div>--}}

            <div id="fullName">
                @csrf
                <div>
                    <label for="">Full Name: </label>
                    <input style="font-weight: bold" type="text" name="fullName" placeholder="Enter your full name" id="check-input" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" required>

                </div>
            </div>

                <div id="email">
                    <div>
                        <label for="">Email: </label>
                        <input style="font-weight: bold" type="email" name="email" placeholder="Enter your email" id="check-input" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" disabled required>
                        <input type="hidden" name="email" placeholder="Enter your email" id="check-input" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                    </div>
                </div>

                <div id="phone_number">
                    <div>
                        <label for="">Phone Number: </label>
                        <input style="font-weight: bold" type="number" name="phone_display" placeholder="Enter your phone number" id="check-input" value="{{ \Illuminate\Support\Facades\Auth::user()->phone }}" required disabled>
                        <input type="hidden" name="phone" value="{{ \Illuminate\Support\Facades\Auth::user()->phone }}">
                    </div>
                </div>

                <div id="address">
                    <div>
                        <label for="">Address: </label>
                        <input type="text" name="address" placeholder="Enter your address" id="check-input" value="{{\Illuminate\Support\Facades\Auth::user()->address}}" required>
                    </div>
                </div>

                <div id="payment">
                    <div>
                        <label for="">Payment Method: </label>
                        <input style="font-weight: bold" type="text" name="payment" id="check-input" value="Cash On Delivery" disabled required>
                    </div>
                </div>

            </div>
    </div>
    <div id="page-wrap2">
        <div class="small-container cart-page">
            @foreach($cart as $obj)
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="/image_product/{{$obj->image}}" alt="img" width="150" height="auto" />
                        <div>
                            <h3>{{$obj->product_name}}</h3>
                            <p>Price: {{$obj->price}} đ</p>
                            <p>Quantity: {{$obj->quantity}}</p>
                            <p>Subtotal: {{$obj->price * $obj->quantity}} đ</p>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </div>
    </div>




    <div id="page-wrap3">
        <div class="total-price">

            <table>
{{--                <tr>--}}
{{--                    <td>Tax</td>--}}
{{--                    <td>10$</td>--}}
{{--                </tr>--}}
                <tr>
                    <td id="total">Total</td>
                    <td id="total">{{$total}} đ</td>
                </tr>


    {{--            <tr>--}}
    {{--                <th class="agreement">--}}
    {{--                    <input type="checkbox" id="Terms" name="terms" value="Bike" class="TAS">--}}
    {{--                    <label for="Terms"> I agree to the terms of the Story Bound User Agreement (last updated 13 June, 2022.)</label>--}}
    {{--                </th>--}}
    {{--            </tr>--}}

    {{--            <td class="payment">--}}
    {{--                <p>Payment Options:</p>--}}
    {{--                <input type="radio" id="Paypal" name="pm" value="HTML">--}}
    {{--                <label for="Paypal">Paypal</label><br>--}}
    {{--                <input type="radio" id="Master" name="pm" value="CSS">--}}
    {{--                <label for="Master">Master Card</label><br>--}}
    {{--                <input type="radio" id="Gcash" name="pm" value="JavaScript">--}}
    {{--                <label for="Gcash">Gcash</label>--}}
    {{--            </td>--}}
                <td>
                    <button class="cart" id="btnPurchase">Purchase</button>
                </td>

            </table>
        </div>

    </div>
</form>



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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore | Contact</title>
    <link rel="icon" href="img/book-logo.png" type="image">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>


<body>

{{--HEADER--}}
@include('client.header')
{{--HEADER--}}

<section class = "hero-page">
    <div class = "hero-bg">
        <h3>BookStore</h3>
        <h2>contact us</h2>
        <div class = "line">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <p class = "text">Tell us what you think. It will help us become better. Thanks.</p>
    </div>

    <div class = "contact-body">
        <div class = "contact-info">
            <div>
                <span><i class = "fas fa-map-marker-alt"></i></span>
                <span>Address</span>
                <span class = "text">Viet Nam</span>
            </div>
            <div>
                <span><i class = "fas fa-mobile-alt"></i></span>
                <span>Phone Number</span>
                <span class = "text">1-234-567-890</span>
            </div>
            <div>
                <span><i class = "fas fa-envelope-open"></i></span>
                <span>E-mail</span>
                <span class = "text">lamtran7065@gmail.com</span>
                <span class = "text">ntg1611@gmail.com</span>
            </div>
            <div>
                <span><i class = "fas fa-clock"></i></span>
                <span>Working Time</span>
                <span class = "text">Mon - Fri (9:00 AM to 5:00 PM)</span>
            </div>
        </div>

        <div class = "contact-form">
            <form>
                <h1>Send us a message</h1>
                <p>If you have any concern from us or any types of queries related to our services, you can send us message from here. It's our pleasure to help you.</p>
                <div>
                    <input type = "text" class = "form-control" placeholder="First Name">
                    <input type = "text" class = "form-control" placeholder="Last Name">
                </div>
                <div>
                    <input type = "email" class = "form-control" placeholder="E-mail">
                    <input type = "text" class = "form-control" placeholder="Phone">
                </div>
                <textarea rows = "5" class = "form-control" placeholder="Message"></textarea>
                <input type = "submit" class = "send-btn" value = "Send">
            </form>
        </div>
</div>
</section>


{{--FOOTER--}}
@include("client.footer")
{{--FOOTER--}}

<!--Custom JS file link-->
<script src="/js/script.js"></script>

</body>
</html>

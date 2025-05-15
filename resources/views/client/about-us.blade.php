<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore | About Us</title>
    <link rel="icon" href="img/book-logo.png" type="image">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

{{--HEADER--}}
    @include('client.header')
{{--HEADER--}}

<section class="about-us">
    <div class="about-container">
        <div class = "image"></div>

        <div class = "about-us content">
            <h1>About Us</h1>
                <span></span>
                <p>Welcome to BookStore, where we use technology and the internet to connect readers with quality books. Our mission is to foster a community of passionate readers and writers, and our vision is to make reading a part of modern life. Join us and discover your next great read!</p>

                <div class="social">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                </div>
        </div>
    </div></section>

<section class="mission-statement">
    <div class="about-header">
        <h1>Mission Statement</h1>
    </div>
    <div class="sub-container">
        <div class="statements">
            <i class="fa fa-bullseye"></i>
            <div class="stat">Mission </div>
            <div class="stat-p">Our mission is to provide easy access to a vast collection of books through the internet, while enhancing the reading experience with modern features, to foster a culture of lifelong learning and enlightenment
            </div>
        </div>

        <div class="statements">
            <i class="fa-sharp fa-regular fa-eye"></i>
            <div class="stat">VISION </div>
            <div class="stat-p">Our vision is to utilize the internet to make books easily accessible in the modern era, while upholding the tradition of reading. We aim to promote a culture of continuous learning and enlightenment through the latest technology.
            </div>
        </div>

        <div class="statements">
            <i class="fa-sharp fa-regular fa-gem"></i>
            <div class="stat">CORE VALUES </div>
            <div class="stat-p">Our core values revolve around a deep appreciation for literature's transformative impact, while cultivating an inclusive environment that encourages learning, exploration, and caters to diverse interests and intellectual pursuits.
            </div>
        </div>
    </div>
</section>

{{--<section class="founders">--}}
{{--    <div class="about-header">--}}
{{--        <h1>Our Team</h1>--}}
{{--    </div>--}}
{{--    <div class="sub-container">--}}
{{--        <div class="teams">--}}
{{--            <img src="img/people-1.jpg" alt="">--}}
{{--            <div class="name">Esmay Stace</div>--}}
{{--            <div class="desig">Developer</div>--}}
{{--            <div class="about-founders">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum labore quam reprehenderit vitae aliquam dicta!--}}
{{--            </div>--}}

{{--            <div class="about-social-links">--}}
{{--                <a href="#"><i class="fab fa-facebook"></i></a>--}}
{{--                <a href="#"><i class="fab fa-instagram"></i></a>--}}
{{--                <a href="#"><i class="fab fa-twitter"></i></a>--}}
{{--                <a href="#"><i class="fab fa-github"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="teams">--}}
{{--            <img src="img/people-2.jpg" alt="">--}}
{{--            <div class="name">Cloe Cisneros </div>--}}
{{--            <div class="desig">Designer</div>--}}
{{--            <div class="about-founders">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum labore quam reprehenderit vitae aliquam dicta!--}}
{{--            </div>--}}

{{--            <div class="about-social-links">--}}
{{--                <a href="#"><i class="fab fa-facebook"></i></a>--}}
{{--                <a href="#"><i class="fab fa-instagram"></i></a>--}}
{{--                <a href="#"><i class="fab fa-twitter"></i></a>--}}
{{--                <a href="#"><i class="fab fa-github"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="teams">--}}
{{--            <img src="img/people-3.jpg" alt="">--}}
{{--            <div class="name">Sanjay Mullen </div>--}}
{{--            <div class="desig">Manager</div>--}}
{{--            <div class="about-founders">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum labore quam reprehenderit vitae aliquam dicta!--}}
{{--            </div>--}}

{{--            <div class="about-social-links">--}}
{{--                <a href="#"><i class="fab fa-facebook"></i></a>--}}
{{--                <a href="#"><i class="fab fa-instagram"></i></a>--}}
{{--                <a href="#"><i class="fab fa-twitter"></i></a>--}}
{{--                <a href="#"><i class="fab fa-github"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--FOOTER--}}
    @include("client.footer")
{{--FOOTER--}}

<!--Custom JS file link-->
<script src="/js/script.js"></script>

</body>
</html>

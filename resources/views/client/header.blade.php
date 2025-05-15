{{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}


<style>
    a {
        text-decoration: none;
    }

    /* Style the dropdown menu */
    .login-dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .login-dropdown-content {
        display: none;
        position: absolute;
        right: 20px; /* Sử dụng right ở đây để đẩy toàn bộ khối sang phải */
        background-color: #f9f9f9;
        min-width: 120px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .login-dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Show the dropdown menu on hover */
    .login-dropdown:hover .login-dropdown-content {
        display: block;
    }
</style>

<header>
    <div class="logo-container">
        <img src="/image/book-logo.png" alt="book-logo">
        <a href="/" class="logo">BookStore</a>
    </div>

    <nav class="nav">
        <a href="/ClientIndex">Home<span></span></a>
        <a href="/about-us">About<span></span></a>
        <a href="/shop">Shop<span></span></a>
        <a href="/feedback">Feedback<span></span></a>
{{--        <a href="/contact">Contact<span></span></a>--}}
    </nav>

    <div class="header-icons">
        <a href="/search"><i class="fa fa-search"></i></a>

        <a href="/cart"><i class="fa fa-shopping-cart" style="padding-left: 2px">({{ empty($cart) ? 0 : count($cart) }})</i></a>
        <a href="/order"><i class="fas fa-receipt"></i></a>
{{--        <i class="fa fa-sign-out"></i>--}}
        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="login-dropdown">
                @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                    <a href="/admin" class="login-btn">{{\Illuminate\Support\Facades\Auth::user()->name}}(Admin) </a>
                @else
                    <a href="#" class="login-btn">{{\Illuminate\Support\Facades\Auth::user()->name}} </a>
                @endif
{{--                <div class="login-dropdown-content">--}}
                    <a href="/logout"><i class="fa fa-sign-out"></i></a>
           </div>


    </div>
        @else
            <a href="/login" class="login-btn">Login</a>
        @endif

    </div>
</header>



<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="/admin" class="navbar-brand mx-4 mb-3">
            <h5 class="text-primary">ADMIN DASHBOARD</h5>
        </a>

        {{--            <div class="d-flex align-items-center ms-4 mb-4">--}}
        {{--                <div class="position-relative">--}}
        {{--                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">--}}
        {{--                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>--}}
        {{--                </div>--}}
        {{--                <div class="ms-3">--}}
        {{--                    <span>Admin</span>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        <div class="navbar-nav w-100">
            <a href="/admin" class="nav-item nav-link @if ($activeMenu === 'dashboard') active @endif"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="/admin/product-list" class="nav-item nav-link @if ($activeMenu === 'product') active @endif"><i class="fa fa-th me-2"></i>Product</a>
            <a href="/admin/category-list" class="nav-item nav-link @if ($activeMenu === 'category') active @endif"><i class="fa fa-th me-2"></i>Category</a>
            <a href="/admin/author-list" class="nav-item nav-link @if ($activeMenu === 'author') active @endif"><i class="fa fa-th me-2"></i>Author</a>
            <a href="/admin/publisher-list" class="nav-item nav-link @if ($activeMenu === 'publisher') active @endif"><i class="fa fa-th me-2"></i>Publisher</a>
            <a href="/admin/order-list" class="nav-item nav-link @if ($activeMenu === 'order') active @endif"><i class="fa fa-th me-2"></i>Order</a>
            <a href="/admin/account-list" class="nav-item nav-link @if ($activeMenu === 'account') active @endif"><i class="fas fa-user me-2"></i>Account</a>
            <a href="/admin/stats" class="nav-item nav-link @if ($activeMenu === 'stats') active @endif"><i class="fa fa-chart-bar me-2"></i>Statistics</a>
            {{--                <div class="nav-item dropdown">--}}
            {{--                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>--}}
            {{--                    <div class="dropdown-menu bg-transparent border-0">--}}
            {{--                        <a href="signin.html" class="dropdown-item">Sign In</a>--}}
            {{--                        <a href="signup.html" class="dropdown-item">Sign Up</a>--}}
            {{--                        <a href="404.html" class="dropdown-item">404 Error</a>--}}
            {{--                        <a href="blank.html" class="dropdown-item">Blank Page</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
        </div>
    </nav>
</div>

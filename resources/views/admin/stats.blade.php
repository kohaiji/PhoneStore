<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/admincss/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/admincss/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
        @include('admin.sidebar')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        @include("admin.navbar")
        <!-- Navbar End -->


        <!-- Blank Start -->
        <div class="container-fluid pt-4 px-4">
            <h3>Statistics </h3>

        {{--REVENUE--}}
            <div class="row g-4">

                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Highest revenue month: {{$obj1->month}}/{{$obj1->year}}</p>
                            <h6 class="mb-0">{{$obj1->revenue}} đ</h6>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Highest revenue year: {{$obj2->year}}</p>
                            <h6 class="mb-0">{{$obj2->revenue}} đ</h6>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total revenue</p>
                            <h6 class="mb-0">{{$obj4->revenue}} đ</h6>
                        </div>
                    </div>
                </div>

            </div>

            {{--SPECIFIC REVENUE--}}
            <div class="row g-4 mt-2 col-6">
                <form class="input-group mb-4">
                    <i class="bi bi-calendar-date input-group-text"></i>
                    <input type="text" name="date" class="datepicker_input form-control" placeholder="Date" required aria-label="Date">
                    <button type="submit" class="btn btn-primary ms-3">OK</button>
                </form>
            </div>

            <div class="col-5">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <div class="ms-3">
                        <p class="mb-2">Revenue on: {{$date}}</p>
                        <h6 class="mb-0">
                            {{$obj3->revenue == null ? "0 đ" : $obj3->revenue." đ" }}
                        </h6>
                    </div>
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                </div>
            </div>

        </div>


        <!-- Blank End -->


        <!-- Footer Start -->

        <!-- Footer End -->
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
</div>

<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker-full.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/lib/chart/chart.min.js"></script>
<script src="/lib/easing/easing.min.js"></script>
<script src="/lib/waypoints/waypoints.min.js"></script>
<script src="/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="/lib/tempusdominus/js/moment.min.js"></script>
<script src="/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="/js/main.js"></script>

{{--<script>--}}
{{--    const getDatePickerTitle = elem => {--}}
{{--        // From the label or the aria-label--}}
{{--        const label = elem.nextElementSibling;--}}
{{--        let titleText = '';--}}
{{--        if (label && label.tagName === 'LABEL') {--}}
{{--            titleText = label.textContent;--}}
{{--        } else {--}}
{{--            titleText = elem.getAttribute('aria-label') || '';--}}
{{--        }--}}
{{--        return titleText;--}}
{{--    }--}}

{{--    // Tạo một biến global để lưu trữ giá trị date--}}
{{--    let selectedDate = '';--}}

{{--    const elems = document.querySelectorAll('.datepicker_input');--}}
{{--    for (const elem of elems) {--}}
{{--        const datepicker = new Datepicker(elem, {--}}
{{--            'format': 'dd/mm/yyyy', // UK format--}}
{{--            title: getDatePickerTitle(elem)--}}
{{--        });--}}

{{--        // Thêm event listener--}}
{{--        elem.addEventListener('change', function() {--}}
{{--            // Cập nhật biến khi giá trị input thay đổi--}}
{{--            selectedDate = this.value;--}}
{{--            console.log('Selected date:', selectedDate); // Bạn có thể gọi biến này ở bất kỳ đâu trong script của mình--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}

<script>
    const getDatePickerTitle = elem => {
        // From the label or the aria-label
        const label = elem.nextElementSibling;
        let titleText = '';
        if (label && label.tagName === 'LABEL') {
            titleText = label.textContent;
        } else {
            titleText = elem.getAttribute('aria-label') || '';
        }
        return titleText;
    }

    const elems = document.querySelectorAll('.datepicker_input');
    for (const elem of elems) {
        const datepicker = new Datepicker(elem, {
            'format': 'yyyy/mm/dd', // UK format
            title: getDatePickerTitle(elem)
        });
    }
</script>

</body>

</html>

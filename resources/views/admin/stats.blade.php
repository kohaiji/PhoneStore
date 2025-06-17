<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">

    <!-- Thêm ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
<div id="app">
    @include('admin.sidebar')
    <div id="main" class='layout-navbar'>
        @include('admin.navbar')

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Revenue Statistics</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Revenue Statistics</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bộ lọc thời gian -->
            <div class="card">
                <div class="card-header">
                    <h4>Time filter</h4>
                </div>
                <div class="card-body">
                    <form method="GET" class="row">
                        <div class="col-md-5">
                            <label>From</label>
                            <input type="date" name="start_date" value="{{ $startDate }}" class="form-control">
                        </div>
                        <div class="col-md-5">
                            <label>To</label>
                            <input type="date" name="end_date" value="{{ $endDate }}" class="form-control">
                        </div>
                        <div class="col-md-1 align-self-end">
                            <button type="submit" class="btn btn-primary btn-block">Apply</button>
                        </div>
                        <div class="col-md-1 align-self-end">
                            <a href="/admin/stats" class="btn btn-primary btn-block">Reset</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Thống kê nổi bật -->
            <div class="row">
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Top product</h6>
                                    <h3 class="font-extrabold mb-0">{{$bestSellers[0]->product_name}}</h3>
                                    <small>Best seller</small>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldStar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Top brand</h6>
                                    <h3 class="font-extrabold mb-0">{{$topBrands[0]->brand_name}}</h3>
                                    <small>Brand that sells the most products</small>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldStar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Monthly revenue</h6>
                                    <h3 class="font-extrabold mb-0">{{ number_format($currentMonthStats['revenue']) }}đ</h3>
                                    <small class="{{ $growthRate >= 0 ? 'text-success' : 'text-danger' }}">
                                        <i class="bi bi-arrow-{{ $growthRate >= 0 ? 'up' : 'down' }}"></i>
                                        {{ abs($growthRate) }}%
                                    </small>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldActivity"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Orders</h6>
                                    <h3 class="font-extrabold mb-0">{{ $currentMonthStats['orders'] }}</h3>
                                    <small>Current month</small>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldBag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Product sold</h6>
                                    <h3 class="font-extrabold mb-0">{{ $currentMonthStats['products'] }}</h3>
                                    <small>Current month</small>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldBuy"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Biểu đồ doanh thu theo ngày -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Revenue by day</h4>
                        </div>
                        <div class="card-body">
                            <div id="daily-revenue-chart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Biểu đồ và top sản phẩm -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Revenue for the last 6 months</h4>
                        </div>
                        <div class="card-body">
                            <div id="monthly-revenue-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Top 10 best selling products</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Product</th>
                                        <th>Sold</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bestSellers as $index => $product)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->total_sold }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script>
    // Biểu đồ doanh thu hàng ngày
    document.addEventListener('DOMContentLoaded', function() {
        // Biểu đồ doanh thu hàng ngày
        const dailyChart = new ApexCharts(document.querySelector("#daily-revenue-chart"), {
            series: [{
                name: "Revenue",
                data: @json($dailyRevenue->pluck('revenue')->map(fn($value) => (float)$value))
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: { enabled: false }
            },
            xaxis: {
                categories: @json($dailyRevenue->pluck('date'))
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return val.toLocaleString() + 'đ';
                    }
                }
            },
            stroke: { curve: 'smooth' },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val.toLocaleString() + 'đ';
                    }
                }
            }
        });
        dailyChart.render();

        // Biểu đồ doanh thu hàng tháng
        const monthlyChart = new ApexCharts(document.querySelector("#monthly-revenue-chart"), {
            series: [{
                name: "Revenue",
                data: @json($monthlyRevenue->pluck('revenue')->map(fn($value) => (float)$value))
            }],
            chart: {
                height: 350,
                type: 'bar'
            },
            xaxis: {
                categories: @json($monthlyRevenue->pluck('month'))
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return val.toLocaleString() + 'đ';
                    }
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: false,
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function (val) {
                    return val.toLocaleString() + 'đ';
                },
                style: {
                    fontSize: '12px',
                    colors: ['#FFFFFF']
                }
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val.toLocaleString() + 'đ';
                    }
                }
            }
        });
        monthlyChart.render();
    });
</script>
<script src="/assets/js/main.js"></script>
</body>
</html>

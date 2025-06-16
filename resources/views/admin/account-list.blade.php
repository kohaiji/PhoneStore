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
                            <h3>List User Accounts</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Accounts
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <form action="{{ route('admin.accounts.search') }}" method="get" class="mb-3">
                        <div class="row">
                            <div class="col-10">
                                <input placeholder="Search By User Name..." class="form-control" type="text" name="data" value="{{ $data ?? '' }}">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-secondary btn-sm rounded-pill" type="submit">
                                    <i class="bi bi-search" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-success btn-sm rounded-pill" href="{{ route('admin.accounts.list') }}">View All</a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-light mb-0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Avatar</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th class="text-center" colspan="1">ACTION</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($accounts as $obj)
                        <tr>
                            <td>{{$obj->id}}</td>
                            <td>{{$obj->name}}</td>
                            <td>{{$obj->email}}</td>
                            <td>{{$obj->phone}}</td>
                            <td><img height="100" src="/avatar_user/{{$obj->avatar}}" alt="avatar"></td>
                            <td>{{$obj->address}}</td>
                            <td>{{$obj->gender}}</td>
                            <td>{{$obj->status}}</td>
                            <td class="text-center">
                                @if($obj->status == 'active')
                                    <a onclick="return confirm('Are you sure you want to lock this account?')"
                                       href="{{ route('admin.accounts.toggle', $obj->id) }}"
                                       class="btn btn-outline-danger btn-sm">Lock</a>
                                @else
                                    <a onclick="return confirm('Are you sure you want to unlock this account?')"
                                       href="{{ route('admin.accounts.toggle', $obj->id) }}"
                                       class="btn btn-outline-success btn-sm">Unlock</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-1">
                    {{$accounts->links()}}
                </div>
            </div>

        </div>
    </div>
</div>
<script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>

<script src="/assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire('Success', '{{ session('success') }}', 'success');
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire('Error', '{{ session('error') }}', 'error');
    </script>
@endif

</body>

</html>

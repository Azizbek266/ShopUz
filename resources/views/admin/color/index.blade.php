<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body id="page-top">
    <div id="wrapper">
        @include('admin.layouts.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar position-fixed mb-4 static-top shadow"
                    style="width: 86%">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn" style="background-color: #1cc88a" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn" style="background-color: #1cc88a" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIIAAAB5CAMAAADCiAkVAAAAY1BMVEX///9APz9EQ0MxMDA3NjY7Ojo0MzP6+vq6urosKyskIyOdnZ0oJychICDv7+9oaGjLy8vi4uLV1dWUlJRhYWGJiYlTUlJbWlqurq5OTU1vbm7AwMB4d3cdGxukpKSCgoIXFRW8QGGdAAADl0lEQVRoge2ai5aiMAyGKW2hRahcBeTivP9TLujsDjpIG23onD3zv4CfaRKSv/W8X72s0FNZKpouzTMVugBQh+7SxlHs91UxitwBhKCBZGQW5yyQ0RCURZPtSTB+kEdxRiNZpXsR5Mk3gpsCehK7EIQX9gRhCoasc/Tfb/r6KcAVIm5wCRopOd9EICS6IAKoY6z5+atoj4eQt7oI3CQLNITj8zy8V4JVnWlkSECIj9Que7NjmEUrFILQKBc/xVDadXg0jwIJcMJQAhAIUQgE4QAhoBhN8unXaVXcR0AQEoJAEoSEHCkIAeMkigCEwBBqooIh8NI+AjAKhNlv0gcgwmAfoYGlI/mwj9DBihIDAdaaUBBgDZqQGGFm8GEILQICYGSZxI/2CbwRVJUY3dHLIWMTztfaA1VlhDK6bSyTK0IwHdJTCyHw/bNthrAGxWDSYHuhUcC2gLBTKVBXmMRb20O0AmXCJGZ9uQVtMrMS+37LATgvRPaLUpkv1rMwZkevAlUlw/B7UlCDDg4ICLCZRaI4LSdITSQYBF4DOAmGY7tlgChQJMfrYtwaeI1DMDVpaRYIHycZZ2XCpE3zMsM0w01mWJSW8KXUIB1oh4oQmiAgX1XpkwFliVlKv2BL9NshbZv2MVzPOwnNUkXxbiP+KtSEge9wYbnt+KCMKo9KN08CPxm1CNEeV7bbCBje809E2LbkdzmIbUuejjsgaJwOecbujtlZ16CZj5sODdPvVBznivBThZELbN9aWBAYrrasxppaKuNdhvkYtRmmJ4D9yoNSWM4I1dQxzGbhkvSdvfPIKma4xNxTRH5hJRShKAeo5/hPwVCLd0ORV5S+EIBFKCit3liusqZmwIu51VCwWrzUKVTX81cyYE08bitwVnQXDiwBjYLkCFj0lOgHW/9/IR5TswIJ0/ObCbihgJbaXqGak3y5Ak3E5emwGQph6qO8A0Fp/xQiOyboAFexZ9uGsFsCm4pWL/BG4L34e1ozxDqY0/6uVp78ZBYaMUjy27Tfo5bimvjDZyPfNRGuegwD8L2ODfGHGdfwTalVybsxIndA8OBKAR+w2RFvHafCrOWnonZxEEQuZxgX5zAlw8KyV6A3Ita0NAgzN1FY3qE56I2z+PkLweSiAwNhcW3QuUcQ7hGgbxkxENw0xyUC7PmaPYTzL8J9a4K+7v2PEC7uESrnCEHxi/AjEJZTkyuE8WchcN+FgpvP8QdK9z1yRhl2GgAAAABJRU5ErkJggg==">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="route('logout')"
                                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="row">
                    <div class="col-md-12">
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                    </div>
                    <div class="card" style="margin-top: 8%; margin-left: 4%; width:93%">
                        <div class="card-header" style="padding-bottom: 10px">
                            <h3 style="display: flex">Color Lists
                                <a href="{{ url('admin/colors/create') }}" class=" btn btn-primary"
                                    style="margin-left: 80%">Add Color</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Color Name</th>
                                        <th>Color Code</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($colors as $color)
                                        <tr>
                                            <td>{{ $color->id }}</td>
                                            <td>{{ $color->name }}</td>
                                            <td>{{ $color->code }}</td>
                                            <td>{{ $color->status  == '1' ? 'Hidden':'Visible'  }}</td>
                                            <td>
                                                <a href="{{url('admin/colors/'.$color->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="{{url('admin/colors/'.$color->id.'/delete')}}" onclick="return confirm('Are you sure, you want to delete this data')" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End of Main Content -->

        </div>
    </div>


    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

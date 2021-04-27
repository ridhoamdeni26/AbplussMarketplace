<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Muda-Ads Admin Panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <!-- <link rel="stylesheet" href="{{ asset('public/assets/plugins/jqvmap/jqvmap.min.css') }}"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- chart -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="{{asset('public/loginpage/login-admin.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/plugins/voucher/voucher.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @guest

        @else

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-info navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('public/panel/assets/images/blank-profile.png') }}"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{ asset('public/panel/assets/images/blank-profile.png') }}"
                                class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->email }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{route('admin.password.change')}}" class="btn btn-default btn-flat">Setting</a>
                            <a href="{{route('admin.logout')}}" class="btn btn-default btn-flat float-right"> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-light-navy">
            <!-- Brand Logo -->
            <a href="{{url('admin/home')}}" class="brand-link navbar-cyan">
                <img src="{{ asset('public/assets/dist/img/logo/muda advertiing.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Muda-Ads</span>
            </a>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-legacy nav-child-indent text-sm"
                    data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    @if(Auth::user()->category == 1)
                    <!-- Category Sidebar -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Category
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('categories') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sub.categories') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sub Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('brands') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Brand</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('duration') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Duration</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->coupon == 1)
                    <!-- Coupon Sidebar -->
                    <li class="nav-item">
                        <a href="{{ route('admin.coupon') }}" class="nav-link">
                            <i class="nav-icon fas fa-gift"></i>
                            <p>
                                Coupons
                            </p>
                        </a>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->product == 1)
                    <!-- Product Sidebar -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-box-open"></i>
                            <p>
                                Products
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('add.product') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Product</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('all.product') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Product</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->order == 1)
                    <!-- Order Sidebar -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Orders
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.neworder') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.accept.payment') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Accept Payment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.progress.order') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Progress Items</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.done.order') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Success Order Items</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.cancel.order') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cancel Order</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->blog == 1)
                    <!-- Blog Sidebar -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-sticky-note"></i>
                            <p>
                                Blog
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('add.blog.categorylist') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Blog Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('add.blogpost') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Post</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('all.blogpost') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Post List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->newsletter == 1)
                    <!-- Newslaters Sidebar -->
                    <li class="nav-item">
                        <a href="{{ route('admin.newslaters') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>
                                NewsLetter
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.seo') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                            <p>
                                SEO Settings
                            </p>
                        </a>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->report == 1)
                    <!-- Report Sidebar -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Reports
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('today.order') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Today Order</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="{{ route('today.progress') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Today Delivery</p>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="{{ route('month.order') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>This Month Order</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('search.report') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Search Report</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    @endif
                    
                    @if(Auth::user()->role == 1)
                    <!-- User Role Sidebar -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                User Role Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('create.admin') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.all.user') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->return == 1)
                    <!-- Return Order -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-exchange-alt"></i>
                            <p>
                                Return Order
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.return.request') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Return Request</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.all.return') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Request</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->contact == 1)
                    <!-- Stock Sidebar -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                Product Stocks
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.product.stock') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Stock</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->contact == 1)
                    <!-- Contact Message Sidebar -->
                    <li class="nav-item">
                        <a href="{{ route('admin.all.message') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>
                                Contact All Message
                            </p>
                        </a>
                    </li>
                    @else
                    @endif
                    
                    @if(Auth::user()->comment == 1)
                    <!-- Product Comment Sidebar -->
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>
                                Product Comment
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('today.order') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Comment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('month.order') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Comment</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    @else
                    @endif
                    
                    @if(Auth::user()->setting == 1)
                    <!-- Site Settings Sidebar -->
                    <li class="nav-item">
                        <a href="{{ route('admin.site.setting') }}" class="nav-link">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>
                                Site Settings
                            </p>
                        </a>
                    </li>
                    @else
                    @endif

                    <li class="nav-item">
                        <a href="{{ route('admin.log.user') }}" class="nav-link">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>
                                User Logs
                            </p>
                        </a>
                    </li>

                    <!-- Voucher SideBar -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-gift"></i>
                            <p>
                                Voucher
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('create.voucher') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Voucher</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.voucherList') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Voucher List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>

    @endguest

    @yield('admin_content')

    <!-- jQuery -->
    <script src="{{ asset('public/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('public/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('public/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('public/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('public/assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('public/assets/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <!-- <script src="{{ asset('public/assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('public/assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('public/assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('public/assets/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('public/assets/dist/js/pages/dashboard.js') }}"></script>
    <!-- toastr js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>
    <!-- sweetalert -->
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <!-- select 2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- mask min currency -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    

    <script>
    var APP_URL = {!! json_encode(url('/')) !!}
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $('#example2').DataTable({
            "order": [[ 0, "desc" ]],
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $('#VoucherDate').datetimepicker({
            changeMonth: true,
            changeYear: true,
            format: 'DD-MM-YYYY',
            minDate: 0
        });

        $('.product_size').select2({
            placeholder: "Choose tags...",
            tags: true,
            tokenSeparators: [',', ' '],
        });

        $('.product_color').select2({
            placeholder: "Choose tags...",
            tags: true,
            tokenSeparators: [',', ' '],
        });
        

        $( '.uang' ).mask('000.000.000.000', {
            reverse: true
        });
        $('.textarea').summernote();

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'DD-MM-Y'
        });
        $('#reservationmonth').datetimepicker( {
            format: 'MM'
        });
        $('#reservationyear').datetimepicker( {
            format: 'Y'
        });

        $(document).on('click', '#claimVoucher', function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            if(id){
                $.ajax({
                    url: "{{ url('admin/voucher/edit/') }}/" + id,
                    type: "GET",
                    datType: "json",
                    success:function(data){
                        console.log(data)
                        if ($.isEmptyObject(data.error)){

                            Swal.fire({
                                title: data.success,
                                icon: 'success',
                                confirmButtonText: 'Cool',
                                timer: 3000,
                                showConfirmButton: false,
                            })
                        }else{
                            Swal.fire({
                                title: data.error,
                                icon: 'error',
                                confirmButtonText: 'Cool',
                                timer: 3000,
                                showConfirmButton: false,
                            })
                        }
                    },
				});
            }

        });
    });
    </script>
    <!-- login script js -->
    <!-- <script>
        // console.clear();

        const loginBtn = document.getElementById('login');
        const signupBtn = document.getElementById('signup');

        loginBtn.addEventListener('click', (e) => {
            let parent = e.target.parentNode.parentNode;
            Array.from(e.target.parentNode.parentNode.classList).find((element) => {
                if (element !== "slide-up") {
                    parent.classList.add('slide-up')
                } else {
                    signupBtn.parentNode.classList.add('slide-up')
                    parent.classList.remove('slide-up')
                }
            });
        });

        signupBtn.addEventListener('click', (e) => {
            let parent = e.target.parentNode;
            Array.from(e.target.parentNode.classList).find((element) => {
                if (element !== "slide-up") {
                    parent.classList.add('slide-up')
                } else {
                    loginBtn.parentNode.parentNode.classList.add('slide-up')
                    parent.classList.remove('slide-up')
                }
            });
        });

    </script> -->
    <!-- end login js -->
    <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif

    </script>
    <script>
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Nice ! You Made The Right Choice Bro !");
                    }
                });
        });

    </script>
    @stack('edit_category')
    @stack('edit_coupon')
    <script type="text/javascript">
     $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if (category_id) {
            
            $.ajax({
              url: "{{ url('/get/subcategory/') }}/"+category_id,
              type:"GET",
              dataType:"json",
              success:function(data) { 
              var d =$('select[name="subcategory_id"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

            });

 </script>
 <!-- image one -->
 <script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<!-- image two -->
<script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<!-- image three -->
<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>       
@stack('show_product')
@yield('extra_script')
@stack('edit_blog')
@stack('edit_duration')
@stack('Update_Admin')

</script>
</body>

</html>

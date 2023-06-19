<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ getlogo('favicon') != null ? getlogo('favicon') : url('admin/assets/images/favicon.ico')}}" type="image/x-icon">


  <!-- Libs CSS -->
  @includeIf('admin.layout.css')
  @yield('admin_css')
  {{-- <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon"> --}}
  <title>DeafxMax Best Health Insurance India Admin Dashboard</title>
</head>

<body>
  <!-- ============================================================== -->
  <!-- main wrapper -->
  <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
            @includeIf('admin.layout.header')
            @includeIf('admin.layout.sidebar')
        <div class="dashboard-wrapper">
            @yield('content')
            @includeIf('admin.layout.footer')
        </div>
    </div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Libs JS -->
@includeIf('admin.layout.js')
@yield('admin_script')
@includeIf('admin.layout.toastr')
</body>
</html>

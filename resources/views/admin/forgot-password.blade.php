<!doctype html>
<html lang="en">


<!-- Mirrored from preview.easetemplate.com/influence/html/influence/pages/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Mar 2023 06:16:51 GMT -->
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ getlogo('favicon') != null ? getlogo('favicon') : url('admin/assets/images/favicon.ico')}}" type="image/x-icon">


  <!-- Libs CSS -->
  @includeIf('admin.layout.css')
  <title>Forgot Password</title>

</head>

<body class="bg-light">
  <!-- ============================================================== -->
  <!-- forgot password  -->
  <!-- ============================================================== -->
  <img class="login-img" src="{{url('admin_images/login/login-image.jpg')}}" width="100%" alt="login_img">
  <div class="min-vh-100 d-flex align-items-center">
    <div class="splash-container">
      <div class="card login_card shadow-sm">
        <div class="card-header text-center">
          <a href="https://deafxmax.co.in/index.php"><img class="logo-img" src="{{ url('admin/assets/images/logo1.png') }}" width="100%" alt="logo"></a><span
            class="splash-description">Please enter your user information.</span></div>
        <div class="card-body">
            <form action="{{ route('forgetpassword.post') }}" method="post" id="forgot_pass_form">
                @csrf
            <p>Don't worry, we'll send you an email to reset your password.</p>
            <div class="form-group mb-2">
              <input class="form-control" type="email" name="email" required="" placeholder="Your Email"
                autocomplete="off" required>
            </div>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
           @enderror
            {{-- <a class="btn btn-block btn-primary btn-xl" href="../index-2.html">Reset Password</a> --}}
            <button type="submit" class="btn btn-block btn-primary btn-x">Reset Password</button>
          </form>
        </div>
        <div class="card-footer text-center">
            @if(str_contains($pre_url,'admin/login'))
          <span> <a href="{{ str_contains($pre_url,'admin/login') ? route('admin_login') : route('member_login') }}">Back To Login</a></span>
            @else
            <span> <a href="{{ route('member_login') }}">Back To Login</a></span>
            @endif
        </div>
      </div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- end forgot password  -->
  <!-- ============================================================== -->
  <!-- Libs JS -->
  @includeIf('admin.layout.js')
    <script>
        $(document).ready(function() {
            $("#forgot_pass_form").validate();
        });
         toastr.options.timeOut = 10000;
          @if (Session::has('error'))
              toastr.error('{{ Session::get('error') }}');
          @elseif(Session::has('success'))
              toastr.success('{{ Session::get('success') }}');
          @endif
    </script>
</body>
<!-- Mirrored from preview.easetemplate.com/influence/html/influence/pages/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Mar 2023 06:16:51 GMT -->
</html>

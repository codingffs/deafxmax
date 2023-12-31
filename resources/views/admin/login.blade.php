<!doctype html>
<html lang="en">


<!-- Mirrored from preview.easetemplate.com/influence/html/influence/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Mar 2023 06:16:50 GMT -->
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ getlogo('favicon') != null ? getlogo('favicon') : url('admin/assets/images/favicon.ico')}}" type="image/x-icon">

  <!-- Libs CSS -->
  @includeIf('admin.layout.css')
  <title>Login</title>
</head>

<body class="bg-light">
  <!-- ============================================================== -->
  <!-- login page  -->
  <!-- ============================================================== -->
  <img class="login-img" src="{{url('admin_images/login/login-image.jpg')}}" width="100%" alt="login_img">
  <div class="min-vh-100 d-flex align-items-center">
    <div class="splash-container">
      <div class="card login_card shadow-sm">
        <div class="card-header text-center">
          <a href="https://deafxmax.co.in/index.php"><img class="logo-img" src="{{ getlogo('logo') != null ? getlogo('logo') : url('admin/assets/images/logo1.png')}}" width="100%" alt="logo"></a><span
            class="splash-description">Please enter your user information.</span></div>
        <div class="card-body">
                @error('error')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
          <form action="{{ route('login_submit') }}" method="post" id="login_form">
            @csrf
            <input class="form-control" id="role_id" type="hidden" name="role_id">
            <div class="form-group mb-2">
                @if(str_contains($pre_url,'admin/login') || str_contains($pre_url,'admin/logout'))
                    <input class="form-control" id="username" type="email" name="email" placeholder=" Admin Username" autocomplete="off" required>
                @else
              <input class="form-control" id="username" type="email" name="email" placeholder="Member Username" autocomplete="off" required>
                @endif
            </div>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            <div class="form-group mb-2">
              <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
            </div>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            <div class="form-group">
              <label class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="remember"><span class="custom-control-label">Remember
                  Me</span>
              </label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
          </form>
        </div>
        <div class="card-footer bg-white p-0  ">
          {{-- <div class="card-footer-item card-footer-item-bordered border-right d-inline-block  ">
            <a href="sign-up.html" class="footer-link">Create An Account</a></div> --}}
          <div class="card-footer-item card-footer-item-bordered d-inline-block ">
            <a href="{{ route('forgetpassword') }}" class="footer-link" style="margin-left: 93px;">Forgot Password</a>
           </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ============================================================== -->
  <!-- end login page  -->
  <!-- ============================================================== -->
  <!-- Libs JS -->
  @includeIf('admin.layout.js')
  <script>
    $(document).ready(function() {
        $("#login_form").validate();
    });
    </script>
</body>


<!-- Mirrored from preview.easetemplate.com/influence/html/influence/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Mar 2023 06:16:50 GMT -->
</html>

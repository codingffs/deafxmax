@extends('admin.layout.master')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header" id="top">
                    <h2 class="pageheader-title">Edit Profile </h2>
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Profile</a></li>
                        </ol>
                    </nav>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 edit_profile_main">
              <div class="card mb-5 shadow-sm">
                <h5 class="card-header">Edit Profile</h5>
                <div class="card-body">
                  <form method="post" action="{{ route('profile_update',$user->id) }}" id="profile_update" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <input id="label_name" type="text" class="form-control" name="label_name" placeholder="Name*" maxlength="50" minlength="0" value="{{ old('label_name',$user->label_name) }}" required>
                    </div>
                        @error('label_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                        <input id="email" type="email" name="email" placeholder="Email*" class="form-control" value="{{ old('email',$user->email) }}" autocomplete="off" required>
                    </div>
                    <div id="current_email_error" class="error"></div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                        <input id="mobile_no" type="number" name="mobile_no" class="form-control" placeholder="Mobile Number*" maxlength="10" minlength="0" value="{{ old('mobile_no',$user->mobile_no) }}" required>
                    </div>
                        @error('mobile_no')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-address-book"></i></span></div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Address*"  name="address" rows="3" required>{{ $user->address }}</textarea>
                    </div>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2 input_select2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-building"></i></span></div>
                        <select class="form-control select2" id="input-select" name="state" required>
                            <option selected disabled>Select State</option>
                            @foreach ($State as $state)
                                <option value="{{ $state->id }}" {{ $state->id == $user->state ? 'selected' :'' }} >{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-building"></i></span></div>
                          <input id="city" type="text" name="city" class="form-control" placeholder="City" value="{{ old('city',$user->city) }}">
                    </div>
                    <div class="custom-file mb-2">
                        <label class="custom-file" for="customFile">Profile Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="m-r-10 mt-3"><img src="{{ $user->image }}" alt="user" class="rounded-circle" width="80"/></div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a href="{{ route('members.index') }}" class="btn btn-secondary mt-2">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection

@section('admin_script')
<script>
    $(document).ready(function() {
        $('#profile_update').validate({
            errorPlacement: function(error, element) {
                if (element.attr("name") == "name") {
                    error.insertAfter( element.parent("div"));
                } else {
                    error.insertAfter( element.parent("div"));
                }
            }
        });
    });
</script>
@endsection

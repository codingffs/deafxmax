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
                    <h2 class="pageheader-title">Create Withdraw </h2>
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('withdraw.index') }}" class="breadcrumb-link">Withdraw</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Create Withdraw</a></li>
                        </ol>
                    </nav>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">
              <div class="card mb-5 shadow-sm">
                <h5 class="card-header">Create Withdraw</h5>
                <div class="card-body">
                  <form method="post" action="{{ route('withdraw.store') }}" id="add_members" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-2 input_select2 withdraw_select">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-building"></i></span></div>
                        <select class="form-control select2 sub_category" id="input-select" name="withdraw_type" required>
                            <option selected disabled>-- Select Withdraw --</option>
                            <option>Principle</option>
                            <option>Profit</option>
                            <option>Team</option>
                        </select>
                    </div>
                    @error('withdraw_type')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                     <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                        <input id="amount" type="text" class="form-control" name="amount" placeholder="Amount*" value="{{ old('amount') }}" pattern="[0-9]+" maxlength="20" minlength="0" required>
                    </div>
                        @error('amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <br>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a href="{{ route('withdraw.index') }}" class="btn btn-secondary mt-2">Cancel</a>
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
        $('#add_members').validate({
            errorPlacement: function(error, element) {
                if (element.attr("name") == "name") {
                    error.insertAfter( element.parent("div"));
                } else {
                    error.insertAfter( element.parent("div"));
                }
            },
        });
    });
</script>
@endsection

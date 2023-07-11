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
                    <h2 class="pageheader-title">Create Deposit </h2>
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('depositdetails.index') }}" class="breadcrumb-link">Deposit</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Create Deposit</a></li>
                        </ol>
                    </nav>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 edit_profile_main">
              <div class="card mb-5 shadow-sm">
                <h5 class="card-header">Create Deposit</h5>
                <div class="card-body">
                  <form method="post" action="{{ route('depositdetails.store') }}" id="add_members" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-bank"></i></span></div>
                        <input id="bank_acc_no" type="text" class="form-control" name="bank_acc_no" placeholder="Bank Account Number*" value="{{ old('bank_acc_no') }}" pattern="[0-9]+" maxlength="16" minlength="0" required>
                    </div>
                            @error('bank_acc_no')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                     <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-inr"></i></span></div>
                        <input id="amount" type="number" class="form-control" name="amount" placeholder="Amount*" value="{{ old('amount') }}" pattern="[0-9]+" maxlength="20" minlength="0" required>
                    </div>
                            @error('amount')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-hand-holding-usd"></i></span></div>
                        <input id="deposit_type" type="text" name="deposit_type" placeholder="Deposit Type*" class="form-control" maxlength="50" minlength="0" value="{{ old('deposit_type') }}" autocomplete="off" required>
                    </div>
                            @error('deposit_type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                    <div class="col-12">
                        <label for="customFile">Image*<span class="error"></span></label>
                        <div class="input-group mb-2">
                            <input type="file" class="form-control" name="image" id="image"required>
                        </div>
                    </div>
                    @error('image')
                                <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="checkbox" id="terms" name="terms">
                    <label for="terms" class="img_display">I agree to the terms and conditions</label>
                    <br>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a href="{{ route('depositdetails.index') }}" class="btn btn-secondary mt-2">Cancel</a>
                    <br>
                    <br>
                    <div class="main_depositbtn d-flex align-items-center justify-content-between">
                    <a href="#"><img class="logo-img" src="{{ asset('admin_images/setting/qr.jpg') }}" width=300px alt="logo"></a>
                    <a href="#"><img class="logo-img" src="{{ asset('admin_images/setting/Capturegdht.jpg') }}" width=300px alt="logo"></a>
                </div>
                </form>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="modal fade myblock" id="myModalView" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
          <div class="modal-content">
          <div class="booking_summary model-summary">
          <div class="modal-header">
            <h2>
                TERMS & CONDITION
            </h2>
          </div>
          <div class="modal-body body-margin" id="employee-view">
              <h4>
               I voluntarily Deafx Max . through this deposited in OCTAFX Forever Trading Pool a/c. I made the deposit on the condition that, I will not have any claim to own Deafxmax for profit and loss in trading.
               </h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
        $(document).on('click', ".img_display", function() {
                var src = $(this).attr('src');
                $('#myModalView').modal('show');
                });
    });
</script>
@endsection

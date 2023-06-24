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
                    <h2 class="pageheader-title">Create Kyc</h2>
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kyc</a></li>
                        </ol>
                    </nav>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
              <div class="card mb-5 shadow-sm">
                <h5 class="card-header">Create Kyc</h5>
                <div class="card-body">
                  <form method="post" action="{{ route('kyc.store') }}" id="add_members" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-bank"></i></span></div>
                          <input id="bank_name" type="text"  class="form-control" name="bank_name" placeholder="Bank Name*" maxlength="50" minlength="0" value="{{ old('bank_name') }}" required>
                    </div>
                        @error('bank_name')
                           <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                        <input id="act_number" type="text" name="act_number" class="form-control" placeholder="Account Number*" pattern="[0-9]+" maxlength="16" minlength="0" value="{{ old('act_number') }}" required>
                    </div>
                        @error('act_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-id-card-o"></i></span></div>
                          <input id="pancard_number" type="text" name="pancard_number" class="form-control" placeholder="Pan Card Number*" pattern="[0-9]+" maxlength="10" minlength="0" value="{{ old('pancard_number') }}" required>
                    </div>
                        @error('pancard_number')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                        <input id="ifsc_code" type="text" name="ifsc_code" class="form-control" placeholder="IFSC Code*" pattern="[0-9]+" maxlength="10" minlength="0" value="{{ old('ifsc_code') }}" required>
                    </div>
                        @error('ifsc_code')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-bank"></i></span></div>
                          <input id="name_of_holder" type="text" name="name_of_holder" class="form-control" placeholder="Name Of Holder*" value="{{ old('name_of_holder') }}"maxlength="50" minlength="0" required>
                    </div>
                        @error('name_of_holder')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="col-12">
                        <label for="customFile">Document 1*<span class="error"></span></label>
                        <div class="input-group mb-2">
                            <input type="file" class="form-control" name="document1" id="document1" required>
                        </div>
                       </div>
                        @error('document1')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="col-12">
                        <label for="customFile">Document 2*<span class="error"></span></label>
                        <div class="input-group mb-2">
                            <input type="file" class="form-control" name="document2" id="document2" required>
                        </div>
                       </div>
                        @error('document2')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <br>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-2">Cancel</a>
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
            }
        });

    });
</script>
@endsection


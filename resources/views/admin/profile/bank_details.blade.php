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
                    @if(isset($bank_details) && $bank_details != null)
                    <h2 class="pageheader-title">Edit Bank Details</h2>
                    @else
                    <h2 class="pageheader-title">Create Bank Details</h2>
                    @endif
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Bank Details</a></li>
                        @if(isset($bank_details) && $bank_details != null)
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Edit Bank Details</a></li>
                        @else
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">CreateBank Details</a></li>
                        @endif
                        </ol>
                    </nav>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12">
              <div class="card mb-5 shadow-sm">
                <h5 class="card-header">{{ isset($bank_details) && $bank_details != null ? 'Edit Bank Details' : 'Create Bank Details' }}</h5>
                <div class="card-body">
                    @if(isset($bank_details) && $bank_details != null)
                    <form method="post" action="{{ route('bank_details_update') }}" id="bank_details_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="bank_details_id" id="bank_details_id" value="{{ $bank_details->id }}">
                    @else
                    <form method="post" action="{{route('bank_details_update')}}" enctype="multipart/form-data">
                    @csrf
                    @endif
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-bank"></i></span></div>
                          <input id="bank_name" type="text"  class="form-control" name="bank_name" placeholder="Bank Name*" value="{{old('bank_name',isset($bank_details->bank_name)? $bank_details->bank_name:'') }}" required>
                    </div>
                        @error('bank_name')
                           <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                        <input id="account_no" type="text" name="account_no" class="form-control" placeholder="Account Number*" pattern="[0-9]+" maxlength="16" minlength="0"value="{{old('account_no',isset($bank_details->account_no)? $bank_details->account_no:'' ) }}" required>
                    </div>
                    @error('account_no')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                        <input id="ifsc_code" type="text" name="ifsc_code" class="form-control" placeholder="IFSC Code*" pattern="[0-9]+" maxlength="10" minlength="0" value="{{old('ifsc_code',isset($bank_details->ifsc_code) ? $bank_details->ifsc_code:'' ) }}"required>
                    </div>
                    @error('ifsc_code')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-bank"></i></span></div>
                          <input id="branch_name" type="text" name="branch_name" class="form-control" placeholder="Branch Name*" value="{{old('branch_name',isset($bank_details->branch_name)? $bank_details->branch_name:'') }}" required>
                    </div>
                    @error('branch_name')
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

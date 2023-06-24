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
                    <h2 class="pageheader-title">View Kyc </h2>
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card mb-5 shadow-sm">
                <h5 class="card-header">View Kyc</h5>
                <div class="card-body">
                    @csrf
                    <table id="datatable1"class="table table-hover mb-0">
                        <thead>
                            <tr>
                              <th>Bank Name</th>
                              <th>Account Number</th>
                              <th>Pan Card Number</th>
                              <th>IFSC Code</th>
                              <th>Name Of Holder</th>
                              <th>Document 1</th>
                              <th>Document 2</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                     @if($kyc != '[]')
                          @foreach($kyc as $User)
                              <tr>
                                  <td>{{$User->bank_name}}</td>
                                  <td>{{$User->act_number}}</td>
                                  <td>{{$User->pancard_number}}</td>
                                  <td>{{$User->ifsc_code}}</td>
                                  <td>{{$User->name_of_holder}}</td>
                                  <td>
                                      <img src="{{ url('admin_images/kyc/'.$User->document1) }}" class="img-fluid img-radius wid-40" width="60" height="60">
                                  </td>
                                  <td>
                                    <img src="{{ url('admin_images/kyc/'.$User->document2) }}" class="img-fluid img-radius wid-40" width="60" height="60">
                                </td>
                                <td>
                                    <a data-href="{{ route('kyc_approve',$User->id) }}"class="table-action-btn edit btn btn-white m-1 approve_btn"><i class="fas fa-check-circle f-w-600 f-16 m-r-20 text-success "></i></a>
                                </td>
                              </tr>
                          @endforeach
                          @else
                          <tr>
                              <td colspan="8" class="text-center">No Data Found</td>
                          <tr>
                         @endif
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
@section('admin_script')
<script>
    $(document).ready(function () {
        $(document).on('click', ".approve_btn", function() {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-primary",
                confirmButtonText: 'Yes, aprove it!',
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to write something!'
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = $(this).attr('data-href');
                    var token = '<?php echo csrf_token(); ?>';
                    $.ajax({
                        type: 'GET',
                        contentType: "application/json; charset=utf-8",
                        url: url,
                        data: {
                            _token: token,
                            _method: 'DELETE',
                        },
                        success: function(data) {
                          console.log(data);
                            if (data.status == 1) {
                            window.location.href = "{{ route('members.index') }}";
                            }
                            else{
                                return false;
                            }
                        }
                    });
                }
            });
        });
      });
</script>
@endsection


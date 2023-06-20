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
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
              <div class="card mb-5 shadow-sm">
                <h5 class="card-header">View Kyc</h5>
                <div class="card-body">
                    @csrf
                    <table id="datatable1"class="table table-hover mb-0">
                        <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile Number</th>
                              <th>Profit Income</th>
                              <th>Team Income</th>
                              <th>Pancard Number</th>
                              <th>Bank Account Number</th>
                              <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($kyc as $User)
                              <tr>
                                  <td>{{$User->name}}</td>
                                  <td>{{$User->email}}</td>
                                  <td>{{$User->mobile_no}}</td>
                                  <td>{{$User->profit_income}}</td>
                                  <td>{{$User->team_income}}</td>
                                  <td>{{$User->pancard_no}}</td>
                                  <td>{{$User->bank_act_no}}</td>
                              </tr>
                          @endforeach
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


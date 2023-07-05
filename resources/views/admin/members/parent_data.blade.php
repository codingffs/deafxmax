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
                    <h2 class="pageheader-title">View Parent Member</h2>
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"> Parent Member</a></li>
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
                <h5 class="card-header">View Parent Member</h5>
                <div class="card-body">
                    @csrf
                    <table id="datatable1"class="view_parenttable table table-hover mb-0 parent_data_table">
                        <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile Number</th>
                              @if(auth()->user()->role_id == 1)
                              <th>Profit Income</th>
                              <th>Team Income</th>
                              @endif
                              <th>Pancard Number</th>
                              <th>Bank Account Number</th>
                              <th>Created Date</th>
                              <th>Actions</th>
                              <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($kyc != '[]')
                                @foreach($kyc as $User)
                                    <tr>
                                        <td>{{$User->label_name}}</td>
                                        <td>{{$User->email}}</td>
                                        <td>{{$User->mobile_no}}</td>
                                        @if(auth()->user()->role_id == 1)
                                        <td>{{$User->profit_income}}</td>
                                        <td>{{$User->team_income}}</td>
                                        @endif
                                        <td>{{$User->pancard_no}}</td>
                                        <td>{{$User->bank_act_no}}</td>
                                        <td>{{$User->date_member}}</td>
                                        <td>
                                            <a href="{{ route('members.edit',$User->id) }}" data-id="{{ $User->id}}" class="table-action-btn edit btn btn-primary m-1" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-url="{{ route('members_destroy',$User->id) }}" class="table-action-btn btn btn-danger m-1 delete_btn" data-id="{{ $User->id}}   "><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            @if(auth()->user()->role_id == 1)
                                            <a href="{{ route('view_parent_data',$User->id) }}" data-id="{{ $User->id}}" class="table-action-btn btn btn-success m-1 emp_view" ><i class="fa fa-users" aria-hidden="true"></i></a>
                                            @endif
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
        $(document).on('click', ".delete_btn", function(event) {
                  swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonClass: "btn btn-danger",
                      cancelButtonClass: "btn btn-primary",
                      confirmButtonText: 'Yes, delete it!',
                      inputValidator: (value) => {
                          if (!value) {
                              return 'You need to write something!'
                          }
                      }
                  }).then((result) => {
                      if (result.isConfirmed) {
                          var url = $(this).attr('data-url');
                          var token = '<?php echo csrf_token(); ?>';
                          $.ajax({
                              type: 'GET',
                              url: url,
                              success: function(data) {
                                if(data.status == 0){
                                    window.location.reload();
                                    toastr_success(" Parent Member Deleted Successfully");
                                }
                              }
                          });
                      }
                    });
                });
      });
</script>
@endsection


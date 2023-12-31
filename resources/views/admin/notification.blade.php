
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
                    <h2 class="pageheader-title">View Withdraw </h2>
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">View Withdraw</a></li>
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
                <h5 class="card-header">View Withdraw</h5>
                <div class="card-body">
                    @csrf
                            <table id="datatable1" class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                         <th>Sr No</th>
                                         <th>Member</th>
                                         <th>Message</th>
                                         <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $i = 1;
                                    ?>
                            @if($Withdraw != '[]')
                                @foreach($Withdraw as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ isset($data->user_data->name)?$data->user_data->name:'-' }}</td>
                                        <td>{{ $data->message }}</td>
                                        @if($data->status == 0)
                                        <td>
                                            <a data-href="{{ route('approve',$data->id) }}"class="table-action-btn edit btn btn-white m-1 approve_btn"><i class="fas fa-check-circle f-w-600 f-16 m-r-20 text-success "></i></a>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
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
                                  window.location.href = "{{ route('notification') }}";
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


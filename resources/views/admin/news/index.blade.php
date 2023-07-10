@extends('admin.layout.master')
@section('content')
    <div class="container-fluid  dashboard-content">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">News</h2>
                <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">News</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card shadow-sm mb-5">
            <div class="card-header d-flex pb-0 justify-content-between">
                <div class="col-md-4 d-flex  align-items-center"><h5>News
                    </h5>
                </div>
                <div class="col-md-4">
                    <div class="csv-button float-right">
                        <a href="{{route('news.create')}}" class="btn btn-primary mb-2">Add News</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered data_table">
                  <thead>
                    <tr>
                        <th class="rounded-0">DATE</th>
                        <th class="rounded-0">DESCRIPTION</th>
                        <th class="rounded-0">ACTION</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   @endsection
@section('admin_script')
         <script type="text/javascript">
            $(document).ready(function() {
                var table = $('.data_table').DataTable({
                    processing: true,
                    serverSide: true,
                    orderable:false,
                    "bInfo": false,
                        oLanguage: {
                            sLengthMenu: "_MENU_",
                        },
                        language: {
                        paginate: {
                        next: '<i class="fa fa-angle-right">',
                        previous: '<i class="fa fa-angle-left">'
                        }
                    },
                    ajax: "{{ route('news.index') }}",
                    columns: [
                        {
                            data: 'date',
                            name: 'date'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ],
                    order:[],
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
                              type: 'POST',
                              url: url,
                              data: {
                                  _token: token,
                                  _method: 'DELETE',
                              },
                              success: function(data) {
                                  if (data.status == 1) {
                                      table.draw();
                                      toastr_success(" News Deleted Successfully!");
                                  } else {
                                    toastr_error("Some Thing Went Wrong!");
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

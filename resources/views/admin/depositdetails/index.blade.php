@extends('admin.layout.master')
@section('content')
    <div class="container-fluid  dashboard-content">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Deposit</h2>
                <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Deposit</a></li>
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
                <div class="col-md-4 d-flex  align-items-center"><h5>Deposit
                    </h5>
                </div>
                <div class="col-md-4">
                    <div class="csv-button float-right">
                        @if (auth()->user()->role_id ==2)
                        <a href="{{route('depositdetails.create')}}" class="btn btn-primary mb-2">Add Deposit</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered data_table">
                  <thead>
                    <tr>
                        @if (auth()->user()->role_id ==1)
                        <th class="rounded-0">Name</th>
                        @endif
                        <th class="rounded-0">Bank Account Number</th>
                        <th class="rounded-0">Amount</th>
                        <th class="rounded-0">Deposit Type</th>
                        <th class="rounded-0">Image</th>
                    </tr>
                  </thead>
                </table>
              </div>
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
          </div>
          <div class="modal-body body-margin" id="employee-view"></div>
          <div class="row mt-3 modal-margin">
            <div class="col-lg-9 col-md-8 image_depositdetail" style="margin-left: 44px;"><img src="" width="400" height="400" id="image"></div>
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
                    ajax: "{{ route('depositdetails.index') }}",
                    columns: [
                        @if(auth()->user()->role_id == 1)
                        {
                            data: 'user_id',
                            name: 'user_id'
                        },
                        @endif
                        {
                            data: 'bank_acc_no',
                            name: 'bank_acc_no'
                        },
                        {
                            data: 'amount',
                            name: 'amount'
                        },
                        {
                            data: 'deposit_type',
                            name: 'deposit_type'
                        },
                        {
                            data: 'image',
                            name: 'image',
                        },
                    ],
                    order:[],
                });
                $(document).on('click', ".img_display", function() {
                var src = $(this).attr('src');
                $('#image').attr('src',src);
                $('#myModalView').modal('show');
                });
            });

     </script>
@endsection

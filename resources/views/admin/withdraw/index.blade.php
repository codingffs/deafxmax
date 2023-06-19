@extends('admin.layout.master')
@section('content')
    <div class="container-fluid  dashboard-content">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">WithDraw</h2>
                <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">WithDraw</a></li>
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
                <div class="col-md-4 d-flex  align-items-center"><h5>WithDraw
                    </h5>
                </div>
                <div class="col-md-4">
                    <div class="csv-button float-right">
                        @if (auth()->user()->role_id ==2)
                        <a href="{{route('withdraw.create')}}" class="btn btn-primary mb-2">Add WithDraw</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered data_table">
                  <thead>
                    <tr>
                        @if (auth()->user()->role_id ==2)
                        <th class="rounded-0">WithDraw</th>
                        <th class="rounded-0">Amount</th>
                        @endif
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
                    ajax: "{{ route('withdraw.index') }}",
                    columns: [
                        @if(auth()->user()->role_id == 2)
                        {
                            data: 'withdraw_type',
                            name: 'withdraw_type'
                        },
                        {
                            data: 'amount',
                            name: 'amount'
                        },
                        @endif
                    ],
                    order:[],
                });

            });
     </script>
@endsection

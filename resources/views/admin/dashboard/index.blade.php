@extends('admin.layout.master')
@section('content')
    <!-- wrapper  -->
    <!-- ============================================================== -->
      <div class="dashboard-influence">
        <div class="container-fluid dashboard-content">
          <!-- ============================================================== -->
          <!-- pageheader  -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="page-header">
                <h2 class="mb-2">Dashboard </h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet
                  vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="card card_box mb-5 shadow-sm">
                <div class="card-body box__card bg_gradiant1">
                  <div class="d-inline-block">
                    @if (auth()->user()->role_id == 2)
                    <h5 class="text-white mb-3">Member Code</h5>
                    <h2 class="mb-0 text-white">{{ get_member_code_count() }}
                        {{ get_member_data_count() }}</h2>
                    @else
                    <h5 class="text-white mb-3">Total Members</h5>
                    <h2 class="mb-0 text-white">{{ get_employe_count() }}</h2>
                    @endif
                  </div>
                  @if (auth()->user()->role_id == 2)
                  <div class="float-right icon-shape icon-xl rounded-circle  bg-info-light mt-1">
                    <i class="fas fa-code fa-fw fa-sm text-danger font-24"></i>
                </div>
                    @else
                    <div class="float-right icon-shape icon-xl rounded-circle  bg-primary-light mt-1">
                      <i class="fa fa-group fa-fw fa-sm text-primary font-24"></i>
                    </div>
                    @endif
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="card card_box  mb-5 shadow-sm">
                <div class="card-body box__card bg_gradiant2">
                  <div class="d-inline-block">
                    @if (auth()->user()->role_id == 2)
                    <h5 class="text-white mb-3">Date Of Joining</h5>
                      <h2 class="mb-0 text-white">{{ get_date_of_join_count() }}</h2>
                    @else
                    <h5 class="text-white mb-3">Principal Amount</h5>
                    <h2 class="mb-0 text-white">{{ get_amount_count() }}</h2>
                    @endif
                  </div>
                  @if (auth()->user()->role_id == 2)
                  <div class="float-right icon-shape icon-xl rounded-circle  bg-info-light mt-1">
                    <i class="fas fa-file-signature fa-fw fa-sm text-warning font-24"></i>
                  </div>
                  @else
                  <div class="float-right icon-shape icon-xl rounded-circle  bg-info-light mt-1">
                    <i class="fas fa-hand-holding-usd fa-fw fa-sm text-warning font-24"></i>
                  </div>
                  @endif
                </div>
              </div>
            </div>
            @if (auth()->user()->role_id == 2)
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card card_box mb-5 shadow-sm">
                  <div class="card-body box__card bg_gradiant1">
                    <div class="d-inline-block">
                        <h5 class="text-white mb-3">Status</h5>
                        <h2 class="mb-0 text-white">Active</h2>
                    </div>
                    <div class="float-right icon-shape icon-xl rounded-circle  bg-info-light mt-1">
                        <i class="fas fa-check fa-fw fa-sm text-success font-24"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="card card_box  mb-5 shadow-sm">
                      <div class="card-body box__card bg_gradiant2">
                          <div class="d-inline-block">
                              <h5 class="text-white mb-3">My Direct</h5>
                              <h2 class="mb-0 text-white">{{ get_mydirect_count() }}</h2>
                            </div>
                            <div class="float-right icon-shape icon-xl rounded-circle  bg-info-light mt-1">
                                <i class="fa fa-group fa-fw fa-sm text-danger font-24"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
          @if (auth()->user()->role_id == 2)
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="card card_box mb-5 shadow-sm">
                <div class="card-body box__card bg_gradiant1">
                  <div class="d-inline-block">
                    <h5 class="text-white mb-3">My Team</h5>
                    <h2 class="mb-0 text-white">{{ get_myteam_count() }}</h2>
                  </div>
                  <div class="float-right icon-shape icon-xl rounded-circle  bg-info-light mt-1">
                    <i class="fas fa-user-friends fa-fw fa-sm text-blue font-24"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card card_box  mb-5 shadow-sm">
                    <div class="card-body box__card bg_gradiant2">
                        <div class="d-inline-block">
                            <h5 class="text-white mb-3">Profit Sharing Income</h5>
                            <h2 class="mb-0 text-white">${{ get_profit_income_count() }}</h2>
                          </div>
                          <div class="float-right icon-shape icon-xl rounded-circle  bg-info-light mt-1">
                            <i class="fas fa-hand-holding-usd fa-fw fa-sm text-warning font-24"></i>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card card_box mb-5 shadow-sm">
                  <div class="card-body box__card bg_gradiant1">
                    <div class="d-inline-block">
                        <h5 class="text-white mb-3">Team Income</h5>
                    <h2 class="mb-0 text-white">${{ get_team_income_count() }}</h2>
                    </div>
                    <div class="float-right icon-shape icon-xl rounded-circle  bg-primary-light mt-1">
                        <i class="fa fa-group fa-fw fa-sm text-primary font-24"></i>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card card_box  mb-5 shadow-sm">
                    <div class="card-body box__card bg_gradiant2">
                        <div class="d-inline-block">
                            <h5 class="text-white mb-3">Principal Amount</h5>
                            <h2 class="mb-0 text-white">{{ get_principal_amount_count() }}</h2>
                          </div>
                          <div class="float-right icon-shape icon-xl rounded-circle  bg-info-light mt-1">
                            <i class="fas fa-hand-holding-usd fa-fw fa-sm text-warning font-24"></i>
                          </div>
                      </div>
                  </div>
              </div>
            @endif
            @if(auth()->user()->role_id == 2)
         <!-- [ Main Content ] start -->
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card card_box mb-5 shadow-sm news_box">
      <div class="card-body box__card bg_gradiant1 bg_gradiants3">
        <div class="w-100">
          <h5 class="text-white mb-3 title_box">News</h5>
          @foreach($news as $data)
          <h2 class="mb-0 text-white dec_box">{{ $data->description }}</h2>
          <br>
          @endforeach
          @if($news == '[]')
          @endif
          @csrf
             @method('DELETE')
        </div>
      </div>
    </div>
  </div>
@endif
        </div>
        <br>

@endsection

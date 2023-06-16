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
                    <h2 class="pageheader-title">View Profile </h2>
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Profile</a></li>
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
                <h5 class="card-header">View Profile</h5>
                <div class="card-body">
                    @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="name">Name :</label>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="name">{{auth()->user()->name}}</label>
                        </div>

                        <label class="col-sm-2 col-form-label" for="email">Email :</label>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="name">{{auth()->user()->email}}</label>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="mobile_no">Mobile No. : </label>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="mobile_no">{{auth()->user()->mobile_no}}</label>
                        </div>
                        <label class="col-sm-2 col-form-label" for="address">Address :</label>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="address">{{auth()->user()->address}}</label>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="state">State : </label>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="state">{{ isset(Auth::user()->State_Detail->name)?Auth::user()->State_Detail->name:'-' }}</label>
                        </div>
                        <label class="col-sm-2 col-form-label" for="city">City :</label>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="city">{{auth()->user()->city}}</label>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="state">Profile Image : </label>
                        <div class="col-sm-4">
                            <img class="img-radius img-fluid wid-50 rounded-circle" src="{{ Auth::user()->image }}" id="image" alt="User image">
                        </div>
                    </div>    
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection


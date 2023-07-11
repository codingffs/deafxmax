@extends('admin.layout.master')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header" id="top">
                        <h2 class="pageheader-title">Edit News</h2>
                        <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('news.index') }}" class="breadcrumb-link">News</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Edit News</a></li>
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
                <h5 class="card-header">Edit News</h5>
                <div class="card-body">
                  <form method="post" action="{{ route('news.update', $news->id) }}" id="profile_update" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" id="id" value="{{ $news->id }}"/>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <input type="text" class="form-control" name="date" id="datepicker"  placeholder="Date" value="{{ old('date',$news->date) }}">
                    </div>
                        @error('date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <textarea class="form-control" id="description" placeholder="Description*"  name="description" rows="3" required>{{ $news->description }}</textarea>
                    </div>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <br>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a href="{{ route('news.index') }}" class="btn btn-secondary mt-2">Cancel</a>
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
        $('#profile_update').validate({
            errorPlacement: function(error, element) {
                error.insertAfter( element.parent("div"));
            },
        });
    });
    $(document).ready(function() {
        $( "#datepicker" ).datepicker();
});
</script>
@endsection

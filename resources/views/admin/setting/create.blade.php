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
                    <h2 class="pageheader-title">Create Setting</h2>
                    <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('setting.index') }}" class="breadcrumb-link">Setting</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Create Setting</a></li>
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
                <h5 class="card-header">Create Setting</h5>
                <div class="card-body">
                  <form method="post" action="{{ route('setting.store') }}" id="profile_update" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Name*" value="{{ old('name') }}" required>
                    </div>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2 input_select2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-address-book"></i></span></div>
                        <select name="type" id="type" class="form-control select2" required>
                            <option value="Text" {{ old('type') == "Text" ? "selected" : "" }}>Text</option>
                            <option value="File" {{ old('type') == "File" ? "selected" : "" }}>File</option>
                        </select>
                    </div>
                    <div id="current_email_error" class="error"></div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <div class="input-group mb-2 custom_text_main" id="custom_text_main">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-file"></i></span></div>
                        <input type="text" class="form-control inputBar" name="value" id="value" value="{{ old('value') }}" required></textarea>
                    </div>
                    <div class="custom-file mb-2 custom_file_main hidden">
                        <input type="file" class="custom-file-input" name="image" id="image" required>
                        <label class="custom-file-label" for="customFile">Profile Image</label>
                    </div>
                        @error('value')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    <br>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a href="{{ route('setting.index') }}" class="btn btn-secondary mt-2">Cancel</a>
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
            rules: {
					name:{
						required: true,
						remote: {
							type: 'get',
							url: "{{ route('setting_unique_name_update') }}",
							data: {
								'name': function () {
									return $("#name").val();
								}
							},
							dataFilter: function(data) {
								var json = JSON.parse(data);
                                console.log(json.status == 1);
								if (json.status == 1) {
									return "\"" + json.message + "\"";
								}
								else {
									return 'true';
								}
							}
						}
					},
            }
        });

        $(document).on('change', '#type', function () {
                // $("#type").change(function (e) {
                    var type = $("#type").val();
                if(type == "File"){
                    $(".custom_file_main").removeClass("hidden");
                    $('.custom_text_main').addClass('hidden');
                } else {
                    console.log("Called");
                    $('#custom_text_main').removeClass('hidden');
                    $('.custom_file_main').addClass('hidden');
                }
        });
        $(document).on('change', '#value', function () {
				var html = '';
				$("#v_image_preview").empty();
				var file = $(this).get(0).files[0];
				var filename = file.name;
				var reader = new FileReader();
				reader.fileName = file.name;
				reader.onload = function(e) {
					html += '<span class="show_img"><img class="" src="'+e.target.result+'" style="width="80"; height="70";"></span>';
					$("#v_image_preview").append(html);
				}
				reader.readAsDataURL(file);
		});


    });
</script>
@endsection

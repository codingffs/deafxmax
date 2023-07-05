<h1>
    Your password is {{$password}}
</h1>
@if(str_contains($pre_url,'admin/login') || str_contains($pre_url,'forgetpassword.post'))
    <a href="{{route('admin_login')}}">Click here for login</a>
@else
    <a href="{{route('member_login')}}">Click here for login</a>
@endif

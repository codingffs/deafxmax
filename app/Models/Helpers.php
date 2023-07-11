<?php
use App\Models\Setting;
use App\Models\Kyc;
use App\Models\User;
use Illuminate\Support\Str;

if(! function_exists('routeActive')){
	function routeActive($routeName)
	{
		return	request()->routeIs($routeName) ? 'active' : '';
	}
}

if(! function_exists('getlogo')){
	function getlogo($key)
	{
		$Setting = Setting::where('slug_name',$key)->first();
        if($Setting != null){
		    return asset('admin_images/setting').'/'.$Setting->value;
        }
        return null;
	}
}
if(! function_exists('getKycFlag')){
	function getKycFlag()
	{
        $kyc = Kyc::where('user_id',auth()->user()->id)->where('flag',1)->first();
        if($kyc != null)
        {
            return '0';
        }
        else{
            return '1';
        }
	}
}
function get_profit_income_count(){
    $count = User::where('id',auth()->user()->id)->where('role_id',2)->sum('profit_income');
    return $count;
}

function get_team_income_count(){
    $count = User::where('name',auth()->user()->id)->sum('team_income');
    return $count;
}

function get_principal_amount_count(){
    $count = User::where('id',auth()->user()->id)->where('role_id',2)->sum('principal_amount');
    return $count;
}
function get_employe_count(){
    $count = User::where('role_id',2)->count();
    return $count;
}

function get_amount_count(){
    $count = User::where('role_id',2)->sum('principal_amount');
    return $count;
}
function get_mydirect_count(){
    $count = User::where('auther_id',1)->where('name',auth()->user()->id)->count();
    return $count;
}
function get_myteam_count(){
    $count = User::where('parent_id',auth()->user()->id)->count();
    return $count;
}
function get_member_code_count(){
    $count = User::where('id',auth()->user()->id)->first();
    $data = $count->code;
    $data1 = $count->label_name;
    return $data;
}
function get_member_data_count(){
    $count = User::where('id',auth()->user()->id)->first();
    $data1 = $count->label_name;
    return $data1;
}
function get_date_of_join_count(){
    $count = User::where('parent_id',1)->where('name',null)->first();
    $data = isset($count->date) ? $count->date : date('Y-m-d');
    return $data;
}

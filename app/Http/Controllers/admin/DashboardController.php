<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BankDetails;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use Hash;
use Auth;
use App\Models\Kyc;

class DashboardController extends Controller
{
    public function index(){
        $kyc = Kyc::first();
        return view('admin.dashboard.index',compact('kyc'));
    }

    public function profile_edit(){
        $user = User::find(auth()->user()->id);
        $State =  State::get();
        return view('admin.profile.edit',compact('user','State'));
    }

    public function profile_update(Request $request,$id){
        $request->validate([
            'label_name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'address' => 'required',
        ]);
        try {
            $profile = User::find($id);

            $User = array(
                "label_name" => $request->label_name,
                "email" => $request->email,
                "mobile_no" => $request->mobile_no,
                "address" => $request->address,
                "state" => $request->state,
                "city" => $request->city,
            );
            if(isset($request->image) && !empty($request->image)){
                if(isset($profile->image) && $profile->image != ""){
                    $name_image = str_replace(url('admin_images/my_profile').'/', '', $profile->image);
                    $image_path = public_path('admin_images/my_profile').'/'.$name_image;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                }
                $imagename = rand(0000,9999) . time().'.'.$request->image->extension();
                $request->image->move(public_path('admin_images/my_profile'), $imagename);
                $User['image'] = $imagename;
            }
            User::whereId($id)->update($User);
            return redirect()->route("profile_edit")->with("success", "Profile Updated Successfully.");

        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function change_password(){
        return view('admin.profile.change-password');
    }

    public function current_auth_password(Request $request)
    {
        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            return response()->json(['status' => 1,'message' => "Password doesn't match with current password"]);
        }
        else {
            return response()->json(['status' => 0]);
        }
    }

    public function change_password_post(Request $request){
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);
        try{
            $user = array(
                "password" => Hash::make($request->new_password),
            );
            Auth::user()->update($user);
            return redirect()->back()->with("success", "Password changed successfully.");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
    public function view_account()
    {
        $user = User::find(auth()->user()->id);
        $State =  State::get();
         return view('admin.profile.view-account',compact('user','State'));
        // return response()->json(['html' => $html]);
    }

        public function bank_details() {
            $bank_details = BankDetails::where('user_id',auth()->user()->id)->first();
            return view('admin.profile.bank_details',compact('bank_details'));
      }

    public function bank_details_update(Request $request) {
        $request->validate([
            'bank_name'=>'required',
            'account_no'=>'required',
            'ifsc_code'=>'required',
            'branch_name'=>'required',
        ]);
        $bank_details = array(
            "bank_name" =>$request->bank_name,
            "account_no" => $request->account_no,
            "ifsc_code" => $request->ifsc_code,
            "branch_name" => $request->branch_name,
            "user_id" => auth()->user()->id,
        );
        if($request->bank_details_id != null){
            BankDetails::whereId($request->bank_details_id)->update($bank_details);
        }
        else{
            BankDetails::create($bank_details);
        }
     return redirect()->back()->with("success", "Bank Details Updated Successfully.");
        }


}

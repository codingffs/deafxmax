<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kyc;

class KycController extends Controller
{
    public function index(){

        return view('admin.dashboard.index');
    }
    public function create()
    {
        if(getKycFlag() == 0){
            return back()->with(['error' => 'Unauthorized Access.']);
        }
        return view('admin.kyc.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'act_number' => 'required',
            'ifsc_code' => 'required',
            'document1' => 'required',
            'pancard_number' => 'required',
            'name_of_holder' => 'required',
            'document2' => 'required',
        ]);
            $kyc = array(
                "bank_name" => $request->bank_name,
                "user_id" => auth()->user()->id,
                "act_number" => $request->act_number,
                "ifsc_code" => $request->ifsc_code,
                "pancard_number" => $request->pancard_number,
                "name_of_holder" => $request->name_of_holder,
            );
            if(isset($request->document1))
            {
                $value = rand(0000,9999) . time().'.'.$request->document1->extension();
                $request->document1->move(public_path('admin_images/kyc'), $value);
                $kyc['document1'] = $value;
            }
            if(isset($request->document2))
            {
                $value1 = rand(0000,9999) . time().'.'.$request->document2->extension();
                $request->document2->move(public_path('admin_images/kyc'), $value1);
                $kyc['document2'] = $value1;
            }
            $kyc = Kyc::create($kyc);
            return redirect()->route("dashboard")->with("success", "Kyc created Successfully.");
    }
}

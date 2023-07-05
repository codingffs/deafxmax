<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepositDetails;
use DataTables;

class DepositController extends Controller
{
    public function index(Request $request)
    {
            if ($request->ajax()) {
                if(auth()->user()->role_id == 1){
                    $depositdetails = DepositDetails::orderBy('created_at','desc')->get();
                }
                else{
                    $depositdetails = DepositDetails::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
                }
                return DataTables::of($depositdetails)
                   ->addIndexColumn()
                   ->editcolumn('user_id', function($row){
                    return isset($row->user_data->name)?$row->user_data->name:'';
                   })
                    ->editcolumn('image', function($row){
                        return '<div class="m-r-10"><img src="'.url('admin_images/deposit/'.$row->image).'" alt="user" class="rounded-circle img_deposit" /></div>';
                      })
                      ->rawColumns(['image','user_id'])
                      ->make(true);
                    }

            return view('admin.depositdetails.index');

    }
    public function create()
    {
        return view('admin.depositdetails.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'bank_acc_no' => 'required',
            'amount' => 'required',
            'deposit_type' => 'required',
        ]);

            $depositdetails = array(
                "bank_acc_no" => $request->bank_acc_no,
                "user_id" => auth()->user()->id,
                "amount" => $request->amount,
                "deposit_type" => $request->deposit_type,
            );
            if(isset($request->image))
            {
                $value = rand(0000,9999) . time().'.'.$request->image->extension();
                $request->image->move(public_path('admin_images/deposit'), $value);
                $depositdetails['image'] = $value;
            }
            $depositdetails = DepositDetails::create($depositdetails);
            return redirect()->route("depositdetails.index")->with("success", "Deposit created Successfully.");
    }
}

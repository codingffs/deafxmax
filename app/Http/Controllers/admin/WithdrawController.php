<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;
use DataTables;


class WithdrawController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {
            if(auth()->user()->role_id == 2){
                $Withdraw = Withdraw::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
            }
            return DataTables::of($Withdraw)
               ->addIndexColumn()
                  ->make(true);
                }

        return view('admin.withdraw.index');
    }

    public function create()
    {
        return view('admin.withdraw.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
        ]);

            $Withdraw = array(
                "withdraw_type" => $request->withdraw_type,
                "user_id" => auth()->user()->id,
                "amount" => $request->amount,
                "flag" => 1,
                "message" => auth()->user()->name.' '.'has requested for withdraw' . ' ' . $request->amount .'/- '. 'Amount',
            );
            $Withdraw = Withdraw::create($Withdraw);
            return redirect()->route("withdraw.index")->with("success", "Withdraw created Successfully.");
    }

    public function notification()
    {
        if(auth()->user()->role_id == 1){
            $Withdraw = Withdraw::orderBy('created_at','desc')->get();
        }
        return view('admin.notification',compact('Withdraw'));
    }

    public function approve($id)
    {
        $Withdraw = Withdraw::find($id);
        $Withdraw->flag = 2; //Approve
        Session::flash('success', 'Withdraw hase been approved Successfully !');
        $Withdraw->save();
       return response()->json(['status'=> 1]);
    }
}

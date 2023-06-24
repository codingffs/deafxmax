<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Members;
use App\Models\Kyc;
use DataTables;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class MembersController extends Controller
{

    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                if(auth()->user()->role_id == 1){
                    $User = User::where('parent_id',null)->orderBy('created_at','desc')->get();
                }
                else{
                    $User = User::where('parent_id',auth()->user()->id)->orderBy('created_at','desc')->get();

                }
                return DataTables::of($User)
                        ->addIndexColumn()
                        ->addColumn('action',function($row){
                            $btn = "";
                            $btn .= '<a href="'. route('members.edit', $row->id) .'" class="table-action-btn edit btn btn-primary m-1" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                            $btn .= '<a href="javascript:void(0)" data-url="'. route('members.destroy', $row->id) .'" class="table-action-btn btn btn-danger m-1 delete_btn" data-id="'. $row->id .'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                            if(auth()->user()->role_id == 1){
                                $btn .= '<a href="'. route('view_data', $row->id) .'" class="table-action-btn btn btn-info m-1 emp_view"><i class="fas fa-eye"></i></a>';
                                $btn .= '<a href="'. route('view_parent_data', $row->id) .'" class="table-action-btn btn btn-success m-1 emp_view"><i class="fa fa-users"></i></a>';
                            }
                            if(auth()->user()->role_id == 2){
                                $btn .= '<a href="'. route('view_member_data', $row->id) .'" class="table-action-btn btn btn-info m-1 emp_view"><i class="fas fa-eye"></i></a>';
                            }
                            return $btn;
                        })
                        ->make(true);
                    }

            return view('admin.members.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    public function show($id){
        //
    }

    public function create()
    {
        $User = User::where('parent_id',null)->orderBy('created_at','desc')->get();
        return view('admin.members.create',compact('User'));
    }
    #store members
    public function store(Request $request)
    {
        $request->validate([
            'mobile_no' => 'required',
            'email' => 'required',
            'pancard_no' => 'required',
            'bank_act_no' => 'required',
            'profit_income' => 'required',
            'team_income' => 'required',
            'member_code' => 'required',
            'principal_amount' => 'required',
            'referal_code' => 'required',
        ]);

            $User = new User();
            if(auth()->user()->role_id == 2){
                $User->parent_id = auth()->user()->id;
            }
            else{
                $password = 123456;
                $User->password = Hash::make($password);
            }
            $User->name = $request->name;
            $User->label_name = $request->label_name;
            $User->parent_id = $request->name;
            $User->mobile_no = $request->mobile_no;
            $User->email = $request->email;
            $User->pancard_no = $request->pancard_no;
            $User->bank_act_no = $request->bank_act_no;
            $User->profit_income = $request->profit_income;
            $User->team_income = $request->team_income;
            $User->member_code = $request->member_code;
            $User->principal_amount = $request->principal_amount;
            $User->referal_code = $request->referal_code;
            $User->role_id = 2;
            $User->date = date('d-m-Y');
            $User->date_member = date('d-m-Y');
            // $User = User::create($User);
            Mail::send('email.registermail', ['password' => $password,'User' => $User], function($message) use ($request){
                $message->to($request->email);
                $message->subject('New User Register');
            });
            $User->save();
            if($User->parent_id == null ){

                return redirect()->route('members.index')->with('success','Members create successfully');
            }
            else{
                return redirect()->route('view_parent_data',$User->parent_id)->with('success',' Parent Members create successfully');

            }

    }
        public function edit(string $id)
    {
        $User = User::find($id);
        return view('admin.members.edit',compact('User'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'mobile_no' => 'required',
            'email' => 'required',
            'pancard_no' => 'required',
            'bank_act_no' => 'required',
            'profit_income' => 'required',
            'team_income' => 'required',
            'member_code' => 'required',
            'principal_amount' => 'required',
            'referal_code' => 'required',
        ]);

            $User = User::find($id);
            // if(auth()->user()->role_id == 2){
            //     $User->parent_id = auth()->user()->id;
            // }
            $User->name = $request->name;
            $User->label_name = $request->label_name;
            // $User->parent_id = $request->name;
            $User->mobile_no = $request->mobile_no;
            $User->email = $request->email;
            $User->pancard_no = $request->pancard_no;
            $User->bank_act_no = $request->bank_act_no;
            $User->profit_income = $request->profit_income;
            $User->team_income = $request->team_income;
            $User->member_code = $request->member_code;
            $User->principal_amount = $request->principal_amount;
            $User->referal_code = $request->referal_code;
            $User->role_id = 2;
            $User->save();
            if($User->parent_id == null ){

                return redirect()->route('members.index')->with('success','Members updated successfully');
            }
            else{
                return redirect()->route('view_parent_data',$User->parent_id)->with('success',' Parent Members updated successfully');

            }
    }
    public function destroy($id)
    {
        $User = User::find($id);
        $parent_id = isset($User->parent_id) ? $User->parent_id : null;
        if ($User->parent_id == null) {
            User::where('parent_id', $id)->delete();
            $User->delete();
            return response()->json(["status" => 1]);
        } else {
            $User->delete();
            return response()->json(["status" => 0,"parent_id" => $parent_id]);
        }
    }

    public function members_destroy($id){
        $User = User::find($id);
        $User->delete();
        return response()->json(["status" => 0]);
    }
    public function view_data($id)
    {
         $user = User::find($id);
         $kyc = Kyc::where('user_id',$id)->get();
         return view('admin.members.view_data',compact('user','kyc'));
    }

    public function view_member_data($id)
    {
         $user_data = User::find($id);
         $kyc = User::where('id',$id)->get();
         return view('admin.members.member_view_data',compact('user_data','kyc'));
    }
    public function kyc_approve($id)
    {
        $kyc = Kyc::find($id);
        $kyc->flag = 1; //Approve
        Session::flash('success', 'Kyc hase been approved Successfully !');
        $kyc->save();
       return response()->json(['status'=> 1]);
    }

    public function view_parent_data($id)
    {
        $kyc = User::where('parent_id',$id)->get();
         return view('admin.members.parent_data',compact('kyc'));
    }


}

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

    public function create()
    {
        return view('admin.members.create');
    }
    #store members
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'pancard_no' => 'required',
            'bank_act_no' => 'required',
            'profit_income' => 'required',
            'team_income' => 'required',
        ]);
        try{
            $User = new User();
            if(auth()->user()->role_id == 2){
                $User->parent_id = auth()->user()->id;
            }
            else{
                $password = 123456;
                $User->password = Hash::make($password);
            }
            $User->name = $request->name;
            $User->surname = $request->surname;
            $User->mobile_no = $request->mobile_no;
            $User->email = $request->email;
            $User->pancard_no = $request->pancard_no;
            $User->bank_act_no = $request->bank_act_no;
            $User->profit_income = $request->profit_income;
            $User->team_income = $request->team_income;
            $User->role_id = 2;
            $User->save();
            // dd($User);
            return redirect()->route('members.index')->with('success','Members created successfully');
        }catch(\Throwable $th){
            return redirect()->back()->with('error',$th->getMessage());
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
            'name' => 'required',
            'surname' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'pancard_no' => 'required',
            'bank_act_no' => 'required',
            'profit_income' => 'required',
            'team_income' => 'required',
        ]);
        try{
            $User = User::find($id);
            if(auth()->user()->role_id == 2){
                $User->parent_id = auth()->user()->id;
            }
            $User->name = $request->name;
            $User->surname = $request->surname;
            $User->mobile_no = $request->mobile_no;
            $User->email = $request->email;
            $User->pancard_no = $request->pancard_no;
            $User->bank_act_no = $request->bank_act_no;
            $User->profit_income = $request->profit_income;
            $User->team_income = $request->team_income;
            $User->role_id = 2;
            $User->save();
            return redirect()->route('members.index')->with('success','Members updated successfully');
        }catch(\Throwable $th){
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
    public function destroy(string $id)
    {
           if(User::whereId($id)->delete()){
               return response()->json(["status" => 1]);
           }
           else{
               return response()->json(["status" => 0]);
           }
    }

    public function view_data($id)
    {
         $user = User::find($id);
         $kyc = Kyc::where('user_id',$id)->get();
         return view('admin.members.view_data',compact('user','kyc'));
    }
    public function kyc_approve($id)
    {
        $kyc = Kyc::find($id);
        $kyc->flag = 1; //Approve
        Session::flash('success', 'Kyc hase been approved Successfully !');
        $kyc->save();
       return response()->json(['status'=> 1]);
    }


}

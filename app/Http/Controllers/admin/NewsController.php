<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            if(auth()->user()->role_id == 1){
                $news = News::get();
            }
            return DataTables::of($news)
                            ->addIndexColumn()
                            ->addColumn('action',function($row){
                                $btn = "";
                                $btn .= '<a href="'. route('news.edit', $row->id) .'" class="table-action-btn edit btn btn-primary m-1" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                                $btn .= '<a href="javascript:void(0)" data-url="'. route('news.destroy', $row->id) .'" class="table-action-btn btn btn-danger m-1 delete_btn" data-id="'. $row->id .'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                return $btn;
                            })
                                ->make(true);
                                }
           return view('admin.news.index');
    }
    public function create()
    {
        return view('admin.news.create');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'startdate' => 'required',
        //     'enddate' => 'required',
        //     'description' => 'required',
        //     'created_by' => 'required',
        // ]);
            $news = array(
                "date" => $request->date,
                "description" => $request->description,
            );
            $news = News::create($news);
            return redirect()->route("news.index")->with("success", "News created Successfully.");
    }
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit',compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'description' => 'required',
        ]);
            $news = array(
                "date" => $request->date,
                "description" => $request->description,
            );
            News::whereId($id)->update($news);
            return redirect()->route("news.index")->with("success", "News Updated Successfully.");
    }

    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return response()->json(["status" => 1]);
    }
}

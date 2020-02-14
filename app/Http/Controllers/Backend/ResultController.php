<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest;
use App\Model\Exam;
use App\Model\Inquiry;
use App\Model\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['results']=Result::orderBy('created_at', 'DESC')->get();
        return view('backend.result.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['inquiries']  = Inquiry::where('selection_status', '=', 0)
            ->pluck('student_name', 'id');
        $data['exam']=Exam::where('status','=',1)->pluck('title','id');
        return view('backend.result.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        $pass_marks=Exam::where('id','=',$request->exam_id)->pluck('pass_marks')->first();
        if((($request->obtained_marks)>($pass_marks))||(($request->obtained_marks)==($pass_marks))){
            $request->request->add(['status'=>1]);
            DB::table('inquiries')
                ->where('id', $request->inquiry_id)
                ->update(['selection_status' => 1]);
        }
               $id=Result::create($request->all());
                if ($id){
                    $request->session()->flash('success_message','Result Created Successfully');
                    //redirect back to result index page
                    return redirect()->route('result.index');
                }else{
                    $request->session()->flash('error_message','Result Creation Failed');
                    //redirect back to result index page
                    return redirect()->route('result.create');
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get result by id
        $data['result']=Result::find($id);
        return view('backend.result.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['inquiries']  = Inquiry::where('selection_status', '=', 0)
            ->pluck('student_name', 'id');
        $data['exam']=Exam::where('status','=',1)->pluck('title','id');
        $data['result']=Result::find($id);
        return view('backend.result.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result=Result::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);
        $pass_marks=Exam::where('id','=',$request->exam_id)->pluck('pass_marks');
        if((($request->obtained_marks)>($pass_marks))||(($request->obtained_marks)==($pass_marks))){
            $request->request->add(['status'=>1]);
            DB::table('inquiries')
                ->where('id', $request->inquiry_id)
                ->update(['selection_status' => 1]);
        }
        $status=$result->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Result Updated Successfully');
        }else{
            $request->session()->flash('error_message','Result Updated Failed');
        }
        //redirect back to result index page
        return redirect()->route('result.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get result id
        $result=Result::find($id);
        //delete
        if ($result->delete()){
            $request->session()->flash('success_message','Result Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Result Delete Failed');
        }
        //redirect back to result index page
        return redirect()->route('result.index');
    }
}

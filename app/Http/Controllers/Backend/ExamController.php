<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamRequest;
use App\Model\Exam;
use App\Model\ExamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
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
        $data['exams']=Exam::orderBy('created_at', 'DESC')->get();
        return view('backend.exam.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['exam_types']  = ExamType::where('status', '=', 1)
            ->pluck('name', 'id');
        return view('backend.exam.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
               $id=Exam::create($request->all());
                if ($id){
                    $request->session()->flash('success_message','Exam Created Successfully');
                    //redirect back to exam index page
                    return redirect()->route('exam.index');
                }else{
                    $request->session()->flash('error_message','Exam Creation Failed');
                    //redirect back to exam index page
                    return redirect()->route('exam.create');
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
        //get exam by id
        $data['exam']=Exam::find($id);
        return view('backend.exam.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //get examtype
        $data['exam_types']  = ExamType::where('status', '=', 1)
            ->pluck('name', 'id');
        //get exam by id
        $data['exam']=Exam::find($id);
        return view('backend.exam.edit',compact('data'));
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
        $exam=Exam::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$exam->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Exam Updated Successfully');
        }else{
            $request->session()->flash('error_message','Exam Updated Failed');
        }
        //redirect back to exam index page
        return redirect()->route('exam.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get exam id
        $exam=Exam::find($id);
        //delete
        if ($exam->delete()){
            $request->session()->flash('success_message','Exam Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Exam Delete Failed');
        }
        //redirect back to exam index page
        return redirect()->route('exam.index');
    }
}

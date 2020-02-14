<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamTypeRequest;
use App\Model\ExamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamTypeController extends Controller
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
        $data['examtypes']=ExamType::orderBy('created_at', 'DESC')->get();
        return view('backend.examtype.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.examtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamTypeRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
               $id=ExamType::create($request->all());
                if ($id){
                    $request->session()->flash('success_message','Parent Created Successfully');
                    //redirect back to examtype index page
                    return redirect()->route('examtype.index');
                }else{
                    $request->session()->flash('error_message','Parent Creation Failed');
                    //redirect back to examtype index page
                    return redirect()->route('examtype.create');
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
        //get examtype by id
        $data['examtype']=ExamType::find($id);
        return view('backend.examtype.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        //get examtype by id
        $data['examtype']=ExamType::find($id);
        return view('backend.examtype.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamTypeRequest $request, $id)
    {
        $examtype=ExamType::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$examtype->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Parent Updated Successfully');
        }else{
            $request->session()->flash('error_message','Parent Updated Failed');
        }
        //redirect back to examtype index page
        return redirect()->route('examtype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get examtype id
        $examtype=ExamType::find($id);
        //delete
        if ($examtype->delete()){
            $request->session()->flash('success_message','Parent Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Parent Delete Failed');
        }
        //redirect back to examtype index page
        return redirect()->route('examtype.index');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\InquiryRequest;
use App\Model\Batch;
use App\Model\Classes;
use App\Model\Exam;
use App\Model\Inquiry;
use App\Model\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
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
        $data['inquiries']=Inquiry::orderBy('created_at', 'DESC')->get();
        return view('backend.inquiry.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['batch']  = Batch::where('status', '=', 1)
            ->pluck('name', 'id');
        $data['classes']  = Classes::where('status', '=', 1)
            ->pluck('name', 'id');
        $data['exam']  = Exam::where('status', '=', 1)
            ->pluck('title', 'id');

        return view('backend.inquiry.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InquiryRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
               $id=Inquiry::create($request->all());
                if ($id){
                    $request->session()->flash('success_message','Inquiry Created Successfully');
                    //redirect back to inquiry index page
                    return redirect()->route('inquiry.index');
                }else{
                    $request->session()->flash('error_message','Inquiry Creation Failed');
                    //redirect back to inquiry index page
                    return redirect()->route('inquiry.create');
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
        //get inquiry by id
        $data['inquiry']=Inquiry::find($id);
        return view('backend.inquiry.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['batch']  = Batch::where('status', '=', 1)
            ->pluck('name', 'id');
        $data['classes']  = Classes::where('status', '=', 1)
            ->pluck('name', 'id');
        $data['exam']  = Exam::where('status', '=', 1)
            ->pluck('title', 'id');
        //get inquiry by id
        $data['inquiry']=Inquiry::find($id);
        return view('backend.inquiry.edit',compact('data'));
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
        $inquiry=Inquiry::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$inquiry->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Inquiry Updated Successfully');
        }else{
            $request->session()->flash('error_message','Inquiry Updated Failed');
        }
        //redirect back to inquiry index page
        return redirect()->route('inquiry.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get inquiry id
        $inquiry=Inquiry::find($id);
        //delete
        if ($inquiry->delete()){
            $request->session()->flash('success_message','Inquiry Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Inquiry Delete Failed');
        }
        //redirect back to inquiry index page
        return redirect()->route('inquiry.index');
    }


}

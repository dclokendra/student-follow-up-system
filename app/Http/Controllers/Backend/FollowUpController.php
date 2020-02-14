<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FollowUpRequest;
use App\Model\FollowUp;
use App\Model\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowUpController extends Controller
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
        $data['followups']=FollowUp::orderBy('created_at', 'DESC')->get();
//        dd($data);
        return view('backend.followup.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['inquires']  = Inquiry::where('selection_status', '=', 0)
            ->pluck('name', 'id');
        return view('backend.followup.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FollowUpRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
               $id=FollowUp::create($request->all());
                if ($id){
                    $request->session()->flash('success_message','Follow Up Created Successfully');
                    //redirect back to followup index page
                    return redirect()->route('followup.index');
                }else{
                    $request->session()->flash('error_message','Follow Up Creation Failed');
                    //redirect back to followup index page
                    return redirect()->route('followup.create');
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
        //get followup by id
        $data['followup']=FollowUp::find($id);
        return view('backend.followup.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get followup by id
        $data['inquires']  = Inquiry::where('selection_status', '=', 0)
            ->pluck('name', 'id');
        $data['followup']=FollowUp::find($id);
        return view('backend.followup.edit',compact('data'));
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
        $followup=FollowUp::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$followup->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Follow Up Updated Successfully');
        }else{
            $request->session()->flash('error_message','Follow Up Updated Failed');
        }
        //redirect back to followup index page
        return redirect()->route('followup.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get followup id
        $followup=FollowUp::find($id);
        //delete
        if ($followup->delete()){
            $request->session()->flash('success_message','Follow Up Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Follow Up Delete Failed');
        }
        //redirect back to followup index page
        return redirect()->route('followup.index');
    }
}

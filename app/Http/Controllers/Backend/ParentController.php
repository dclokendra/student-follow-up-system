<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentRequest;
use App\Model\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ParentController extends Controller
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
        $data['parents']=Parents::orderBy('created_at', 'DESC')->get();
        return view('backend.parent.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.parent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParentRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        $request->request->add(['password' => date('Y').''.strtoupper(Str::random(3)).''.rand(00, 99)]);
        $id=Parents::create($request->all());
                if ($id){
                    $request->session()->flash('success_message','Parent Created Successfully');
                    //redirect back to parent index page
                    return redirect()->route('parent.index');
                }else{
                    $request->session()->flash('error_message','Parent Creation Failed');
                    //redirect back to parent index page
                    return redirect()->route('parent.create');
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
        //get parent by id
        $data['parent']=Parents::find($id);
        return view('backend.parent.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        //get parent by id
        $data['parent']=Parents::find($id);
        return view('backend.parent.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParentRequest $request, $id)
    {
        $parent=Parents::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$parent->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Parent Updated Successfully');
        }else{
            $request->session()->flash('error_message','Parent Updated Failed');
        }
        //redirect back to parent index page
        return redirect()->route('parent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get parent id
        $parent=Parents::find($id);
        //delete
        if ($parent->delete()){
            $request->session()->flash('success_message','Parent Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Parent Delete Failed');
        }
        //redirect back to parent index page
        return redirect()->route('parent.index');
    }
}

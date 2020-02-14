<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ClassRequest;
use App\Model\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
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
        $data['classes']=Classes::orderBy('created_at', 'DESC')->get();
        //get all with order by
        //$data['categeories']=Tag::orderby('creatd_at','desc')->get();
        return view('backend.class.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
               $id=Classes::create($request->all());
                if ($id){
                    $request->session()->flash('success_message','Class Created Successfully');
                    //redirect back to class index page
                    return redirect()->route('class.index');
                }else{
                    $request->session()->flash('error_message','Class Creation Failed');
                    //redirect back to class index page
                    return redirect()->route('class.create');
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
        //get class by id
        $data['class']=Classes::find($id);
        return view('backend.class.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get class by id
        $data['class']=Classes::find($id);
        return view('backend.class.edit',compact('data'));
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
        $class=Classes::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$class->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Class Updated Successfully');
        }else{
            $request->session()->flash('error_message','Class Updated Failed');
        }
        //redirect back to class index page
        return redirect()->route('class.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get class id
        $class=Classes::find($id);
        //delete
        if ($class->delete()){
            $request->session()->flash('success_message','Class Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Class Delete Failed');
        }
        //redirect back to class index page
        return redirect()->route('class.index');
    }
}

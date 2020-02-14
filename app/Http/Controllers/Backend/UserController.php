<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
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
        $data['users']=User::all();

        return view('backend.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password=$request->input('password');
        $encrypt=Crypt::encryptString($password);
        $request->request->add(['password'=>$encrypt]);
        $id=User::create($request->all());
        if ($id){
            $request->session()->flash('success_message','User Created Successfully');
            //redirect back to tag index page
            return redirect()->route('user.index');
        }else{
            $request->session()->flash('error_message','User Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('user.create');
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
        //get user by id
        $data['user']=User::find($id);
        return view('backend.user.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        //get user by id
        $data['user']=User::find($id);
        return view('backend.user.edit',compact('data'));
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
        $user=User::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$user->update($request->all());

        if ($status){
            $request->session()->flash('success_message','User Updated Successfully');
        }else{
            $request->session()->flash('error_message','User Updated Failed');
        }
        //redirect back to user index page
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get user id
        $user=User::find($id);
        //delete
        if ($user->delete()){
            $request->session()->flash('success_message','Parent Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Parent Delete Failed');
        }
        //redirect back to user index page
        return redirect()->route('user.index');
    }
}

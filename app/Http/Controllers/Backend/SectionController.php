<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SectionRequest;
use App\Model\Batch;
use App\Model\Classes;
use App\Model\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
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
//        $users = DB::table('users')
//            ->join('contacts', 'users.id', '=', 'contacts.user_id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('users.*', 'contacts.phone', 'orders.price')
//            ->get();
        $data['sections'] =DB::table('sections')
                            ->join('batch_classes','sections.batch_class_id','=','batch_classes.id')
                            ->select('sections.*','batch_classes.title')
                            ->get();
//        dd($data);
        //get all with order by
        //$data['categeories']=Tag::orderby('creatd_at','desc')->get();
        return view('backend.section.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[];
//        Food::join('food_user', 'foods.id', '=', 'food_user.food_id')
//             ->join('users', 'food_user.user_id', '=', 'users.id')
//             ->join('mealtypes', 'food_user. mealtype_id', '=', 'mealtypes.id')
//             ->get();
        $data['batch_class'] =Classes::join('batch_classes','classes.id','=','batch_classes.class_id')
                                ->select('batch_classes.id','classes.name')
                                ->pluck('name','id');
//        dd($data['batch_class'][1]->name);
        return view('backend.section.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
//        dd($request);
        $request->request->add(['created_by'=>Auth::user()->id]);
               $id=Section::create($request->all());
                if ($id){
                    $request->session()->flash('success_message','Section Created Successfully');
                    //redirect back to section index page
                    return redirect()->route('section.index');
                }else{
                    $request->session()->flash('error_message','Section Creation Failed');
                    //redirect back to section index page
                    return redirect()->route('section.create');
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
        //get section by id
        $data['section'] =DB::table('sections')
            ->join('batch_classes','sections.batch_class_id','=','batch_classes.id')
            ->select('sections.*','batch_classes.title')
            ->where('sections.id', $id)
            ->get();
        return view('backend.section.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get section by id
        $data['section']=Section::find($id);
        return view('backend.section.edit',compact('data'));
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
        $section=Section::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$section->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Section Updated Successfully');
        }else{
            $request->session()->flash('error_message','Section Updated Failed');
        }
        //redirect back to section index page
        return redirect()->route('section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get section id
        $section=Section::find($id);
        //delete
        if ($section->delete()){
            $request->session()->flash('success_message','Section Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Section Delete Failed');
        }
        //redirect back to section index page
        return redirect()->route('section.index');
    }
}

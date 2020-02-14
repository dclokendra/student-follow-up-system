<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\BatchRequest;
use App\Http\Requests\ClassRequest;
use App\Model\Batch;
use App\Model\Classes;
use App\Model\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
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
        $data['batchs']=Batch::orderBy('created_at', 'DESC')->get();
        //get all with order by
        //$data['categeories']=Tag::orderby('creatd_at','desc')->get();
        return view('backend.batch.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.batch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BatchRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
               $id=Batch::create($request->all());
        $id->classes()->attach($request->input('class_id'));
                if ($id){
                    $request->session()->flash('success_message','Batch Created Successfully');
                    //redirect back to batch index page
                    return redirect()->route('batch.index');
                }else{
                    $request->session()->flash('error_message','Batch Creation Failed');
                    //redirect back to batch index page
                    return redirect()->route('batch.create');
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

//        if(!$data['batch_class'][0]->id){
            $data['classes'] = Classes::where('status', '=', 1)
                ->pluck('name', 'id');
//        }
        //get batch by id
        $data['batch']=Batch::find($id);
        $data['batch_class'] = $data['batch']->classes->all();
        return view('backend.batch.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        //get batch by id
        $data['batch']=Batch::find($id);
        return view('backend.batch.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BatchRequest $request, $id)
    {
        $batch=Batch::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$batch->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Batch Updated Successfully');
        }else{
            $request->session()->flash('error_message','Batch Updated Failed');
        }
        //redirect back to batch index page
        return redirect()->route('batch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get batch id
        $batch=Batch::find($id);
        //delete
        if ($batch->delete()){
            $request->session()->flash('success_message','Batch Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Batch Delete Failed');
        }
        //redirect back to batch index page
        return redirect()->route('batch.index');
    }
    public function addBatchClass (Request $request)
    {
        $batch = Batch::find($request->input('batch_id'));
        $batch->classes()->attach($request->input('class_id'), ['title'=> $request->input('title')
        ]);
        $request->session()->flash('success_message','Batch Class Added Successfully');
        return back();
    }
    public function updateBatchClass(Request $request, $id)
    {
        $batch = Batch::find($request->input('batch_id'));
        $batch->classes()->sync($request->input('class_id'),['title'=> $request->input('title')
        ]);
        $request->session()->flash($this->success_message, ' Batch Class  Successfully Updated !');
        return back();
    }
    public function batchList()
    {
        $data['batch_class'] = DB::table('batch_classes')->get();
        return view('backend.batchclass.index',compact('data'));
    }

}

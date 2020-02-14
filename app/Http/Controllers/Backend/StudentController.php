<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Model\Batch;
use App\Model\Classes;
use App\Model\Exam;
use App\Model\Inquiry;
use App\Model\Parents;
use App\Model\Section;
use App\Model\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentController extends Controller
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
        $data['students']=Student::orderBy('created_at', 'DESC')->get();
        return view('backend.student.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['parents']  = Parents::pluck('email','id');
//        if ($data['parents']->email!=$data['inquiries']){
            $data['inquiries']  = Inquiry::where([['selection_status', '=', 1], ['enroll_status', '=', 0]])
                ->pluck('name', 'id');
//        }

        return view('backend.student.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        if(!empty($request->file('student_photo'))){
            $path=base_path().'/public/images/student';
            $image=$request->file('student_photo');
            $name=uniqid().'_'.$image->getClientOriginalName();
            if($image->move($path,$name)){
                $request->request->add(['photo'=>$name]);
            }
        }

        $request->request->add(['student_code'=>date('Y').''.strtoupper(Str::random(3)).''.rand(00, 99)]);
        DB::table('inquiries')
            ->where('id', $request->inquiry_id)
            ->update(['enroll_status' => 1]);
        $request->request->add(['created_by'=>Auth::user()->id]);
               $id=Student::create($request->all());
        $parent= [
            'name' =>  $request->input('parent_name'),
            'email' =>$request->input('email'),
            'password' =>date('Y').''.strtoupper(Str::random(3)).''.rand(00, 99),
            'address' =>$request->input('permanent_address'),
            'occupation' =>$request->input('occupation'),
            'phone' =>$request->input('phone'),
            'created_by' =>Auth::user()->id,
        ];
        Parents::create($parent);
                if ($id){
                    $request->session()->flash('success_message','Student Created Successfully');
                    //redirect back to student index page
                    return redirect()->route('student.index');
                }else{
                    $request->session()->flash('error_message','Student Creation Failed');
                    //redirect back to student index page
                    return redirect()->route('student.create');
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
        //get student by id
        $data['student']=Student::find($id);
        //$data['batch_class']=DB::table('batch_classes')->pluck('title','id');
       // $data['sections']=Section::pluck('name','id');
        return view('backend.student.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['inquiries']  = Inquiry::where([['selection_status', '=', 1], ['enroll_status', '=', 1]])
            ->pluck('name', 'id');
        //get student by id
        $data['student']=Student::find($id);
        return view('backend.student.edit',compact('data'));
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
        $student=Student::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        if(!empty($request->file('student_photo'))) {
            $path = public_path() . '/images/student/';
            $image = $request->file('student_photo');
            $name = uniqid() . '_' . $image->getClientOriginalName();
            if ($image->move($path, $name)) {
                if (file_exists($path . $student->image))
                    unlink($path . $student->image);

                $request->request->add(['photo' => $name]);
            }
        }

        $status=$student->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Student Updated Successfully');
        }else{
            $request->session()->flash('error_message','Student Updated Failed');
        }
        //redirect back to student index page
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get student id
        $student=Student::find($id);
        //delete
        if ($student->delete()){
            $request->session()->flash('success_message','Student Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Student Delete Failed');
        }
        //redirect back to student index page
        return redirect()->route('student.index');
    }
    public function getInquiredStudent(Request $request)
    {
        $inquiry = Inquiry::find($_POST['inquiry_id']);

        return $inquiry;
    }



}

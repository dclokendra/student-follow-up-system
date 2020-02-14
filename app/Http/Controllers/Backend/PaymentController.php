<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Model\Exam;
use App\Model\ExamType;
use App\Model\Payment;
use App\Model\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
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
        $data['payments']=Payment::orderBy('created_at', 'DESC')->get();
        return view('backend.payment.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data[]=0;
        $data['students']  = Student::pluck('name','id');
        return view('backend.payment.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
               $id=Payment::create($request->all());
                if ($id){
                    $request->session()->flash('success_message','Payment Created Successfully');
                    //redirect back to payment index page
                    return redirect()->route('payment.index');
                }else{
                    $request->session()->flash('error_message','Payment Creation Failed');
                    //redirect back to payment index page
                    return redirect()->route('payment.create');
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
        //get payment by id
        $data['payment']=Payment::find($id);
        return view('backend.payment.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

//        //get student
        $data['students']  = Student::pluck('name', 'id');
        //get payment by id
        $data['payment']=Payment::find($id);
        return view('backend.payment.edit',compact('data'));
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
        $payment=Payment::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$payment->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Payment Updated Successfully');
        }else{
            $request->session()->flash('error_message','Payment Updated Failed');
        }
        //redirect back to payment index page
        return redirect()->route('payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get payment id
        $payment=Payment::find($id);
        //delete
        if ($payment->delete()){
            $request->session()->flash('success_message','Payment Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Payment Delete Failed');
        }
        //redirect back to payment index page
        return redirect()->route('payment.index');
    }
}

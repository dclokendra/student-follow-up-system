<div class="box-body">
    <div class="form-group">
        {!! Form::label('student_id', 'Student Name ') !!}<span class="mfield">*</span>
        {{Form::select("student_id",$data['students'],null,[ "class" => "form-control",
               "placeholder" => "Select Student ","id"=>"student_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'student_id'])
    </div>
    <div class="form-group">
        {!! Form::label('type', 'Type') !!}<span class="mfield">*</span>
        {!! Form::text('type',null, ["placeholder" => "Enter Type", "class" => "form-control","id"=>"type"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'type'])
    </div>
{{--
id	student_id	type	total_amount	paid_amount	paid_date	status--}}
    <div class="form-group">
        {!! Form::label('total_amount', 'Total Amount') !!}<span class="mfield">*</span>
        {!! Form::number('total_amount',null, ["placeholder" => "Enter Total Amount", "class" => "form-control","id"=>"total_amount"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'total_amount'])
    </div>
    <div class="form-group">
        {!! Form::label('paid_amount', 'Paid Amount') !!}<span class="mfield">*</span>
        {!! Form::number('paid_amount',null, ["placeholder" => "Enter Paid Amount", "class" => "form-control","id"=>"paid_amount"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'paid_amount'])
    </div>
    <div class="form-group">
        {!! Form::label('paid_date', 'Paid Date') !!}<span class="mfield">*</span>
        {!! Form::date('paid_date',date('Y-m-d'), ["placeholder" => "Enter Paid Date", "class" => "form-control","id"=>"paid_date"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'paid_date'])
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>
        {!! Form::radio('status', 1, true) !!}Paid
        {!! Form::radio('status', 0, false) !!}Unpaid
        @include('layouts.includes.single_field_validation',['field'=>'status'])
    </div>
</div>

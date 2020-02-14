<div class="box-body">
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}<span class="mfield">*</span>
        {!! Form::text('name',null, ["placeholder" => "Enter Name", "class" => "form-control","id"=>"name"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'name'])
    </div>
    <div class="form-group">
        {!! Form::label('permanent_address', 'Permanent Address') !!}<span class="mfield">*</span>
        {!! Form::text('permanent_address',null, ["placeholder" => "Enter Permanent Address", "class" => "form-control","id"=>"permanent_address"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'permanent_address'])
    </div>
    <div class="form-group">
        {!! Form::label('temporary_address', 'Temporary Address') !!}<span class="mfield">*</span>
        {!! Form::text('temporary_address',null, ["placeholder" => "Enter Temporary Address", "class" => "form-control","id"=>"temporary_address"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'temporary_address'])
    </div>
    <div class="form-group">
        {!! Form::label('student_name', 'Student Name') !!}<span class="mfield">*</span>
        {!! Form::text('student_name',null, ["placeholder" => "Enter Student Name", "class" => "form-control","id"=>"student_name"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'student_name'])
    </div>
    {{-- 	phone	batch_id	class_id	exam_id	result_id	selection_status--}}
    <div class="form-group">
        {!! Form::label('phone', 'Phone') !!}<span class="mfield">*</span>
        {!! Form::number('phone',null, ["placeholder" => "Enter Phone", "class" => "form-control","id"=>"phone"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'phone'])
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email') !!}<span class="mfield">*</span>
        {!! Form::text('email',null, ["placeholder" => "Enter Email", "class" => "form-control","id"=>"email"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'email'])
    </div>
    <div class="form-group">
        {!! Form::label('batch_id', 'Batch ') !!}<span class="mfield">*</span>
        {{Form::select("batch_id",$data['batch'], null,[ "class" => "form-control select2",
               "placeholder" => "Select Batch ","id"=>"batch_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field'=>'batch_id'])
    </div>
    <div class="form-group">
        {!! Form::label('class_id', 'Class ') !!}<span class="mfield">*</span>
        {{Form::select("class_id",$data['classes'], null,[ "class" => "form-control select2",
               "placeholder" => "Select Class ","id"=>"class_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'class_id'])
    </div>
    <div class="form-group">
        {!! Form::label('exam_id', 'Exam ') !!}
        {{Form::select("exam_id",$data['exam'], null,[ "class" => "form-control select2",
               "placeholder" => "Select Exam ","id"=>"exam_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'exam_id'])
    </div>

</div>

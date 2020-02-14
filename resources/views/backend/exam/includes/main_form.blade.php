<div class="box-body">
    <div class="form-group">
        {!! Form::label('exam_type_id', 'Exam Type ') !!}<span class="mfield">*</span>
        {{Form::select("exam_type_id",$data['exam_types'],null,[ "class" => "form-control",
               "placeholder" => "Select Exam Type ","id"=>"exam_type_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'exam_type_id'])
    </div>
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}<span class="mfield">*</span>
        {!! Form::text('title',null, ["placeholder" => "Enter Title", "class" => "form-control","id"=>"title"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'title'])
    </div>
    <div class="form-group">
        {!! Form::label('exam_date', 'Exam Date') !!}<span class="mfield">*</span>
        {!! Form::date('exam_date',null, ["placeholder" => "Enter Exam Date", "class" => "form-control","id"=>"exam_date"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'exam_date'])
    </div>
    <div class="form-group">
        {!! Form::label('exam_time', 'Exam Time') !!}<span class="mfield">*</span>
        {!! Form::time('exam_time',null, ["placeholder" => "Enter Exam Time", "class" => "form-control","id"=>"exam_time"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'exam_time'])
    </div>
    <div class="form-group">
        {!! Form::label('full_marks', 'Full Marks') !!}<span class="mfield">*</span>
        {!! Form::number('full_marks',null, ["placeholder" => "Enter Full Marks", "class" => "form-control","id"=>"full_marks"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'full_marks'])
    </div>
    <div class="form-group">
        {!! Form::label('pass_marks', 'Pass Marks') !!}<span class="mfield">*</span>
        {!! Form::number('pass_marks',null, ["placeholder" => "Enter Pass Marks", "class" => "form-control","id"=>"pass_marks"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'pass_marks'])
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>
        {!! Form::radio('status', 1, true) !!}Active
        {!! Form::radio('status', 0, false) !!}Deactive
        @include('layouts.includes.single_field_validation',['field'=>'status'])
    </div>
</div>

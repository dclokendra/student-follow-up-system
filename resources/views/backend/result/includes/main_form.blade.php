<div class="box-body">
    <div class="form-group">
        {!! Form::label('exam_id', 'Exam ') !!}
        {{Form::select("exam_id",$data['exam'], null,[ "class" => "form-control",
               "placeholder" => "Select Exam ","id"=>"exam_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'exam_id'])
    </div>
    <div class="form-group">
        {!! Form::label('inquiry_id', 'Inquiry Name') !!}
        {{Form::select("inquiry_id",$data['inquiries'], null,[ "class" => "form-control",
               "placeholder" => "Select Inquiry Name","id"=>"inquiry_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'inquiry_id'])
    </div>
    <div class="form-group">
        {!! Form::label('obtained_marks', 'Obtained Marks') !!}<span class="mfield">*</span>
        {!! Form::number('obtained_marks',null, ["placeholder" => "Enter Obtained Marks", "class" => "form-control","id"=>"obtained_marks"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'obtained_marks'])
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}<span class="mfield">*</span>
        {!! Form::textarea('description',null, ["placeholder" => "Enter Description", "class" => "form-control"]) !!}
        @include('layouts.includes.single_field_validation',['field' => 'description'])
    </div>
{{--    <div class="form-group"> {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>--}}
{{--        <label class="radio-inline"> {!! Form::radio('status', 1, true) !!}Pass </label>--}}
{{--        <label class="radio-inline"> {!! Form::radio('status', 0, false) !!}Fail </label>--}}
{{--        @include('layouts.includes.single_field_validation',['field' => 'status'])--}}
{{--    </div>--}}
</div>

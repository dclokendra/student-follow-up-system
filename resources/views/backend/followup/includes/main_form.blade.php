<div class="box-body">
    <div class="form-group">
        {!! Form::label('inquiry_id', 'Inquiry ') !!}<span class="mfield">*</span>
        {{Form::select("inquiry_id",$data['inquires'],null,[ "class" => "form-control",
               "placeholder" => "Select Inquiry ","id"=>"inquiry_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'exam_type_id'])
    </div>
    <div class="form-group">
        {!! Form::label('follow_up_date', 'Follow Up Date') !!}<span class="mfield">*</span>
        {!! Form::date('follow_up_date',null, ["placeholder" => "Enter Follow Up Date", "class" => "form-control","id"=>"follow_up_date"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'follow_up_date'])
    </div>
    <div class="form-group">
        {!! Form::label('follow_up_time', 'Follow Up Time') !!}<span class="mfield">*</span>
        {!! Form::time('follow_up_time',null, ["placeholder" => "Enter Follow Up Time", "class" => "form-control","id"=>"follow_up_time"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'follow_up_time'])
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}<span class="mfield">*</span>
        {!! Form::textarea('description',null, ["placeholder" => "Enter Description", "class" => "form-control","rows"=>5]) !!}
        @include('layouts.includes.single_field_validation',['field' => 'description'])
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>
        {!! Form::radio('status', 1, true) !!}Active
        {!! Form::radio('status', 0, false) !!}Deactive
        @include('layouts.includes.single_field_validation',['field'=>'status'])
    </div>
</div>

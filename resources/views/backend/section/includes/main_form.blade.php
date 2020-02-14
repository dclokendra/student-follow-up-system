<div class="box-body">
    <div class="form-group">
        {!! Form::label('batch_class_id', 'Batch Class ') !!}<span class="mfield">*</span>
        {{Form::select("batch_class_id",$data['batch_class'],null,[ "class" => "form-control",
               "placeholder" => "Select Batch Class ","id"=>"batch_class_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'batch_class_id'])
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}<span class="mfield">*</span>
        {!! Form::text('name',null, ["placeholder" => "Enter Name", "class" => "form-control","id"=>"name"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'name'])
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>
        {!! Form::radio('status', 1, true) !!}Active
        {!! Form::radio('status', 0, false) !!}Deactive
        @include('layouts.includes.single_field_validation',['field'=>'status'])
    </div>
</div>

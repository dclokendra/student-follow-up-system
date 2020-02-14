<div class="box-body">
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}<span class="mfield">*</span>
        {!! Form::text('name',null, ["placeholder" => "Enter Name", "class" => "form-control","id"=>"name"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'name'])
    </div>
    <div class="form-group">
        {!! Form::label('numeric_name', 'Numeric Name') !!}<span class="mfield">*</span>
        {!! Form::number('numeric_name',null, ["placeholder" => "Enter Numeric Name", "class" => "form-control","id"=>"numeric_name","min"=>1]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'numeric_name'])
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>
        {!! Form::radio('status', 1, true) !!}Active
        {!! Form::radio('status', 0, false) !!}Deactive
        @include('layouts.includes.single_field_validation',['field'=>'status'])
    </div>
</div>

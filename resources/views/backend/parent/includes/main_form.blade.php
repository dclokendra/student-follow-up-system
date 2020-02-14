<div class="box-body">
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}<span class="mfield">*</span>
        {!! Form::text('name',null, ["placeholder" => "Enter Name", "class" => "form-control","id"=>"name"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'name'])
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email') !!}<span class="mfield">*</span>
        {!! Form::text('email',null, ["placeholder" => "Enter Email", "class" => "form-control","id"=>"email"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'email'])
    </div>
    <div class="form-group">
        {!! Form::label('address', 'Address') !!}<span class="mfield">*</span>
        {!! Form::text('address',null, ["placeholder" => "Enter Address", "class" => "form-control","id"=>"address"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'address'])
    </div>
    <div class="form-group">
        {!! Form::label('occupation', 'Occupation') !!}<span class="mfield">*</span>
        {!! Form::text('occupation',null, ["placeholder" => "Enter Occupation", "class" => "form-control","id"=>"occupation"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'occupation'])
    </div>
    <div class="form-group">
        {!! Form::label('phone', 'Phone') !!}<span class="mfield">*</span>
        {!! Form::number('phone',null, ["placeholder" => "Enter Phone", "class" => "form-control","id"=>"phone"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'phone'])
    </div>
</div>

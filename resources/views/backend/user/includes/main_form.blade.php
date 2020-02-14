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
        {!! Form::label('password', 'Password') !!}<span class="mfield">*</span>
        {!! Form::password('password',null, ["placeholder" => "Enter Password", "class" => "form-control","id"=>"password"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'password'])
    </div>
</div>

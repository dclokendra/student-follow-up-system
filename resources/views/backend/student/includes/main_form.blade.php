<div class="box-body">
    <div class="form-group">
        {!! Form::label('inquiry_id', 'Inquiry Name') !!}
        {{Form::select("inquiry_id",$data['inquiries'], null,[ "class" => "form-control",
               "placeholder" => "Select Inquiry ","id"=>"inquiry_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'inquiry_id'])
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}<span class="mfield">*</span>
        {!! Form::text('name',null, ["placeholder" => "Enter Name", "class" => "form-control","id"=>"name"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'name'])
    </div>
    @if(isset($data['row']))
        <div class="form-group">
            {!! Form::label('photo', 'Existing photo') !!}<br>
            @if($data['row']->photo)
                <img src="{{asset('images/student').'/'. $data['row']->photo}}" alt="{{$data['row']->photo}}" width="200" class="img-responsivess">
            @else
                <p>No Photo</p>
            @endif
        </div>
    @endif
    <div class="form-group">
        {!! Form::label('student_photo', 'Photo') !!}<span class="mfield">*</span>
        {!! Form::file('student_photo',null, ["placeholder" => "Select Photo", "class" => "form-control"]) !!}
        @include('layouts.includes.single_field_validation',['field' => 'student_photo'])
    </div>
    <div class="form-group">
        {!! Form::label('dob_bs', 'Date of Birth(BS)') !!}<span class="mfield">*</span>
        {!! Form::date('dob_bs',null, ["placeholder" => "Enter Date of Birth", "class" => "form-control","id"=>"dob_bs"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'dob_bs'])
    </div>
    <div class="form-group"> {!! Form::label('gender', 'Gender',["class" => "radiostatus"]) !!}<br>
        <label class="radio-inline"> {!! Form::radio('gender', 1, true) !!}Male </label>
        <label class="radio-inline"> {!! Form::radio('gender', 0, false) !!}Female </label>
        @include('layouts.includes.single_field_validation',['field' => 'gender'])
    </div>
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
        {!! Form::label('register_date', 'Register Date') !!}<span class="mfield">*</span>
        {!! Form::date('register_date',date('Y-m-d'), ["placeholder" => "Enter Register Date", "class" => "form-control","id"=>"register_date"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'register_date'])
    </div>

    <div class="form-group">
        {!! Form::label('parent_name', 'Parent Name') !!}
        {!! Form::text('parent_name',null, ["placeholder" => "Enter Parent Name", "class" => "form-control","id"=>"parent_name"]) !!}

        @include('layouts.includes.single_field_validation',['field' => 'parent_name'])
    </div>
    <div class="form-group">
        {!! Form::label('occupation', 'Parent Occupation') !!}
        {!! Form::text('occupation',null, ["placeholder" => "Enter Parent Occupation", "class" => "form-control","id"=>"occupation"]) !!}

        @include('layouts.includes.single_field_validation',['field' => 'occupation'])
    </div>

</div>

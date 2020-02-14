@extends('layouts.backend')
@section('title','Change Password')

@section('content')

    <section class="content-header">
        <h1>
            Change Password
        </h1>
        <ol class="breadcrumb">
            <li><a href="route{{('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Change Password</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            @include('layouts.includes.flash')
            <div class="row">
                {!! Form::open(['route' => 'changePassword','method'=>'POST']) !!}

                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('current-password', 'Current Password', ['class' => 'control-label']) }}
                        {{ Form::password('current-password', ['class' => 'awesome form-control','placeholder'=>'Enter Current Password']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('new-password', 'New Password', ['class' => 'control-label']) }}
                        {{ Form::password('new-password', ['class' => 'awesome form-control','placeholder'=>'Enter New Password']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('new-password_confirmation', 'Confirm New Password', ['class' => 'control-label']) }}
                        {{ Form::password('new-password_confirmation', ['class' => 'awesome form-control','placeholder'=>'Enter Confirm New Password']) }}
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check icheck"></i> Change Password ! </button>
                    <button type="reset" class="btn btn-warning"><i class="fa fa-undo icheck"></i> Cancel</button>
                </div>
                <!-- /.box-footer-->
            {!! Form::close() !!}
            <!--/.col (right) -->
            </div>
        </div>

        <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
@endsection


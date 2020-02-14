@extends('layouts.backend')
@section('title','Edit Exam')

@section('content')

    <section class="content-header">
        <h1>
            Exam Management
            <small>it all about exam data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="{{route('exam.index')}}">Exam</a></li>
                        <li class="active">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Exam
                    <a href="{{route('exam.index')}}" class="btn btn-info"><i class="fa fa-list"></i>List</a>
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="row"> {!! Form::model($data['exam'],['route' => ['exam.update',$data['exam']->id], 'method' => 'PUT','files' => true]) !!}
                @csrf
                <div class="col-md-12">
                @include('backend.exam.includes.main_form')
                <!-- /.box-body -->

                    <div class="box-footer fboxm">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icheck"></i>Update </button>
                        <button type="reset" class="btn btn-warning"><i class="fa fa-undo icheck"></i>cancel</button>
                    </div>
                </div>

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


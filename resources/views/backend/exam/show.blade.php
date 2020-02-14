
@extends('layouts.backend')
@section('title','Show Exam')

@section('content')

    <section class="content-header">
        <h1>
            Exam Management
            <small>it all about exam data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('exam.index')}}">Exam</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Show Exam
                    <a href="{{route('exam.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Create</a>
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
            @include('layouts.includes.flash')
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Details of Exams</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                       aria-describedby="example1_info">
                                    @if($data['exam']->count() == 0 )
                                        <tr>
                                            <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <th width="25%">Exam Type</th>
                                            <td>{{$data['exam']->examType->name}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Title</th>
                                            <td>{{$data['exam']->title}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Full Marks</th>
                                            <td>{{$data['exam']->full_marks}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Pass Marks</th>
                                            <td>{{$data['exam']->pass_marks}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Exam Date</th>
                                            <td>{{$data['exam']->exam_date}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Exam Time</th>
                                            <td>{{$data['exam']->exam_time}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Status</th>
                                            <td>@if ($data['exam']->status==0)
                                                    <span class="label label-warning">Deactive</span>
                                                @else <span class="label label-success">Active</span>
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['exam']->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['exam']->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{Auth::user($data['exam']->created_by)->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>
                                                @if(!empty($data['exam']->updated_by))
                                                    {{\App\User::find($data['exam']->updated_by)->name}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>

                                            <td><a class="cust_btm btn btn-block btn-warning"
                                                   href="{{ route('exam.edit', ['id' => $data['exam']->id]) }}"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                            </td>


                                            <td class="custom_btn_delete">
                                                {!! Form::open(['route' => ['exam.destroy', $data['exam']->id], 'data-id'=> $data['exam']->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
                                                <button type="submit" title="Delete"><i
                                                        class="btn btn-sm btn-block btn-danger glyphicon glyphicon-trash"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>

                                            <script src="{{ asset('backend/js/general.js') }}"></script>
                                        </tr>

                                    @endif

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
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


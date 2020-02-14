@extends('layouts.backend')
@section('title','Show Result')
@section('content')
    <section class="content-header">
        <h1>
            Result Management
            <small>it all about result data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('result.index')}}">Result</a></li>
            <li class="active">Index</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Show Result
                    <a href="{{route('result.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('result.index')}}" class="btn btn-info"><i class="fa fa-list"></i>List</a>
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
                    <h3 class="box-title">Details of Results</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                       aria-describedby="example1_info">
                                    @if($data['result']->count() == 0 )
                                        <tr>
                                            <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <th width="25%">Inquiry Name</th>
                                            <td>{{$data['result']->inquiry->student_name}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Exam</th>
                                            <td>{{$data['result']->exam->title}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Marks Obtained</th>
                                            <td>{{$data['result']->obtained_marks}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Description</th>
                                            <td>{{$data['result']->description}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Status</th>
                                            <td>@if ($data['result']->status==0)
                                                    <span class="label label-warning">Fail</span>
                                                @else <span class="label label-success">Pass</span>
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['result']->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['result']->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{Auth::user($data['result']->created_by)->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>
                                                @if(!empty($data['result']->updated_by))
                                                    {{\App\User::find($data['result']->updated_by)->name}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a class="cust_btm btn btn-block btn-warning"
                                                   href="{{ route('result.edit', ['id' => $data['result']->id]) }}"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                            </td>
                                            <td class="custom_btn_delete">
                                                {!! Form::open(['route' => ['result.destroy', $data['result']->id], 'data-id'=> $data['result']->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
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


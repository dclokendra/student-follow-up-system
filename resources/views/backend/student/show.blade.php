
@extends('layouts.backend')
@section('title','Show Student')
@section('content')

    <section class="content-header">
        <h1>
            Student Management
            <small>it all about student data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('student.index')}}">Student</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Show Student
                    <a href="{{route('student.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('student.index')}}" class="btn btn-info"><i class="fa fa-plus"></i>List</a>
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
                    <h3 class="box-title">Details of Student</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                       aria-describedby="example1_info">
                                    @if($data['student']->count() == 0 )
                                        <tr>
                                            <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <th width="25%">Inquiry Name</th>
                                            <td>{{$data['student']->inquiry->name}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Name</th>
                                            <td>{{$data['student']->name}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Photo</th>
                                            @if ($data['student']->photo)
                                                <td><img src="{{asset('images/student').'/'. $data['student']->photo }}" height="70" width="70" alt="{{$data['student']->photo}}"/></td>
                                            @else
                                                <td>No Icon</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th width="25%">Date of Birth (BS)</th>
                                            <td>{{ date('D, j M Y', strtotime($data['student']->dob_bs)) }}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Gender</th>
                                            <td>{{$data['student']->gender}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Permanent Address</th>
                                            <td>{{$data['student']->permanent_address}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Temporary Address</th>
                                            <td>{{$data['student']->temporary_address}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Register Date</th>
                                            <td>{{ date('D, j M Y', strtotime($data['student']->register_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Parent Name</th>
                                            <td>{{$data['student']->parent_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['student']->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['student']->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{Auth::user($data['student']->created_by)->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>
                                                @if(!empty($data['student']->updated_by))
                                                    {{\App\User::find($data['student']->updated_by)->name}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>

                                            <td><a class="cust_btm btn btn-block btn-warning"
                                                   href="{{ route('student.edit', ['id' => $data['student']->id]) }}"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                            </td>


                                            <td class="custom_btn_delete">
                                                {!! Form::open(['route' => ['student.destroy', $data['student']->id], 'data-id'=> $data['student']->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
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


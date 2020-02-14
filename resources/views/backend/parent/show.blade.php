
@extends('layouts.backend')
@section('title','Show Parent')

@section('content')

    <section class="content-header">
        <h1>
            Parent Management
            <small>it all about parent data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('parent.index')}}">Parent</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Show Parent
                    <a href="{{route('parent.index')}}" class="btn btn-info"><i class="fa fa-list"></i>List</a>
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
                    <h3 class="box-title">Details of Parents</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                       aria-describedby="example1_info">
                                    @if($data['parent']->count() == 0 )
                                        <tr>
                                            <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <th width="25%">Name</th>
                                            <td>{{$data['parent']->name}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Email</th>
                                            <td>{{$data['parent']->email}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Address</th>
                                            <td>{{$data['parent']->address}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Occupation</th>
                                            <td>{{$data['parent']->occupation}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Phone</th>
                                            <td>{{$data['parent']->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['parent']->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['parent']->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{Auth::user($data['parent']->created_by)->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>
                                                @if(!empty($data['parent']->updated_by))
                                                    {{\App\User::find($data['parent']->updated_by)->name}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>

                                            <td><a class="cust_btm btn btn-block btn-warning"
                                                   href="{{ route('parent.edit', ['id' => $data['parent']->id]) }}"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                            </td>


                                            <td class="custom_btn_delete">
                                                {!! Form::open(['route' => ['parent.destroy', $data['parent']->id], 'data-id'=> $data['parent']->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
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


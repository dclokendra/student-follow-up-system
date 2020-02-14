
@extends('layouts.backend')
@section('title','Show Follow Up')

@section('content')

    <section class="content-header">
        <h1>
            Follow Up Management
            <small>it all about followup data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('followup.index')}}">Follow Up</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Show Follow Up
                    <a href="{{route('followup.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('followup.index')}}" class="btn btn-info"><i class="fa fa-list"></i>List</a>
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
                    <h3 class="box-title">Details of Follow Ups</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="followupple1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="followupple1" class="table table-bordered table-striped dataTable" role="grid"
                                       aria-describedby="followupple1_info">
                                    @if($data['followup']->count() == 0 )
                                        <tr>
                                            <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <th width="25%">Inquiry Name</th>
                                            <td>{{$data['followup']->inquiry->name}}</td>
                                        </tr>

                                        <tr>
                                            <th width="25%">Follow Up Date</th>
                                            <td>{{$data['followup']->follow_up_date}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Follow Up Time</th>
                                            <td>{{$data['followup']->follow_up_time}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Description</th>
                                            <td>{{$data['followup']->description}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Status</th>
                                            <td>@if ($data['followup']->status==0)
                                                    <span class="label label-warning">Deactive</span>
                                                @else <span class="label label-success">Active</span>
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['followup']->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['followup']->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{Auth::user($data['followup']->created_by)->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>
                                                @if(!empty($data['followup']->updated_by))
                                                    {{\App\User::find($data['followup']->updated_by)->name}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>

                                            <td><a class="cust_btm btn btn-block btn-warning"
                                                   href="{{ route('followup.edit', ['id' => $data['followup']->id]) }}"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                            </td>


                                            <td class="custom_btn_delete">
                                                {!! Form::open(['route' => ['followup.destroy', $data['followup']->id], 'data-id'=> $data['followup']->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
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


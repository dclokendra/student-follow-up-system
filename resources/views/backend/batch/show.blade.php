@extends('layouts.backend')
@section('title','Show Batch')
{{--@section('js')--}}
{{--    <script type="text/javascript">--}}
{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}
{{--        $(document).ready(function () {--}}
{{--            $(document).on('change', ".class_id", function (){--}}
{{--                var class_id=$('.class_id').val();--}}

{{--                var url = "{{URL::route('batch.getClassName')}}";--}}
{{--                $.ajax({--}}
{{--                    url:url,data:{'class_id':class_id},--}}
{{--                    method:'post',--}}
{{--                    dataType:'text',--}}
{{--                    success:function(resp){--}}
{{--                        console.log(resp);--}}
{{--                        document.getElementsByClassName("title").value=resp.name--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--            --}}{{--$('.class_id').change(function () {--}}
{{--            --}}{{--    var class_id = $('.class_id').val();--}}

{{--            --}}{{--    var url = "{{URL::route('batch.getClassName')}}";--}}
{{--            --}}{{--    $.ajax({--}}
{{--            --}}{{--        url: url,--}}
{{--            --}}{{--        data: {'class_id': class_id, '_token': '{!! csrf_token() !!}'},--}}
{{--            --}}{{--        method: 'post',--}}
{{--            --}}{{--        dataType:'json',--}}
{{--            --}}{{--        success: function (resp) {--}}
{{--            --}}{{--            alert("hekllo");--}}
{{--            --}}{{--            document.getElementsByClassName("title").value=resp.name ;--}}
{{--            --}}{{--        }--}}
{{--            --}}{{--    })--}}
{{--            --}}{{--})--}}
{{--        });--}}

{{--    </script>--}}
{{--@endsection--}}
@section('content')

    <section class="content-header">
        <h1>
            Batch Management
            <small>it all about batch data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Batch</a></li>
            <li class="active">Show</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Show Batch
                    <a href="{{route('batch.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('batch.index')}}" class="btn btn-info"><i class="fa fa-list"></i>List</a>
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
                    <h3 class="box-title">Details of Batch</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                       aria-describedby="example1_info">
                                    @if($data['batch']->count() == 0 )
                                        <tr>
                                            <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <th width="25%">Name</th>
                                            <td>{{$data['batch']->name}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Status</th>
                                            <td>@if ($data['batch']->status==0)
                                                    <span class="label label-warning">Deactive</span>
                                                @else <span class="label label-success">Active</span>
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['batch']->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['batch']->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{Auth::user($data['batch']->created_by)->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>{{Auth::user($data['batch']->updated_by)->name}}</td>
                                        </tr>
                                        <tr>

                                            <td><a class="cust_btm btn btn-block btn-warning"
                                                   href="{{ route('batch.edit', ['id' => $data['batch']->id]) }}"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                            </td>


                                            <td class="custom_btn_delete">
                                                {!! Form::open(['route' => ['batch.destroy', $data['batch']->id], 'data-id'=> $data['batch']->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
                                                <button type="submit" title="Delete" class="btn btn-danger"><i
                                                        class="glyphicon glyphicon-trash"></i>
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
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Batch Class</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered viewtable">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Class</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @php($k = 0)
                                    @foreach($data['batch_class'] as $batchclass)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ $batchclass->name }}</td>
                                            <td>{{ date('j M Y g:iA', strtotime($batchclass->created_at)) }} </td>
                                            <td>
                                                <a class="btn btn-warning" href="" data-toggle="modal" data-target="#editModal_{{$k}}"  title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                                                    {!! Form::open(['route' => ['batch.deleteBatchClass', $batchclass->id], 'data-id'=> $batchclass->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
                                                <button type="submit" title="Delete" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                                {!! Form::close() !!}
                                                <a class="btn btn-warning" href="" data-toggle="modal" data-target="#editModal_{{$k}}"  title="Edit"><i class="glyphicon glyphicon-edit"></i></a>

                                                <script src="{{ asset('backend/js/general.js') }}"></script>
                                                @include('backend.batch.includes.edit_batch_class',['index' => $k++])
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Class</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                </table>
                                <div class="addData">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Create</button>
                                </div>
                                @include('backend.batch.includes.add_batch_class')
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
@endsection


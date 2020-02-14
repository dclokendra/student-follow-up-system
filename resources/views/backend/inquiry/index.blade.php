
@extends('layouts.backend')
@section('title','List Inquiry')
@section('css')
    <link rel="stylesheet"
          href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Inquiry Management
            <small>it all about inquiry data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="{{route('inquiry.index')}}">Inquiry</a></li>
                        <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">List Inquiry
                    <a href="{{route('inquiry.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            @include('layouts.includes.flash')
                            <table id="example1" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr role="row">
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Permanent Address</th>
                                        <th>Student Name</th>
                                        <th>Phone</th>
                                        <th>Batch</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @if($data['inquiries'] == $data['inquiries']->count() > 0 )

                                    @foreach($data['inquiries'] as $inquiry)
                                        <tr role="row" class="odd">
                                            <td>{{ $i++ }}</td>
                                            <td class="sorting_1">{{ $inquiry->name }}</td>
                                            <td class="sorting_1">{{ $inquiry->permanent_address }}</td>
                                            <td class="sorting_1">{{ $inquiry->student_name }}</td>
                                            <td class="sorting_1">{{ $inquiry->phone }}</td>
                                            <td class="sorting_1">{{ $inquiry->batch->name }}</td>
                                            <td>{{ date('j M Y', strtotime($inquiry->created_at)) }} </td>
                                            <td>
                                                <div class="bedit">
{{--                                                    <a class="btn btn-primary"--}}
{{--                                                       href="{{ route('inquiry.followup', ['id' => $inquiry->id]) }}" title="Follow Up"><i--}}
{{--                                                            class="glyphicon glyphicon-calendar"></i></a>--}}
                                                    <a class="btn btn-success"
                                                       href="{{ route('inquiry.show', ['id' => $inquiry->id]) }}" title="View Details"><i
                                                            class="glyphicon glyphicon-eye-open"></i></a>
                                                    <a class="btn btn-warning"
                                                       href="{{ route('inquiry.edit', ['id' => $inquiry->id]) }}" title="Edit"><i
                                                            class="glyphicon glyphicon-edit"></i></a>

                                                    {!! Form::open(['route' => ['inquiry.destroy', $inquiry->id], 'data-id'=> $inquiry->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
                                                    <button type="submit" title="Delete" class="btn btn-adn  btn-danger"><i
                                                            class="glyphicon glyphicon-trash"></i></button>
                                                    {!! Form::close() !!}

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Data Not Found</td>
                                    </tr>
                                @endif
                                </tbody>
                                <thead>
                                <tr role="row">
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Permanent Address</th>
                                    <th>Student Name</th>
                                    <th>Phone</th>
                                    <th>Batch</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>

            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
@endsection
@section('js')
    <script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/alert.min.js') }}"></script>
    <script src="{{ asset('backend/js/alert.custom.js') }}"></script>
    <script src="{{ asset('backend/js/general.js') }}"></script>
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })

    </script>
@endsection

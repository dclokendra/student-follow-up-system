
@extends('layouts.backend')
@section('title','Show Payment')

@section('content')

    <section class="content-header">
        <h1>
            Payment Management
            <small>it all about payment data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('payment.index')}}">Payment</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Show Payment
                    <a href="{{route('payment.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('payment.index')}}" class="btn btn-info"><i class="fa fa-list"></i>List</a>
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
                    <h3 class="box-title">Details of Payments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="paymentple1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="paymentple1" class="table table-bordered table-striped dataTable" role="grid"
                                       aria-describedby="paymentple1_info">
                                    @if($data['payment']->count() == 0 )
                                        <tr>
                                            <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <th width="25%">Student Name</th>
                                            <td>{{$data['payment']->student->name}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Payment Type</th>
                                            <td>{{$data['payment']->type}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Total Amouunt</th>
                                            <td>{{$data['payment']->total_amount}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Paid Amount</th>
                                            <td>{{$data['payment']->paid_amount}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Payment Date</th>
                                            <td>{{$data['payment']->paid_date}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Status</th>
                                            <td>@if ($data['payment']->status==0)
                                                    <span class="label label-warning">Not Paid</span>
                                                @else <span class="label label-success">Paid</span>
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['payment']->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['payment']->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{Auth::user($data['payment']->created_by)->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>
                                                @if(!empty($data['payment']->updated_by))
                                                    {{\App\User::find($data['payment']->updated_by)->name}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>

                                            <td><a class="cust_btm btn btn-block btn-warning"
                                                   href="{{ route('payment.edit', ['id' => $data['payment']->id]) }}"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                            </td>


                                            <td class="custom_btn_delete">
                                                {!! Form::open(['route' => ['payment.destroy', $data['payment']->id], 'data-id'=> $data['payment']->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
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


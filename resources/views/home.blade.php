@extends('layouts.backend')
@section('title','Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"></a></li>
            <li class="active"></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{\App\Model\Student::count()}}</h3>

                        <p>Student</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <a href="{{route('student.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{\App\Model\Inquiry::count()}}</h3>

                        <p>Inquiry</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('inquiry.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
{{--            <!-- ./col -->--}}
{{--            <div class="col-lg-3 col-xs-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-yellow">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>44</h3>--}}

{{--                        <p>User Registrations</p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-person-add"></i>--}}
{{--                    </div>--}}
{{--                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- ./col -->--}}
{{--            <div class="col-lg-3 col-xs-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-red">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>65</h3>--}}

{{--                        <p>Unique Visitors</p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-pie-graph"></i>--}}
{{--                    </div>--}}
{{--                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- ./col -->
        </div>

        <!-- /.box -->

    </section>
    <!-- /.content -->@endsection

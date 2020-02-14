@extends('layouts.backend')
@section('title','Create Student')
@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#inquiry_id').change(function () {
                var inquiry_id = $('#inquiry_id').val();
                var url = "{{URL::route('student.getInquiredStudent')}}";
                $.ajax({
                    url: url,
                    data: {'inquiry_id': inquiry_id, '_token': '{!! csrf_token() !!}'},
                    method: 'post',
                    dataType:'json',
                    success: function (resp) {
                        document.getElementById("parent_name").value=resp.name ;
                        document.getElementById("email").value=resp.email ;
                        document.getElementById("permanent_address").value=resp.permanent_address ;
                        document.getElementById("temporary_address").value=resp.temporary_address ;
                        document.getElementById("name").value=resp.student_name;
                        document.getElementById("phone").value=resp.phone;

                    }
                })
            })
        });

    </script>
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Student Management
            <small>it all about student data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('student.create')}}">Student</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Student
                    <a href="{{route('student.index')}}" class="btn btn-info"><i class="fa fa-list"></i>List</a>
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="row"> {!! Form::open(['route' => 'student.store', 'method' => 'POST','files' => true]) !!}
               @csrf
                <div class="col-md-12">
                    @include('backend.student.includes.main_form')
                    <!-- /.box-body -->

                        <div class="box-footer fboxm">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check icheck"></i>Save </button>
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


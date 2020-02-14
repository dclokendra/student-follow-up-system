<!-- Modal -->
<div class="customModal">
    <div class="modal fade" id="editModal_{{$index}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editModalLabel">Edit Batch Class</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model($batchclass,['route' => ['batch.updateBatchClass', $batchclass->id], 'method' => 'PUT','files' => true]) !!}
                    {{--{!! Form::open(['route' => $base_route.'.addCourseFee', 'method' => 'POST','files' => true]) !!}--}}
                    <input type="hidden" name="batch_id" value="{{$data['batch']->id}}" >
                    <div class="form-group">
                        {!! Form::label('class_id', 'Class') !!}
                        {{Form::select("class_id",$data['classes'], $batchclass->id,[ "class" => "form-control",
                               "placeholder" => "Select Class name","id"=>"instructor_id"
                            ])}}
                        @include('layouts.includes.single_field_validation',['field' => 'class_id'])
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check icheck"></i>Save </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-undo icheck"></i>Close</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="customModal">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Batch Class</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'batch.addBatchClass', 'method' => 'POST','files' => true]) !!}
                    <input type="hidden" name="batch_id" value="{{$data['batch']->id}}" >
                    <div class="form-group">
                        {!! Form::label('class_id', 'Class ') !!}
                        {{Form::select("class_id",$data['classes'], null,["id"=>"class_id", "class" => "form-control class_id",
                               "placeholder" => "Select Class ","id"=>"class_id"
                            ])}}
                        @include('layouts.includes.single_field_validation',['field' => 'class_id'])
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', 'Title ') !!}
                        {{Form::text("title", null,["id"=>"title", "class" => "form-control title",
                               "placeholder" => "Enter Title ","id"=>"titlte"
                            ])}}
                    </div>
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


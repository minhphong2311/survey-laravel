

<div class="modal fade" id="modal-edit{{ $index->id }}">
    <div class="modal-dialog">
        <div class="modal-content text-left">
                <form class="form-horizontal form-horizontal{{ $index->id }}"
                    method="POST"
                    action="{{ url('admincp/' . $type . '/edit/' . $index->id) }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Edit Super Admin</h4>
                    </div>

                    <div class="box-body">
                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" id="name{{$index->id}}" name="name{{$index->id}}" laceholder="Name" value="{{ $index->name }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="control-label">Contact number</label>
                            <input type="text" class="form-control" id="phone{{$index->id}}" name="phone{{$index->id}}" laceholder="Contact number" value="{{ $index->phone }}">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <span class="help-block">{{ $errors->first('phone') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="{{ $errors->has('job_title') ? ' has-error' : '' }}">
                            <label for="job_title" class="control-label">Job title</label>
                            <input type="text" class="form-control" id="job_title{{$index->id}}" name="job_title{{$index->id}}" laceholder="Job title" value="{{ $index->job_title }}">
                            @if ($errors->has('job_title'))
                                <span class="help-block">
                                    <span class="help-block">{{ $errors->first('job_title') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email Address</label>
                            <input type="text" class="form-control" laceholder="Email Address" value="{{ $index->email }}" disabled>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Change password</label>
                            <input type="text" class="form-control" id="password{{$index->id}}" name="password{{$index->id}}" laceholder="Create password" value="">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer" style="margin-top: 15px;">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    jQuery('.form-horizontal{{ $index->id }}').validate({
        success: function(label) {},
        rules: {
            name{{$index->id}}: { required: true },
            phone{{$index->id}}: { required: true, number: true, minlength: 8, maxlength: 10 },
            job_title{{$index->id}}: { required: true }
        },
        messages: {
            phone: {
                number: "Please enter numbers only without any special characters"
            }
        }
    });
</script>

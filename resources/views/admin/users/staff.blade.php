<a href="#" class="btn btn-block btn-info btn-sm" title="Edit" data-toggle="modal"
    data-target="#modal-add-shop{{ $data->id }}">
    <span class="glyphicon glyphicon-edit"></span> Edit
</a>

<div class="modal fade" id="modal-add-shop{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <form class="form-horizontal form-horizontal{{ $data->id }}" method="POST"
                        action="{{ url('admincp/' . $type . '/update/' . $data->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <img class="profile-user-img img-responsive img-circle"
                            src="{{ asset('/admin/dist/img/noavatar.png') }}" alt="{{ Auth::user()->name }}">
                        <h3 class="profile-username text-center">{{ $data->name }}</h3>
                        <p class="text-muted text-center">{{ $data->email }}</p>

                        <div class="box-body">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}"
                                style="width: 100%;margin: auto;">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name{{ $data->id }}" name="name"
                                        laceholder="Name" value="{{ $data->name }}" style="width: 100%;">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <span class="help-block">{{ $errors->first('name') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}"
                                style="width: 100%;margin: auto;">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email{{ $data->id }}" name="email"
                                        laceholder="Email" value="{{ $data->email }}" style="width: 100%;" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}"
                                style="width: 100%;margin: auto;">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password{{ $data->id }}"
                                        name="password" laceholder="Password" style="width: 100%;">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <span class="help-block">{{ $errors->first('password') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="checkbox"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        $('[data-mask]').inputmask();
    })
    jQuery('.form-horizontal{{ $data->id }}').validate({
        success: function(label) {},
        rules: {
            name{{ $data->id }}: {
                required: true
            },
        },
        messages: {
            name{{ $data->id }}: {},
        }
    });
</script>

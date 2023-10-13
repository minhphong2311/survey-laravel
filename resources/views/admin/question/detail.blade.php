<!-- questionDetail -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-add"
                    style="margin-bottom: 5px;">
                    <span class="glyphicon glyphicon-plus-sign"></span> New
                </button>
                @if (session()->has('update_detail'))
                    <div class="box-body">
                        <div class="callout callout-info">
                            <p><i class="icon fa fa-check"></i> {{ session()->get('update_detail') }}</p>
                        </div>
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <table id="table" class="table table-bordered table-hover" style="width:100% !important;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sort</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Other</th>
                            <th style="width:150px;" class="action text-center">Action</th>
                        </tr>
                    </thead>
                    @if ($data->getQuestionDetail)
                        <tbody>
                            @foreach ($data->getQuestionDetail as $index)
                                <tr role="row">
                                    <td>{{ $index->id }}</td>
                                    <td>{{ $index->sort }}</td>
                                    <td>{{ $index->name }}</td>
                                    <td>{{$index->description}}</td>
                                    <td>
                                        @if ($index->other)<span class="fa fa-check" style="color: #00a65a"></span>@endif
                                    </td>
                                    <td>

                                        <a href="#{{ $index->id }}" class="btn btn-default btn-sm" title="Edit" data-toggle="modal" style="color: green"
                                            data-target="#modal-add-detail{{ $index->id }}">
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                        </a>

                                        <div class="modal fade" id="modal-add-detail{{ $index->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form class="form-horizontal form-horizontal{{ $index->id }}"
                                                        method="POST"
                                                        action="{{ url('admincp/question-detail/edit/' . $index->id) }}"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">Edit</h4>
                                                        </div>

                                                        <div class="box-body">
                                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}"
                                                                style="width: 100%;margin: auto;">
                                                                <label for="name"
                                                                    class="col-sm-2 control-label">Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="name{{ $index->id }}" name="name"
                                                                        laceholder="Name"
                                                                        value="{{ $index->name }}">
                                                                    @if ($errors->has('name'))
                                                                        <span class="help-block">
                                                                            <span
                                                                                class="help-block">{{ $errors->first('name') }}</span>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="box-body">
                                                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}"
                                                                style="width: 100%;margin: auto;">
                                                                <label for="description"
                                                                    class="col-sm-2 control-label">Description</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="description{{ $index->id }}" name="description"
                                                                        laceholder="Description"
                                                                        value="{{ $index->description }}">
                                                                    @if ($errors->has('description'))
                                                                        <span class="help-block">
                                                                            <span
                                                                                class="help-block">{{ $errors->first('description') }}</span>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="box-body">
                                                            <div class="form-group {{ $errors->has('sort') ? ' has-error' : '' }}"
                                                                style="width: 100%;margin: auto;">
                                                                <label for="sort"
                                                                    class="col-sm-2 control-label">Sort</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="sort{{ $index->id }}" name="sort"
                                                                        laceholder="Sort"
                                                                        value="{{ $index->sort }}">
                                                                    @if ($errors->has('sort'))
                                                                        <span class="help-block">
                                                                            <span
                                                                                class="help-block">{{ $errors->first('sort') }}</span>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="box-body">
                                                            <div class="form-group"
                                                                style="margin: 7px auto;line-height: 5px;">
                                                                <label for="other"
                                                                    class="col-sm-2 control-label">Other</label>
                                                                <div class="col-sm-10">
                                                                    <label>
                                                                        <input type="checkbox" class="minimal"
                                                                            name="other" value="1"
                                                                            {{ $index->other ? 'checked' : '' }}>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-info">Update</button>
                                                        </div>
                                                    </form>
                                                    <!-- /.box-body -->
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
                                            jQuery('.form-horizontal{{ $index->id }}').validate({
                                                success: function(label) {},
                                                rules: {
                                                    name{{ $index->id }}: {
                                                        required: true
                                                    },
                                                },
                                                messages: {
                                                    name{{ $index->id }}: {},
                                                }
                                            });
                                        </script>


                                        <a href="{{ url('admincp/question-detail/delete/' . $index->id) }}"
                                            class="btn btn-default btn-sm" title="Delete" style="color: red">
                                            <span class="glyphicon glyphicon-trash"></span> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Popup new questionDetail -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="POST"
                action="{{ url('admincp/question-detail/store/' . $data->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add</h4>
                </div>

                <div class="box-body">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" laceholder="Name"
                                value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description" laceholder="Description"
                                value="{{ old('description') }}">
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <span class="help-block">{{ $errors->first('description') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="box-body">
                    <div class="form-group" style="margin: 7px auto;line-height: 5px;">
                        <label for="other" class="col-sm-2 control-label">Other</label>
                        <div class="col-sm-10">
                            <label>
                                <input type="checkbox" class="minimal" name="other" value="1">
                            </label>
                        </div>
                    </div>
                </div>


                <!-- /.box-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- questionDetail -->

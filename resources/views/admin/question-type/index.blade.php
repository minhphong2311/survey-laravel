@extends('admin.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: 600;">Question Type</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        @if (session()->has('update'))
                            <div class="box-body">
                                <div class="callout callout-info">
                                    <p><i class="icon fa fa-check"></i> {{ session()->get('update') }}</p>
                                </div>
                            </div>
                        @endif
                        @if (session()->has('message'))
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <table id="table" class="table table-bordered table-hover" style="width:100% !important;">
                            <thead>
                                <tr>
                                    <th>Sort</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Active</th>
                                    <th style="width:80px;" class="action text-center">Action</th>
                                </tr>
                            </thead>
                            @if ($data)
                                <tbody>
                                    @foreach ($data as $index)
                                        <tr role="row">
                                            <td>{{ $index->sort }}</td>
                                            <td>{{ $index->name }}</td>
                                            <td>{{ $index->code }}</td>
                                            <td>
                                                @if ($index->active)
                                                    <span class="label label-success">Actived</span>
                                                @else
                                                    <span class="label label-warning">Deactivate</span>
                                                @endif
                                            </td>
                                            <td>

                                                <a href="#" class="btn btn-default" title="Edit" data-toggle="modal" style="color: green"
                                                    data-target="#modal-add-type{{ $index->id }}">
                                                    <span class="glyphicon glyphicon-edit"></span> Edit
                                                </a>

                                                <div class="modal fade" id="modal-add-type{{ $index->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form
                                                                class="form-horizontal form-horizontal{{ $index->id }}"
                                                                method="POST"
                                                                action="{{ url('admincp/question-type/edit/' . $index->id) }}"
                                                                enctype="multipart/form-data">
                                                                {{ csrf_field() }}

                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Edit</h4>
                                                                </div>
                                                                <div class="form-group"
                                                                    style="width: 100%;margin: 7px auto;line-height: 5px;">
                                                                    <label for="active"
                                                                        class="col-sm-2 control-label">Active</label>
                                                                    <div class="col-sm-10">
                                                                        <label style="margin-left: 6px;">
                                                                            <input type="checkbox" class="minimal"
                                                                                value="1" name="active"
                                                                                {{ $index->active ? 'checked' : '' }}>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="box-body">
                                                                    <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}"
                                                                        style="width: 100%;margin: auto;">
                                                                        <label for="code"
                                                                            class="col-sm-2 control-label">Code</label>
                                                                        <div class="col-sm-10">
                                                                            <label class="control-label"
                                                                                style="font-weight: normal;">{{ $index->code }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="box-body">
                                                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}"
                                                                        style="width: 100%;margin: auto;">
                                                                        <label for="name"
                                                                            class="col-sm-2 control-label">Name</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="name{{ $index->id }}"
                                                                                name="name" laceholder="Name"
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
                                                                    <div class="form-group {{ $errors->has('sort') ? ' has-error' : '' }}"
                                                                        style="width: 100%;margin: auto;">
                                                                        <label for="sort"
                                                                            class="col-sm-2 control-label">Sort</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="sort{{ $index->id }}"
                                                                                name="sort" laceholder="Sort"
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


                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-info">Update</button>
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

                                            </td>
                                        <tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

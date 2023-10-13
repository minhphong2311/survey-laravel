@extends('admin.index')
@section('content')

    <!-- Content Header -->
    <section class="content-header">
        <h1 style="font-weight: 600;">Manage Admin</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="toolbar col-sm-2">
                                <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#modal-add" style="max-width: 100px;">
                                    <span class="glyphicon glyphicon-plus-sign"></span> Add Admin
                                </button>
                                <div class="modal fade" id="modal-add">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-add" method="POST" action="{{ url('admincp/' . $type . '/store') }}"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Add Admin</h4>
                                                </div>
                                                <div class="box-body">
                                                    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label for="name" class="control-label">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" laceholder="Name" value="{{ old('name') }}">
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
                                                        <input type="text" class="form-control" id="phone" name="phone" laceholder="Contact number" value="{{ old('phone') }}">
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
                                                        <input type="text" class="form-control" id="job_title" name="job_title" laceholder="IC Number" value="{{ old('job_title') }}">
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
                                                        <input type="text" class="form-control" id="email" name="email" laceholder="Email Address" value="{{ old('email') }}">
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <span class="help-block">{{ $errors->first('email') }}</span>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label for="password" class="control-label">Create password</label>
                                                        <input type="text" class="form-control" id="password" name="password" laceholder="Create password" value="{{ old('password') }}">
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <span class="help-block">{{ $errors->first('password') }}</span>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer" style="margin-top: 15px;">
                                                    <button type="submit" class="btn btn-info">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if (session()->has('delete'))
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session()->get('delete') }}
                            </div>
                        @endif
                        <table id="table" class="table table-bordered table-hover" style="width:100% !important;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact Number</th>
                                    <th>Job title</th>
                                    <th>Email address</th>
                                    <th style="width:175px;" class="action text-center"></th>
                                </tr>
                            </thead>
                            @if ($data)
                                <tbody>
                                    @foreach ($data as $index)
                                        <tr role="row">
                                            <td>{{ $index->name }}</td>
                                            <td>{{ Str::formatPhone($index->phone) }}</td>
                                            <td>{{ $index->job_title }}</td>
                                            <td>{{ $index->email }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-default" href="#{{ $index->id }}" title="Edit" data-toggle="modal" data-target="#modal-edit{{ $index->id }}"  style="color: green">
                                                    <span class="fa fa-edit"></span> Edit
                                                </a>
                                                @include('admin.manage-admin.edit')

                                                &nbsp;&nbsp;
                                                <a class="btn btn-default" href="{{ url('admincp/' . $type . '/delete/' . $index->id) }}" title="Delete" style="color: red" onclick="return confirm('Delete admin?')">
                                                    <span class="fa fa-trash"></span> Delete
                                                </a>
                                            </td>
                                        <tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                        {!! $data->links() !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        jQuery('.form-add').validate({
            success: function(label) {},
            rules: {
                name: { required: true },
                phone: { required: true, number: true, minlength: 8, maxlength: 10 },
                job_title: { required: true },
                email: { required: true, email: true },
                password: { required: true },
            },
            messages: {
                phone: {
                    number: "Please enter numbers only without any special characters"
                }
            }
        });
    </script>
@endsection

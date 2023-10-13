@extends('admin.index')
@section('content')

    <!-- Content Header -->
    <section class="content-header">
        <h1 style="font-weight: 600;">Manage Staff</h1>
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
                                    <span class="glyphicon glyphicon-plus-sign"></span> Add Staff
                                </button>
                                <div class="modal fade" id="modal-add">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="POST" action="{{ url('admincp/' . $type . '/store') }}"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Add Staff</h4>
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
                                                    <div class="{{ $errors->has('ic_number') ? ' has-error' : '' }}">
                                                        <label for="ic_number" class="control-label">IC Number</label>
                                                        <input type="text" class="form-control" id="ic_number" name="ic_number" laceholder="IC Number" value="{{ old('ic_number') }}">
                                                        @if ($errors->has('ic_number'))
                                                            <span class="help-block">
                                                                <span class="help-block">{{ $errors->first('ic_number') }}</span>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="{{ $errors->has('title') ? ' has-error' : '' }}">
                                                        <label for="email" class="control-label">Email Address</label>
                                                        <input type="text" class="form-control" id="email" name="email" laceholder="Email Address" value="{{ old('email') }}">
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <span class="help-block">{{ $errors->first('email') }}</span>
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
                                    <th>IC number</th>
                                    <th>Email address</th>
                                    <th style="width:80px;" class="action text-center"></th>
                                </tr>
                            </thead>
                            @if ($data)
                                <tbody>
                                    @foreach ($data as $index)
                                        <tr role="row">
                                            <td>{{ $index->name }}</td>
                                            <td>{{ Str::formatPhone($index->phone) }}</td>
                                            <td>{{ Str::formatIC($index->ic_number) }}</td>
                                            <td>{{ $index->email }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-default btn-block" href="{{ url('admincp/' . $type . '/delete/' . $index->id) }}" title="Delete" style="color: red" onclick="return confirm('Delete staff?')">
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
        jQuery('.form-horizontal').validate({
            success: function(label) {},
            rules: {
                name: { required: true },
                phone: { required: true, number: true, minlength: 8, maxlength: 10 },
                ic_number: { required: true, number: true, minlength: 12, maxlength: 12 },
                email: { required: true, email: true },
            },
            messages: {
                phone: {
                    number: "Please enter numbers only without any special characters"
                },
                ic_number: {
                    number: "Please enter numbers only without any special characters"
                }
            }
        });
    </script>
@endsection

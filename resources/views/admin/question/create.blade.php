@extends('admin.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Question</h1>
        <ol class="breadcrumb">
            <li><a href="/admincp"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('admincp/' . $type) }}">Question</a></li>
            <li class="active">Edit Question</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->


                    <div class="box-header with-border">
                        <h3 class="box-title">New</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ url('admincp/' . $type . '/store/') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="col-md-12">

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
                                <div class="form-group {{ $errors->has('relationship') ? ' has-error' : '' }}">
                                    <label for="relationship" class="col-sm-2 control-label">Relationship question</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="relationship" name="relationship" laceholder="Relationship question"
                                            value="{{ old('relationship') }}">
                                        @if ($errors->has('relationship'))
                                            <span class="help-block">
                                                <span class="help-block">{{ $errors->first('relationship') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('relationship_answer') ? ' has-error' : '' }}">
                                    <label for="relationship_answer" class="col-sm-2 control-label">Relationship answer</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="relationship_answer" name="relationship_answer" laceholder="Relationship answer"
                                            value="{{ old('relationship_answer') }}">
                                        @if ($errors->has('relationship_answer'))
                                            <span class="help-block">
                                                <span class="help-block">{{ $errors->first('relationship_answer') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('type_id') ? ' has-error' : '' }}">
                                    <label for="type_id" class="col-sm-2 control-label">Type</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            @if ($questionType)
                                                @foreach ($questionType as $key => $index)
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="type_id"
                                                                id="optionsRadios{{ $index->id }}"
                                                                value="{{ $index->id }}"
                                                                {{ old('type_id') == $index->id ? 'checked=""' : '' }} @if ($key == 0) checked="" @endif>
                                                            {{ $index->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        @if ($errors->has('type_id'))
                                            <span class="help-block">
                                                <span class="help-block">{{ $errors->first('type_id') }}</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="text-center">
                                <a href="{{ url('/admincp/' . $type) }}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-info">Add</button>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </section>

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="checkbox"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
        })
    </script>
@endsection

@endsection

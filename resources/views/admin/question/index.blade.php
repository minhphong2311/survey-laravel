@extends('admin.index')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: 600;">Question</h1>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                @if (session()->has('message'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="box">
                    <div class="box-header">
                        <div class="toolbar col-sm-1">
                            <a href="{{ url('admincp/' . $type . '/create/') }}" class="btn btn-block btn-danger btn-sm" style="max-width: 150px;">
                                <span class="glyphicon glyphicon-plus-sign"></span> Add question
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <div class="dataTables_wrapper">
                                <div class="dataTables_length">
                                    <label>Show
                                        <select id="showEntries" name="table_length" aria-controls="table"
                                            class="form-control input-sm">
                                            <option {{ request()->session()->get('question_show') == '10'? 'selected': '' }} value="10">10</option>
                                            <option {{ request()->session()->get('question_show') == '25'? 'selected': '' }} value="25">25</option>
                                            <option {{ request()->session()->get('question_show') == '50'? 'selected': '' }} value="50">50</option>
                                            <option {{ request()->session()->get('question_show') == '100'? 'selected': '' }} value="100">100</option>
                                        </select> Entries</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="table" class="table table-bordered table-hover" style="width:100% !important;">
                            <thead>
                                <tr>
                                    <th>Sort</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Active</th>
                                    <th style="width:175px;" class="action text-center">Action</th>
                                </tr>
                            </thead>
                            @if ($data)
                            {{-- {{ dd($data) }} --}}
                            <tbody>
                                @foreach ($data as $index)
                                    <tr role="row">
                                        <td>{{ $index->sort }}</td>
                                        <td>{{ $index->name }}</td>
                                        <td>{{ $index->getQuestionType['code'] }}</td>
                                        <td>{!! $index->active?'<span class="label label-success">Actived</span>':'<span class="label label-warning">Deactivate</span>' !!}</td>
                                        <td class="text-center">
                                            <a class="btn btn-default" href="{{ url('admincp/' . $type . '/edit/' . $index->id) }}" title="Edit" style="color: green">
                                                <span class="fa fa-edit"></span> Edit
                                            </a>
                                            &nbsp;&nbsp;
                                            <a class="btn btn-default" href="{{ url('admincp/' . $type . '/delete/' . $index->id) }}" title="Delete" style="color: red" onclick="return confirm('Delete question?')">
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

    @section('script')
    <script type="text/javascript">
        $('#showEntries').on('change', function() {
            location.href = '/admincp/{{ $type }}/show/' + this.value;
        });
    </script>
    @endsection
@endsection

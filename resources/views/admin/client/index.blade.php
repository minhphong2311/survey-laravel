@extends('admin.index')
@section('content')

    <!-- Content Header -->
    <section class="content-header">
        <h1 style="font-weight: 600;">Pre-Survey</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                        <div class="col-xs-5">
                            <form class="form-import" action="{{ route('import') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="input-group input-group-sm hidden-xs">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input CSV</label>
                                        <input type="file" name="file">
                                    </div>

                                    <div class="input-group-btn">
                                        <label></label>
                                        <button type="submit" class="btn btn-block btn-info"
                                            style="border-radius: 3px;">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div style="clear: both;width: 100%;height: 10px;"></div>
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (isset($errors) && $errors->any())
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        @if (session()->has('failures'))
                        <div class="table-responsive">
                            <table class="table bg-red color-palette">
                                <tr>
                                    <th>Row</th>
                                    <th>Attribute</th>
                                    <th>Errors</th>
                                    <th>Value</th>
                                </tr>
                                @foreach (session()->get('failures') as $validation)
                                    <tr>
                                        <td>{{ $validation->row() }}</td>
                                        <td>{{ $validation->attribute() }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($validation->errors() as $e )
                                                    <li>{{ $e }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            @if (isset($validation->values()[$validation->attribute()]))
                                                {{ $validation->values()[$validation->attribute()] }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        @endif

                        <div class="col-xs-6">
                            <div class="dataTables_wrapper">
                                <div class="dataTables_length">
                                    <label>Show
                                        <select id="showEntries" name="table_length" aria-controls="table"
                                            class="form-control input-sm">
                                            <option {{ request()->session()->get('client_show') == '10'? 'selected': '' }} value="10">10</option>
                                            <option {{ request()->session()->get('client_show') == '25'? 'selected': '' }} value="25">25</option>
                                            <option {{ request()->session()->get('client_show') == '50'? 'selected': '' }} value="50">50</option>
                                            <option {{ request()->session()->get('client_show') == '100'? 'selected': '' }} value="100">100</option>
                                        </select> Entries</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @if (session()->has('delete'))
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session()->get('delete') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <table id="table" class="table table-bordered table-hover" style="width:100% !important;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact Number</th>
                                    <th>IC number</th>
                                    <th>Address</th>
                                    <th>IC front</th>
                                    <th>IC back</th>
                                    <th style="width:80px;" class="action text-center"></th>
                                </tr>
                            </thead>
                            @if ($data)
                                <tbody>
                                    @foreach ($data as $index)
                                        <tr role="row">
                                            <td>{{ $index->id }}</td>
                                            <td>{{ $index->name }}</td>
                                            <td>{{ Str::formatPhone($index->phone) }}</td>
                                            <td>{{ Str::formatIC($index->ic_number) }}</td>
                                            <td>{{ $index->address }}</td>
                                            <td><img src="{{ $index->ic_front }}" style="height: 20px;" /></td>
                                            <td><img src="{{ $index->ic_back }}" style="height: 20px;" /></td>
                                            <td class="text-center">
                                                <a class="btn btn-default btn-block" href="{{ url('admincp/' . $type . '/delete/' . $index->id) }}"
                                                    title="Delete" style="color: red"
                                                    onclick="return confirm('Delete survey?')">
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
        jQuery('.form-import').validate({
            success: function(label) {},
            rules: {
                file: {
                    required: true,
                    accept: "csv"
                },
            }
        });
    </script>
@endsection
@endsection

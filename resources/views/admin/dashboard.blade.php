@extends('admin.index')
@section('content')

    <!-- Content Header -->
    <section class="content-header">
        <h1 style="font-weight: 600;">Hi {{ Auth::user()->name }}!</h1>
        <h4>{{ $totalSurvey ? $totalSurvey : '0' }} @if ($totalSurvey <= 1) survey @else surveys @endif completed</h4>
    </section>

    <!-- Content body -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="table" class="table table-bordered table-hover" style="width:100% !important;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Submitted by</th>
                                </tr>
                            </thead>
                            @if ($Survey)
                                <tbody>
                                    @foreach ($Survey as $key => $index)
                                        <tr role="row">
                                            <td><a href="{{ url('admincp/survey/edit/' . $index->id) }}">{{ $index->name }}</a></td>
                                            <td>Completed</td>
                                            <td>{{ $index->updated_at->format('d/m/Y') }}</td>
                                            <td>{{ $index->getUser?$index->getUser->name:'Not exist' }}</td>
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

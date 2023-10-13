@extends('admin.index')
@section('content')

    <!-- Content Header -->
    <section class="content-header">
        <h1 style="font-weight: 600;">Survey result</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-6">
                            <form class="form-horizontal " style="max-width: 500px;">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Start date</label>
                                        <div class="input-group survey-date" style="width: 95%">
                                            <input name="StartDate" class="form-control input-sm" id="inputStartDate"
                                                size="20" value="{{ request()->input('StartDate')?request()->input('StartDate'):'11 Aug 2021' }}"
                                                autocomplete="off">
                                            <i class="inputStartDate fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>End date</label>
                                        <div class="input-group survey-date" style="width: 95%">
                                            <input name="EndDate" class="form-control input-sm" id="inputEndDate"
                                                size="20" value="{{ request()->input('EndDate')?request()->input('EndDate'):date('d M Y') }}"
                                                autocomplete="off">
                                            <i class="inputEndDate fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button type="submit" class="btn btn-block btn-info btn-sm"
                                            style="border-radius: 3px;">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div style="clear: both;width: 100%;height: 10px;"></div>

                        <div class="col-xs-6">
                            <div class="dataTables_wrapper">
                                <div class="dataTables_length">
                                    <label>Show
                                        <select id="showEntries" name="table_length" aria-controls="table"
                                            class="form-control input-sm">
                                            <option
                                                {{ request()->session()->get('survey_show') == '10'
    ? 'selected'
    : '' }}
                                                value="10">10</option>
                                            <option
                                                {{ request()->session()->get('survey_show') == '25'
    ? 'selected'
    : '' }}
                                                value="25">25</option>
                                            <option
                                                {{ request()->session()->get('survey_show') == '50'
    ? 'selected'
    : '' }}
                                                value="50">50</option>
                                            <option
                                                {{ request()->session()->get('survey_show') == '100'
    ? 'selected'
    : '' }}
                                                value="100">100</option>
                                        </select> Entries</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="btn-group" style="float: right;">
                                <label type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Download
                                    CSV &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-file-o"></span></label>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a data-href="/admincp/survey/exportFile?type=ppr" href="javascript:;"
                                            onclick="exportTasks(event.target);">For PPR Head</a></li>
                                    <li><a data-href="/admincp/survey/exportFile?type=review" href="javascript:;"
                                            onclick="exportTasks(event.target);">For Review</a></li>
                                    <li><a data-href="/admincp/survey/exportFile?type=intern" href="javascript:;"
                                            onclick="exportTasks(event.target);">For Intern</a></li>
                                </ul>
                            </div>
                            <script type="text/javascript">
                                function exportTasks(_this) {
                                    let _url = $(_this).data('href');
                                    @if (request()->input('StartDate'))
                                        window.location.href =
                                        _url+'&StartDate={{ request()->input('StartDate') }}&EndDate={{ request()->input('EndDate') }}';
                                    @else
                                        window.location.href = _url;
                                    @endif
                                }
                            </script>
                        </div>
                    </div>
                    <div class="box-body">
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
                                    <th>Result</th>
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
                                            <td><a href="{{ url('admincp/' . $type . '/edit/' . $index->id) }}"
                                                    title="View">View</a></td>
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
    <link rel="stylesheet" href="{{ asset('/admin/plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
    <style>
        .survey-date {
            position: relative;
        }

        .survey-date .fa {
            position: absolute;
            right: 10px;
            z-index: 5;
            top: 7px;
        }

        .daterangepicker_input {
            display: none;
        }

        body .daterangepicker:nth-child(2){display: none !important;}
    </style>
@section('script')
    <script src="{{ asset('/admin/plugins/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript">
        $('#showEntries').on('change', function() {
            location.href = '/admincp/{{ $type }}/show/' + this.value;
        });
        $('.inputStartDate').on('click', function() {
            $('#inputStartDate').focus();
        });
        $('.inputEndDate, #inputEndDate').on('click', function() {
            $('#inputStartDate').focus();
        });
        if ($('#inputStartDate, #inputEndDate').length) {
            var currentDate = moment().format("D MMMM YYYY");

            $('#inputStartDate, #inputEndDate').daterangepicker({
                locale: {
                    format: 'D MMMM YYYY'
                },
                // alwaysShowCalendars: true,
                maxDate: currentDate,
                autoApply: true,
                autoUpdateInput: false
            }, function(start, end, label) {
                // console.log(start);
                // console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
                // Lets update the fields manually this event fires on selection of range
                var selectedStartDate = start.format('D MMMM YYYY'); // selected start
                var selectedEndDate = end.format('D MMMM YYYY'); // selected end

                $checkinInput = $('#inputStartDate');
                $checkoutInput = $('#inputEndDate');

                // Updating Fields with selected dates
                $checkinInput.val(selectedStartDate);
                $checkoutInput.val(selectedEndDate);

                // Setting the Selection of dates on calender on CHECKOUT FIELD (To get this it must be binded by Ids not Calss)
                var checkOutPicker = $checkoutInput.data('daterangepicker');
                checkOutPicker.setStartDate(selectedStartDate);
                checkOutPicker.setEndDate(selectedEndDate);

                // Setting the Selection of dates on calender on CHECKIN FIELD (To get this it must be binded by Ids not Calss)
                var checkInPicker = $checkinInput.data('daterangepicker');
                checkInPicker.setStartDate(selectedStartDate);
                checkInPicker.setEndDate(selectedEndDate);

            });
            $('#inputEndDate').on('click', function(ev, picker) {
                $('.daterangepicker').eq(1).css("display", "none");
            });
        }
    </script>
@endsection
@endsection

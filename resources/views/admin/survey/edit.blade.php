@extends('admin.index')
@section('content')

  <!-- Content Header -->
  <section class="content-header">
    <h1 style="font-weight: 600;">Survey result</h1>
    <h4>{{ $data->name }}</h4>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            @if ($data['getSurvey'])
              <ol>
                @foreach ($data['getSurvey'] as $index)
                  <li>
                    <strong>{{ $index['question'] }}</strong>
                    @if ($index['question_type'] == 'CHECKBOX')
                      <div class="form-group">
                        @foreach ($index->questiondetail as $row)
                          <div class="checkbox">
                            <label style="padding-left: 0;">
                              {{-- <input type="checkbox" value="{{ $row->id }}" name="question[{{ $index->id }}]" style="pointer-events:none"
                                {{ $row->checked ? $row->checked : 'disabled' }} /> --}}
                            {!! $row->checked ? '<i class="fa fa-check-square" style="color: #035DC8;"></i>' : '<i class="fa fa-square-o" style="color: #6D6D6D;"></i>' !!}
                              {{ $row->name }}
                            </label>
                            @if ($row->other != null && $index->answer_other)
                              : {!! nl2br($index->answer_other) !!}
                            @endif
                          </div>
                        @endforeach
                      </div>
                    @elseif ($index['question_type'] == 'RADIO_BUTTON')
                      <div class="form-group">
                        @foreach ($index->questiondetail as $row)
                          <div class="radio">
                            <label style="padding-left: 0;">
                              {{-- <input type="radio" name="question[{{ $index->id }}]" value="{{ $row->id }}"
                                {{ $row->checked ? $row->checked : 'disabled' }}> --}}
                                {!! $row->checked ? '<i class="fa fa-dot-circle-o" style="color: #035DC8;font-size: 16px;"></i>': '<i class="fa fa-circle-o" style="color: #6D6D6D;"></i>' !!}
                              {{ $row->name }}
                            </label>
                          </div>
                        @endforeach
                      </div>
                    @elseif ($index['question_type'] == 'RADIO_BUTTON_RANGE')
                      <div class="form-group radio-button-range">
                        @foreach ($index->questiondetail as $row)
                          <div class="radio">
                            <b>{{ $row->description }}</b>
                            <label style="padding-left: 0;">
                              {{-- <input type="radio" name="question[{{ $index->id }}]" value="{{ $row->id }}"
                                {{ $row->checked ? $row->checked : 'disabled' }}> --}}
                                {!! $row->checked ? '<i class="fa fa-dot-circle-o" style="color: #035DC8;font-size: 16px;"></i>': '<i class="fa fa-circle-o" style="color: #6D6D6D;"></i>' !!}
                              <span>{{ $row->name }}</span>
                            </label>
                          </div>
                        @endforeach
                      </div>
                    @elseif ($index['question_type'] == 'SORT')
                      <ul style="margin: 0;padding-left: 20px;">
                        @foreach ($index['questiondetail'] as $row)
                          <li style="margin: 5px 0;">{{ $row['name'] }}</li>
                        @endforeach
                      </ul>
                    @elseif ($index['question_type'] == 'SHOW_IC')
                      <div class="row" style="max-width: 300px;margin-top: 10px;">
                        <div class="col-sm-6">
                          <a href="#ic_front" data-toggle="modal" data-target="#modal-ic_front">
                            <img class="img-responsive" src="{{ $data->ic_front }}" alt="Photo">
                          </a>
                          <div class="modal fade" id="modal-ic_front">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="box-body box-profile">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">IC front</h4>
                                  </div>
                                  <div class="box-body text-center">
                                    <img style="max-width: 100%;" src="{{ $data->ic_front }}" alt="Photo">
                                  </div>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <a href="#ic_back" data-toggle="modal" data-target="#modal-ic_back">
                            <img class="img-responsive" src="{{ $data->ic_back }}" alt="Photo">
                          </a>
                          <div class="modal fade" id="modal-ic_back">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="box-body box-profile">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">IC back</h4>
                                  </div>
                                  <div class="box-body text-center">
                                    <img style="max-width: 100%;" src="{{ $data->ic_back }}" alt="Photo">
                                  </div>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                        </div>
                      </div>
                    @else
                      <dd>{!! $index['answer'] ? nl2br($index['answer']) : '<none>' !!}</dd>
                    @endif
                  </li>
                @endforeach
              </ol>
            @endif
          </div>
        </div>

      </div>
    </div>
  </section>
  <style>
    .content ol li {
      list-style-type: decimal-leading-zero;
      margin: 25px 0;
      font-size: 15px;
    }

    .radio-button-range {
      padding-top: 30px;
    }

    .radio-button-range .radio {
      display: inline-block;
      text-align: center;
      margin: 0 30px;
      position: relative;
    }

    .radio-button-range .radio b {
      position: absolute;
      bottom: 100%;
      left: -50px;
      right: 0;
      width: 100px;
      font-weight: normal;
      font-size: 13px;
    }

    .radio-button-range .radio label {
      display: inline;
    }

    .radio-button-range .radio span {
      display: block;
      text-align: left;
      text-indent: 2px;
    }
  </style>
@endsection

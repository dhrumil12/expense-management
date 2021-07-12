@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="card col-12" style="padding:0px;">
          <div class="card-header">
            <h3 class="card-title">Add Expense/Income</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body col-12">
                {!! Form::open(array('method' => 'post', 'route' => 'expense.store', 'class' => 'form')) !!}
                    @csrf
                        <div class="form-body">
                            <div class="form-group">
                                {!! Form::label('type', 'Type', ['class' => 'bold']) !!}
                                {!! Form::select('type', $type, 'Expense', ['class'=>'form-control', 'id'=>'type', 'placeholder'=>'Type', 'required'=>"required"]) !!}
                                @if ($errors->has('type'))
                                    <span class="required" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('amount', 'Amount', ['class' => 'bold']) !!}
                                {!! Form::number('amount', null, ['class'=>'form-control', 'id'=>'amount', 'placeholder'=>'Amount', 'required'=>"required", 'step'=>"any"]) !!}
                                @if ($errors->has('amount'))
                                    <span class="required" role="alert">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('date', 'date', ['class' => 'bold']) !!}
                                {!! Form::date('date', null, ['class'=>'form-control datepicker', 'id'=>'date', 'placeholder'=>'Date', 'required'=>"required"]) !!}
                                @if ($errors->has('date'))
                                    <span class="required" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-actions">
                                {!! Form::button('Save <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!}
                            </div>
                        </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

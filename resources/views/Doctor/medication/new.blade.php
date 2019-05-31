
@extends('layouts.dashboard')

@section('title')
    Medication
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('/') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">New Medication </a>
            </li>
            
          </ol>
          <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-user"></i>Add Medication</h2>
                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            <form action="{{ url('/medications/new') }}" method="post">
                    {{ csrf_field() }}
                <div class="row center-block">
                    <div class="col-md-12">
                        <div class="form-group ui-widget">
                            <label>Name</label>
                            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name')}}" name="name" type="text" id="drug_name" placeholder="Adenoscan, Ernthyomacin">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Dosage</label>
                        <input type="text" name="dosage" class="form-control" value="{{old('dosage')}}" placeholder="5 mg, 200IU">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Frequency(per day)</label>
                        <input type="text" name="frequency" class="form-control" value="{{old('frequency')}}" placeholder="2 times a day...">                  
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Who prescribed it</label>
                        <input type="text" name="medical_personal"  class="form-control" value="{{old('medical_personal')}}" placeholder="Dr. Victor ...">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Phone Number of Personal that prescribed the Medication</label>
                        <input type="number" name="medical_personal_phone"  class="form-control" value="{{old('medical_personal_phone')}}" placeholder="+234812345678 ...">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="start_date">Start Date</label>
                        <input name="start_date" type="date" class="form-control" value="{{ old('start_date') }}">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="start_date">End Date</label>
                        <input name="end_date" type="date" class="form-control" value="{{ old('end_date') }}">
                    </div>
                    <br>
                    <button type="submit" class="btn_1 approve">Add New Medication</button>
                </div>
            </form> 
          </div>
          <!-- /row-->
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection

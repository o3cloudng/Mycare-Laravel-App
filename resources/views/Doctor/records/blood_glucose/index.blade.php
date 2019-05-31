
@extends('layouts.dashboard')

@section('title')
  Blood Glucose
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Blood Glucose 
            </li>
          </ol>
         
          <!-- /Blood Pressure -->
          <div class="box_general padding_bottom">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="text-center">Blood Glucose Records</h5>
                    <table class="table table-striped" id="bloodGlucoseTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Blood Glucose</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Blood Glucose</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($bgs as $bg)
                            <tr>
                                <td>{{$bg->bg}}</td>
                                <td>{{\App\Http\Utility::dateToWords($bg->created_at)}}</td>
                                <td><button data-id="{{$bg->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-bg"></button>
                                    <button data-id="{{$bg->id}}" class="btn btn-sm btn-danger fa fa-trash del-bg"></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                <div class="col-md-4">
                    <h5 class="text-center">Add Blood Glucose</h5>
                    @if($errors->add_bg->all())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->add_bg->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('addBG') }}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Blood Glucose</label>
                            <input class="form-control" value="{{ old('bp') }}" name="bp" type="number" placeholder="Blood Glucose">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn_1 gray approve">Submit</button>
                        </div>
                    </form>
                    <!-- /row-->
                </div>
            </div>
          </div> 
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection
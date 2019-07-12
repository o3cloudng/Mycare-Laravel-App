@extends('layouts.dashboard')

@section('title')
    Blood Glucose
@endsection
@section('header')
    <i class="fa fa-user"></i> Medical Record 
@endsection
@section('content')
    <div class="container">         
          <!-- /Blood Pressure -->
          <div class="box_general padding_bottom">
            <div class="row">
                <h4 class="heading">Blood Glucose</h4>
            </div>
            <div class="card">
                <div class="card-header"><i class="fa fa-table"></i> Blood Glucose</div>
                <div class="card-body">
                    <div class="row">
                <div class="col-md-8">
                    <table class="table table-condensed table-bordered" id="bloodGlucoseTable" width="100%" cellspacing="0">
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
                                <!-- <td><button data-id="{{$bg->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-bg"></button> -->
                                   <td> <a href="editBG/{{$bg->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-bg"></a>
                                    <a href="deleteBG/{{$bg->id}}" class="btn btn-sm btn-danger fa fa-trash del-bg"></a>
                                    <!-- <button data-id="{{$bg->id}}" class="btn btn-sm btn-danger fa fa-trash del-bg"></button></td> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                <div class="col-md-4">
                    <h5 class="">Add Blood Glucose</h5>
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
                            <input class="form-control shadow" value="{{ old('bp') }}" name="bp" type="number" placeholder="Blood Glucose">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn_1 gray approve btn btn2 button shadow activeBPLink">Submit</button>
                        </div>
                    </form>
                    <!-- /row-->
                </div>
            </div>
                </div>
                <!-- <div class="card-footer"></div> -->
            </div>
          </div> 
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection
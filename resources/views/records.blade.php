
@extends('layouts.dashboard')

@section('title')
    Records
@endsection

@section('record-active')
black
@endsection

@section('content')
        <div class="container-fluid">
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2><i class="fa fa-user"></i> Medical Data</h2>
                <div class="text-right">
                    <button type="button" class="btn btn2 button shadow mx-auto activeBPLink" data-toggle="modal" data-target="#addBloodPressure">
                        Add New Blood Pressure
                    </button>
                </div>
                @if(session('success'))
                    <script type="text/javascript">
                        toastr.success("{{ session('success') }}");
                    </script>
                @endif
                @if(session('error'))
                    <script type="text/javascript">
                        toastr.error("{{ session('error') }}");
                    </script>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center">Blood Pressure Records</h5>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>Systolic</th>
                                <th>Diastolic</th>
                                <th>Pulse</th>
                                <th>IMEI</th>
                                <th>IMSI</th>
                                <th>Tel</th>
                                <th>ICCID</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if($bps->count()>0)
                            @foreach($bps as $bp)
                            <tbody>
                                <tr>
                                    <td>{{ $bp->systolic }}</td>
                                    <td>{{ $bp->diastolic }}</td>
                                    <td>{{ $bp->pulse }}</td>
                                    <td>{{ $bp->imei }}</td>
                                    <td>{{ $bp->imsi }}</td>
                                    <td>{{ $bp->tel }}</td>
                                    <td>{{ $bp->iccid }}</td>
                                    <td>{{\App\Http\Utility::dateToWords($bp->created_at)}}</td>
                                    <td><button data-id="{{$bp->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-bp" onclick=""></button>
                                        <button data-id="{{$bp->id}}" class="btn btn-sm btn-danger fa fa-trash del-bp"></button></td>
                                </tr>
                            </tbody>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-warning">There are no Blood Pressure readings</div>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
               
            </div>
          </div>
          <!-- /box_general-->
          <!-- Blood Pressure -->
          <div class="modal fade" id="addBloodPressure" tabindex="-1" role="dialog" aria-labelledby="addBloodPressureLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="addMedicationLabel">Add New Blood Pressure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                   
                    <form action="{{ url('/addBP') }}" method="POST">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Systolic</label>
                                    <input class="form-control shadow" value="{{old('systolic')}}" name="systolic" type="text">
                                </div>
                                <div class="col-md-6 form-group ">
                                    <label>Diastolic</label>
                                    <input class="form-control shadow"  value="{{old('diastolic')}}" name="diastolic" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Pulse</label>
                                    <input class="form-control shadow"  value="{{old('pulse')}}" name="pulse" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tel</label>
                                    <input class="form-control shadow"  value="{{old('tel')}}" name="tel" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>IMEI</label>
                                    <input class="form-control shadow" value="{{old('imei')}}"  name="imei" type="text">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>IMSI</label>
                                    <input class="form-control shadow"  value="{{old('imsi')}}" name="imsi" type="text">
                                </div>
                            
                                <div class="form-group col-md-4">
                                    <label>ICCID</label>
                                    <input class="form-control shadow" value="{{old('iccd')}}" name="iccid" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn btn2 button shadow mx-auto default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn2 button shadow mx-auto activeBPLink">Add New Blood Pressure</button>
                            </div>
                        </div>
                        
                    </form>
                    
                    
                <!-- /row-->
                </div>
            </div>
          </div>
          <!-- /Blood Pressure -->
          <div class="box_general padding_bottom">
                
            <div class="row">
                <div class="col-md-8">
                    <h5 class="text-center">Blood Glucose Records</h5>
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Blood Glucose</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @if($bgs->count()>0)
                        @foreach($bgs as $bg)
                        <tbody>
                            <tr>
                            <td>{{$bg->bg}}</td>
                            <td>{{\App\Http\Utility::dateToWords($bg->created_at)}}</td>
                            <td><button data-id="{{$bg->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-bg" onclick=""></button>
                                <button data-id="{{$bg->id}}" class="btn btn-sm btn-danger fa fa-trash del-bg"></button></td>
                        </tr>
                        </tbody>
                        @endforeach
                    @else
                        <thead>
                            <tr>
                            <td colspan="8">
                                <div class="alert alert-warning">There are no BG readings</div>
                            </td>
                        </tr>
                        </thead>
                    @endif
                    </table>
                    
                </div>
                <div class="col-md-4">
                    <h5 class="text-center">Add BG</h5>
                    @if($errors->add_bg->all())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->add_bg->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('add-bg'))
                        <div class="alert alert-success">{{session('add-bg')}}</div>
                    @endif
                    <form action="addBG" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Blood Glucose</label>
                            <input class="form-control shadow" value="{{old('BP')}}" name="bp" type="text">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn2 button shadow mx-auto activeBPLink">Submit</button>
                        </div>
                    </form>
                    <!-- /row-->
                </div>
            </div>
          </div> 
          <!-- /row-->
         
        </div>
@endsection

@section('scripts')
<script>
$(function(){
    $('.del-bp').click(function(){
        if(confirm("Do you want to delete this Blood Pressure reading ?")){
            location = 'deleteBP/'+$(this).data('id');
        }
    })
    $('.edit-bp').click(function(){
        location = 'editBP/'+$(this).data('id');
    })

    $('.del-bg').click(function(){
        if(confirm("Do you want to delete this Blood Glucose reading ?")){
            location = 'deleteBG/'+$(this).data('id');
        }
    })
    $('.edit-bg').click(function(){
        location = 'editBG/'+$(this).data('id');
    })
})
</script>
@endsection
@extends('layouts.dashboard')

@section('title')
    Blood Pressure
@endsection
@section('header')
    <!-- <i class="fa fa-user"></i> --> Medical Record
@endsection
@section('content')
    <div class="container">
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <div class="row heading shadow-sm">
                <div class="col-sm-12 col-md-9 text-sm-center text-md-left">
                  <h4 class="">Blood Pressure</h4>
                </div>
                <div class="col-sm-12 col-md-3">
                  <a href="#" data-phone="{{ $subscriber->phone }}" class="btn_1 btn float-right text-sm-center" data-toggle="modal" data-target="#addBloodPressure">
                        Add New Blood Pressure <i class="fa fa-plus"></i>
                    </a>
                </div>    
            </div>
            </div>
          </div>
          <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <!-- Blood Pressure DataTables Card-->
                <div class="card mb-3">
                 <!--  <div class="card-header">
                    <i class="fa fa-table"></i> Blood Pressure Records</div> -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table" id="bloodPressureTable" width="100%" cellspacing="0">
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
                        <!-- <tfoot>
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
                        </tfoot> -->
                        <tbody>
                            @foreach($bps as $bp)
                            <tr class="bp{{$bp->id}}">
                                <td>{{ $bp->systolic }}</td>
                                <td>{{ $bp->diastolic }}</td>
                                <td>{{ $bp->pulse }}</td>
                                <td>{{ $bp->imei }}</td>
                                <td>{{ $bp->imsi }}</td>
                                <td>{{ $bp->tel }}</td>
                                <td>{{ $bp->iccid }}</td>
                                <td>{{\App\Http\Utility::dateToWords($bp->created_at)}}</td>
                                <td><!-- <button data-id="{{$bp->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-bp"></button>
                                    <button data-id="{{$bp->id}}" class="btn btn-sm btn-danger fa fa-trash del-bp"></button> -->
                                    <a href="editBP/{{$bp->id}}" class="btn bg-white btn-sm edit-bp"><i class="fa fa-pencil"></i></a>
                                    <a href="deleteBP/{{$bp->id}}" class="btn bg-white btn-sm del-bp delete"><i class="fa fa-trash"></i></a>
                                  </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- <div class="card-footer small text-muted">Blood Pressure</div> -->
                </div>
                 <!-- /tables-->
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
                        <i class="fa fa-2x fa-times" aria-hidden="true"></i>
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
                                    <input class="form-control shadow"  value="@isset($subscriber){{ $subscriber->phone }}@endisset" name="tel" type="text">
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
                                <button type="button" class="btn_1 btn btn2 button shadow default gray delete" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1 btn btn2 button shadow activeBPLink gray approve">Add New Blood Pressure</button>
                            </div>
                        </div>
                        
                    </form>
                    
                    
                <!-- /row-->
                </div>
            </div>
          </div>
          <!-- /Blood Pressure -->
       
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {

        // Edit within modal
        $('#addBloodPressure').on('show.bs.modal', function(event) {
            // console.log('Reading modal data'); 
            var button = $(event.relatedTarget)
            var phone = button.data('phone')

            var modal = $(this)


            modal.find('.modal-body #phone').val(phone)

        });

    });
</script>
@endsection

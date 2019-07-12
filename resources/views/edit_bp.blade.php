@extends('layouts.dashboard')

@section('title')
    Edit Blood Pressure - Personal Profile
@endsection
@section('header')
    <i class="fa fa-user"></i> Edit Blood Pressure 
@endsection
@section('content')


    <div class="container">
          <div class="box_general padding_bottom">
            <div class="row heading">
                <h5 class="text-center">Update Blood Pressure</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
            
                <div class="col-md-6">
                    @if($errors->update_bp->all())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->update_bp->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('update-bp'))
                        <div class="alert alert-success">{{session('update-bp')}}</div>
                    @endif
                    <form action="/updateBP" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Systolic</label>
                            <input class="form-control shadow" value="{{$bp->systolic}}" name="systolic" type="text">
                        </div>
                        <div class="form-group">
                            <label>Diastolic</label>
                            <input class="form-control shadow"  value="{{$bp->diastolic}}" name="diastolic" type="text">
                        </div>
                        <div class="form-group">
                            <label>Pulse</label>
                            <input class="form-control shadow"  value="{{$bp->pulse}}" name="pulse" type="text">
                        </div>
                        <div class="form-group">
                            <label>Tel</label>
                            <input class="form-control shadow"  value="{{$bp->tel}}" name="tel" type="text">
                        </div>
                        <div class="form-group">
                            <label>IMESI</label>
                            <input class="form-control shadow" value="{{$bp->imei}}"  name="imei" type="text">
                        </div>
                        <div class="form-group">
                            <label>IMSI</label>
                            <input class="form-control shadow"  value="{{$bp->imsi}}" name="imsi" type="text">
                        </div>
                        <div class="form-group">
                            <label>ICCID</label>
                            <input class="form-control shadow" value="{{$bp->iccid}}" name="iccid" type="text">
                        </div>
                        <input class="form-control" value="{{$bp->id}}" name="id" type="hidden">
                        <div class="form-group">
                            <button type="submit" class="btn btn2 shadow activeBPLink">Update</button>
                        </div>
                    </form>
                </div>
                
            </div>
                </div>
            </div>
           
            
            <hr>
            
          </div>
          <!-- /box_general-->
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
@endsection

@section('scripts')
<script>
$(function(){
    $('.del-diagnosis').click(function(){
        if(confirm("Do you want to delete this diagnosis ?")){
            location = 'deleteDiagnosis/'+$(this).data('id');
        }
    });

    $('.edit-diagnosis').click(function(){
        location = 'editDiagnosis/'+$(this).data('id');
    })
})
</script>
@endsection
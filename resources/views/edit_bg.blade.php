@extends('layouts.dashboard')

@section('title')
    Edit Blood Glucose - Personal Profile
@endsection
@section('header')
    <i class="fa fa-user"></i> Edit Blood Glucose 
@endsection
@section('content')
    <div class="container">  
    <div class="row heading">
        <h5 class="">Update Blood Glucose</h5>
    </div>         
            <div class="card">
                <div class="card-header">
                    Glucose
                </div>
                <div class="car-body">
                    <div class="row">
            
                <div class="col-md-6">
                        
                    
                    @if($errors->update_bg->all())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->update_bg->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('update-bg'))
                        <div class="alert alert-success">{{session('update-bg')}}</div>
                    @endif
                    <form action="{{ url('updateBG') }}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label></label>
                                <input class="form-control shadow" value="{{$bg->bg}}" name="blood_glucose" type="text">
                            </div>
                            <input type="hidden" name="id" value="{{ $bg->id }}">
                            
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
    </div>
@endsection

@section('scripts')
<script>
$(function(){
    $('.del-diagnosis').click(function(){
        if(confirm("Do you want to delete this diagnosis ?")){
            location = 'deleteDiagnosis/'+$(this).data('id');
        }
    })
    $('.edit-diagnosis').click(function(){
        location = 'editDiagnosis/'+$(this).data('id');
    })
})
</script>
@endsection
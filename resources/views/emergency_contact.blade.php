
@extends('layouts.dashboard')

@section('title')
    Personal Profile
@endsection

@section('emergency-active')
black
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Care Team</li>
          </ol>
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i>Emergency Contact</h2>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('status'))
                        <div class="alert alert-success">{{session('status')}}</div>
                    @endif
                    <form action="updateEmergencyContact" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" value="@if(is_null($contact)) {{old('name')}} @else {{$contact->name}} @endif" name="name" type="text">
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input class="form-control" value="@if(is_null($contact)) {{old('phone')}} @else {{$contact->phone}} @endif" name="phone" type="text">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" value="@if(is_null($contact)) {{old('email')}} @else {{$contact->email}} @endif" name="email"  type="email">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input class="form-control" value="@if(is_null($contact)) {{old('city')}} @else {{$contact->city}} @endif" name="city"  type="text">
                            </div>
                            <div class="form-group">
                                <label>Street Address</label>
                                <textarea class="form-control" value="" name="street" >@if(is_null($contact)) {{old('street')}} @else {{$contact->street}} @endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <input class="form-control" value="@if(is_null($contact)) {{old('state')}} @else {{$contact->state}} @endif" name="state"  type="text">
                            </div>
                            <div class="form-group">
                                <label>Zip/Postal code</label>
                                <input class="form-control" value="@if(is_null($contact)) {{old('zip_code')}} @else {{$contact->zip_code}} @endif" name="zip_code"  type="text">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>  
                </div>
            </div>
          </div>
          <!-- /box_general-->
         
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection

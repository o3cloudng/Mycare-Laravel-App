
@extends('layouts.dashboard')

@section('title')
    Contact Team
@endsection
@section('content')
        <div class="container">
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              <h2>
                <i class="fa fa-user"></i> Contact Team</h2>
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
            <!-- Doctor -->
            <div class="row mt-3">
                <div class="col-2">
                    <div class="input-group">
                        <input type="search" class="form-control" name="search" placeholder="Search" />
                        <div class="input-group-append btn-warning"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Entries">
                        <!-- <select class="form-control dropdown" name="entries">
                            <option value="">10</option>
                            <option value="">25</option>
                            <option value="">50</option>
                            <option value="">100</option>
                        </select> -->
                    </div>
                </div>
                <div class="col-2">
                    <a href="#" class="btn"><img style="width: 35px;" src="{{ asset('img/pencil.png') }}"></a>
                    <a href="#" class="btn"><img style="width: 35px;" src="{{ asset('img/delete.png') }}"></a>
                </div>
                <div class="col-3">
                    <div class="text-right"> <button type="button" class="btn_1 btn btn2 button shadow mx-auto blue" data-toggle="modal" data-target="#addContact">Add New Contact Member  &nbsp; &#43;</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                            </ul>
                        </div>
                    @endif
                    <table class="table table-condensed" id="contactTeamTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($contactTeams as $contactTeam)
                                <tr>
                                    <td><a href=""> {{ $contactTeam->name }} </a></td>
                                    <td>{{ ucfirst($contactTeam->description) }}</td>
                                    <td>{{ $contactTeam->email }}</td>
                                    <td>{{ $contactTeam->phone }}</td>
                                    <!-- <td>
                                        <button class="btn_1 gray delete del-contactTeam btn btn2 button shadow mx-auto blue" data-id="{{ $contactTeam->id }}" ><i class="fa fa-fw fa-times-circle-o"></i> Remove as Contact Team Member</button>
                                    </td> -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

          </div>
          <!-- /box_general-->
             <!-- User Modal -->
            <div class="modal fade" id="addContact" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="addEmergencyLabel">Add Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="{{ url('/contact-team/new') }}" method="POST">  
                                {{ csrf_field() }}
                            <div class="modal-body">
                                 
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control shadow {{ $errors->has('name') ? ' is-invalid' : '' }}" value="" name="name">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control shadow {{ $errors->has('email') ? ' is-invalid' : '' }}" value="" name="email">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="number" class="form-control shadow {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="" name="phone">
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <select class="form-control shadow" name="description">
                                                <option value="physician">Physician</option>
                                                <option value="emergency-contact">Emergency Contact</option>
                                                <option value="doctor">Doctor</option>
                                                <option value="father">Father</option>
                                                <option value="mother">Mother</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn_1  btn btn2 button shadow red gray delete" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn_1  btn btn2 button shadow blue gray approve">Add Contact</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>

          <!-- /row-->
         
        </div>
@endsection


@extends('layouts.dashboard')

@section('title')
    Care Team
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
                <i class="fa fa-user"></i>Care Team</h2>
            </div>
            <!-- Doctor -->
            <div class="row">
                <div class="col-md-12">
                    @if(session('error'))
                        <script type="text/javascript">
                            toastr.error("{{ session('error') }}");
                        </script>
                    @elseif(Session::has('success'))
                        <script type="text/javascript">
                            toastr.success("{{ session('success') }}");
                        </script>
                    @endif
                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="text-right"> <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addUser">Add New Care Team Member</button></div>
                    <hr>
                    <table class="table table-striped" id="careTeamTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($careTeams as $careTeam)
                                <tr>
                                    <td><a href=""> {{ $careTeam->user->name }} </a></td>
                                    <td>{{ ucfirst($careTeam->user->roles()->first()->name) }}</td>
                                    <td>{{ $careTeam->user->email }}</td>
                                    <td>{{ $careTeam->user->phone }}</td>
                                    <td>
                                        <a href="#0" class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Remove as CareTeam Member</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <hr />

           
            <hr />

          </div>
          <!-- /box_general-->
             <!-- User Modal -->
            <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="addEmergencyLabel">Add User Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-2x fa-times" aria-hidden="true"></i>
                        </button>
                        </div>
                        <form action="{{ url('/care-team') }}" method="POST">  
                                {{csrf_field()}}
                            <div class="modal-body">
                                 
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="" name="name" type="text">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="" name="email"  type="email">
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
                                            <input class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="" name="phone"  type="number">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" name="role">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add User Contact</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>

          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection

@section('scripts')
<script>
$(function(){
    $('.del-user').click(function(){
        if(confirm("Do you want to delete this Medical Personal, and all his/her diagnosis and medications ?")){
            location = 'user/' + $(this).data('id') + '/delete';
        }
    })
})
</script>
@endsection
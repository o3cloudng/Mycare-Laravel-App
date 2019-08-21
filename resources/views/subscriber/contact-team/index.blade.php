
@extends('layouts.dashboard')

@section('header')
    <h2><!-- <i class="fa fa-user"></i> --> Contact Team</h2>
@endsection

@section('title')
    Contact Team
@endsection
@section('content')
        <div class="container">
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
              
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
            <div class="row mt-3 heading shadow-sm">
                <!-- <div class="col-2">
                    <div class="input-group">
                        <input type="search" class="form-control" phone="search" placeholder="Search" />
                        <div class="input-group-append btn-warning"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Entries">
                        <select class="form-control dropdown" name="entries">
                            <option value="">10</option>
                            <option value="">25</option>
                            <option value="">50</option>
                            <option value="">100</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <a href="#" class="btn"><img style="width: 35px;" src="{{ asset('img/pencil.png') }}"></a>
                    <a href="#" class="btn"><img style="width: 35px;" src="{{ asset('img/delete.png') }}"></a>
                </div> -->
                <div class="col-md-12">
                    <div class="text-right"> 
                        <a href="#" class="btn_1 btn mx-auto" data-toggle="modal" data-target="#addContact">Add New Contact Member  &nbsp;<i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
           <div class="card">
               <!-- <div class="card-header">
                   Contact Team
               </div> -->
               <div class="card-body">
                    <div class="row">
                <div class="col-md-12">
                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered" id="contactTeamTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </tfoot> -->
                        <tbody>
                            @foreach($contactTeams as $contactTeam)
                                <tr>
                                    <td>{{ $contactTeam->name }}</td>
                                    <td>{{ ucfirst($contactTeam->description) }}</td>
                                    <td>{{ $contactTeam->email }}</td>
                                    <td>{{ $contactTeam->phone }}</td>
                                    <td class="d-flex">
                                        <button class="btn btn-sm" data-id="{{ $contactTeam->id }}"
                                         data-name="{{ $contactTeam->name }}" 
                                         data-email="{{ $contactTeam->email }}" 
                                         data-phone="{{ $contactTeam->phone }}" 
                                         data-description="{{ $contactTeam->description }}" 
                                         data-toggle="modal" 
                                         data-target="#editContact"><i class="fa fa-pencil"></i></button>

                                         <!-- <form class="delete" action="{{ url('/deleteContact') }}" method="POST">
                                            <input type="hidden" name="_method" value="{{ $contactTeam->id }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <button type="submit" class="btn btn-sm"><i class='fa fa-trash'></i></button>
                                        </form> -->

                                        <a href="/deleteContact/{{ $contactTeam->id }}" class="btn btn-sm delete"><i class="fa fa-trash"></i></a> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
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
                            <i class="fa fa-2x fa-times" aria-hidden="true"></i>
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
                                <div class="form-group">
                                    <button type="button" class="btn_1 btn btn2 button shadow default gray" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn_1 btn btn2 button shadow activeBPLink gray approve">Add Contact</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>




            <div class="modal fade" id="editContact" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="editEmergencyLabel">Edit Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-2x fa-times" aria-hidden="true"></i>
                        </button>
                        </div>
                        <form action="{{ url('/contact-team/edit') }}" method="POST">  
                                {{ csrf_field() }}
                            <div class="modal-body">
                                 
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control shadow {{ $errors->has('name') ? ' is-invalid' : '' }}" value="" name="name" id="name">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control shadow {{ $errors->has('email') ? ' is-invalid' : '' }}" value="" name="email" id="email">
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
                                            <input type="number" class="form-control shadow {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="" name="phone" id="phone">
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
                                            <select class="form-control shadow" name="description" id="description">
                                                <option value="physician">Physician</option>
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
                                <div class="form-group">
                                    <button type="button" class="btn_1 btn btn2 button shadow default gray" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn_1 btn btn2 button shadow activeBPLink gray approve">Add Contact</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>

          <!-- /row-->
         
        </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Edit within modal
        $('#editContact').on('show.bs.modal', function(event) {
            // console.log('Reading modal data'); 
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var email = button.data('email')
            var phone = button.data('phone')
            var description = button.data('description')

            var modal = $(this)


            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #name').val(name)
            modal.find('.modal-body #email').val(email)
            modal.find('.modal-body #phone').val(phone)
            modal.find('.modal-body #description').val(description)

        });

        // $(".delete").on("click", function(){
        //     return confirm("Do you want to delete this item?");
        // });

    });
</script>
@endsection
@extends('layouts.dashboard')

@section('title')
    Profile
@endsection
@section('header')
    My Profile
@endsection
@section('content')
<section>
    <div class="container">
        @if($errors->all())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-around">
            <div class="col-sm-12 col-xs-12 col-md-5">
                <div class="row">
                  <div class="col-sm-10 col-xs-10 mx-auto col-md-10 mybox shadow py-4">
                      <div class="row">
                            <div class="col-4">
                            <form method="POST" action="{{ url('/profile/avatar') }}" enctype="multipart/form-data">
                                @csrf
                                @isset($subscriber->avatar)

                                <img src="img/avatar.png" class="m-1 w-100 h-100 mt-4 mx-auto profile1" />
                                <!-- <img class="img-thumbnail" src="{{ asset('/storage/'.$subscriber->avatar) }}" /> -->
                                @else
                                <img class="m-1 w-100 h-100 profile1" src="{{ asset('img/avatar.png') }}" />
                                @endisset
                                <!-- <label>Upload Profile Picture</label> -->
                                    <input type="file" class="form-control {{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">
                                    @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                    <!-- <button type="submit" class="btn_1 small">Upload</button> -->
                                </form>
                            </div>
                            <div class="col-8 p-4">
                                <h5>Personal Information</h5>
                                <br/>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" value="{{ $subscriber->name }}" type="text" class="form-control shadow" placeholder="Your name">
                                </div>
                            </div>
                      </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" value="{{ $subscriber->email }}" type="email" class="form-control shadow" placeholder="Email" readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input name="phone" value="{{ $subscriber->phone }}" type="text" class="form-control shadow" placeholder="Your telephone number" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-3">
                        <button type="submit" class="btn btn2 button shadow mx-auto activeBPLink">Upload</button>
                    </div>
                  </div>

              <div class="col-sm-12 col-xs-12 col-md-12 mybox shadow py-4 my-4">
                  <div class="row">
                    <div class="col-12 px-4">
                        <div class="header_box version_2">
                            <h5> <span><img style="width: 50px; height: 50px;" src="{{ asset('img/password.png') }}"></span> Change password</h5>
                                </div>
                                @if($errors->change_password->all())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->change_password->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if(session('change-password'))
                                <script type="text/javascript">
                                toastr.success("{{ session('change-password') }}");
                                </script>
                                @endif
                                <form action="changePassword" method="post">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input class="form-control shadow" name="password" type="password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input class="form-control shadow" name="new_password" type="password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Confirm New Password</label>
                                                <input class="form-control shadow" name="confirm_password" type="password">
                                            </div>
                                        </div>
                                        <div class="form-group justify-content-center ml-3">
                                            <button type="submit" class="btn btn2 button shadow mx-auto activeBPLink">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                    </div>
                      
                  </div>
              </div>
              <div class="col-sm-12 col-xs-12 col-md-12 mybox shadow py-4 mb-5 mx-auto">
                  <div class="box_general padding_bottom" id="checkDiagnosis">
                    <div class="header_box version_2">
                        <h5><span><img style="width: 50px; height: 50px;" src="{{ asset('img/diagnosis.png') }}"></span> Diagnosis</h5>
                    </div>
                    <table class="table table-striped" id="diagnosisTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Medication(s)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Medication(s)</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($diagnosis as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->name }}</td>
                                <td>None</td>
                                <td><button data-id="{{$d->id}}" class="btn btn-sm btn-primary fa fa-pencil" id="edit-diagnosis"></button>
                                    <button data-id="{{$d->id}}" class="btn btn-sm btn-danger fa fa-trash del-diagnosis"></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>






                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-7">
                <div class="col-md-12 py-4 mybox shadow">
                        <h5> <i class="fa fa-user"></i>Update Profile</h5>
                        <form action="{{ url('updateProfile') }}" method="post">
                            {{csrf_field()}}
                            <!-- /row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date Of Birth </label>
                                        <input value="{{ $subscriber->date_of_birth }}" name="date_of_birth" type="date" class="form-control shadow" placeholder="Date of Birth">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control dropdown shadow" name="gender">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="male" {{ $subscriber->gender == "male" ?  "selected='selected'" : '' }}>Male</option>
                                            <option value="female" {{ $subscriber->gender == "female" ?  "selected='selected'" : '' }}>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Occupation</label>
                                        <input name="occupation" value="{{ $subscriber->occupation }}" type="text" class="form-control shadow" placeholder="Occupation">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Place of work</label>
                                        <input name="place_of_work" value="{{ $subscriber->place_of_work }}" type="text" class="form-control shadow" placeholder="Place of work">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" type="text" class="form-control shadow" placeholder="Address">{{ $subscriber->address }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Religion </label>
                                        <select class="form-control dropdown shadow" id="religion" name="religion">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="African Traditional &amp; Diasporic">African Traditional &amp; Diasporic</option>
                                            <option value="Atheist" {{ $subscriber->religion == "Atheist" ?  "selected='selected'" : '' }}>Atheist</option>
                                            <option value="Baha'i" {{ $subscriber->religion == "Baha'i" ?  "selected='selected'" : '' }}>Baha'i</option>
                                            <option value="Buddhism" {{ $subscriber->religion == "Buddhism" ?  "selected='selected'" : '' }}>Buddhism</option>
                                            <option value="Christianity" {{ $subscriber->religion == "Christianity" ?  "selected='selected'" : '' }}>Christianity</option>
                                            <option value="Hinduism" {{ $subscriber->religion == "Hinduism" ?  "selected='selected'" : '' }}>Hinduism</option>
                                            <option value="Islam" {{ $subscriber->religion == "Islam" ?  "selected='selected'" : '' }}>Islam</option>
                                            <option value="Judaism" {{ $subscriber->religion == "Judaism" ?  "selected='selected'" : '' }}>Judaism</option>
                                            <option value="Neo-Paganism" {{ $subscriber->religion == "Neo-Paganism" ?  "selected='selected'" : '' }}>Neo-Paganism</option>
                                            <option value="Nonreligious" {{ $subscriber->religion == "Nonreligious" ?  "selected='selected'" : '' }}>Nonreligious</option>
                                            <option value="Other" {{ $subscriber->religion == "Other" ?  "selected='selected'" : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Education Level</label>
                                        <select class="form-control dropdown shadow" id="education" name="education">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="No formal education" {{ $subscriber->education == "No formal education" ?  "selected='selected'" : '' }}>No formal education</option>
                                            <option value="Primary education" {{ $subscriber->education == "Primary education" ?  "selected='selected'" : '' }}>Primary education</option>
                                            <option value="Secondary education" {{ $subscriber->education == "Secondary education" ?  "selected='selected'" : '' }}>Secondary education or high school</option>
                                            <option value="GED" {{ $subscriber->education == "GED" ?  "selected='selected'" : '' }}>GED</option>
                                            <option value="Vocational qualification" {{ $subscriber->education == "Vocational qualification" ?  "selected='selected'" : '' }}>Vocational qualification</option>
                                            <option value="Bachelor's degree" {{ $subscriber->education == "Bachelor's degree" ?  "selected='selected'" : '' }}>Bachelor's degree</option>
                                            <option value="Master's degree" {{ $subscriber->education == "Master's degree" ?  "selected='selected'" : '' }}>Master's degree</option>
                                            @php
                                            $val ="Doctorate or higher";
                                            @endphp
                                            <option value="Doctorate or higher" {{ $subscriber->education == $val ?  "selected='selected'" : '' }}>Doctorate or higher</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ethnic Group</label>
                                        <select class="form-control dropdown shadow" name="ethnic_group">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="yoruba" {{ $subscriber->ethnic_group == "yoruba" ?  "selected='selected'" : '' }}>Yoruba</option>
                                            <option value="igbo" {{ $subscriber->ethnic_group == "igbo" ?  "selected='selected'" : '' }}>Igbo</option>
                                            <option value="hausa" {{ $subscriber->ethnic_group == "hausa" ?  "selected='selected'" : '' }}>Hausa</option>
                                            <option value="others" {{ $subscriber->ethnic_group == "others" ?  "selected='selected'" : '' }}>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Marital Status</label>
                                        <select class="form-control dropdown shadow" name="marital_status">
                                            <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                            <option value="married" {{ $subscriber->marital_status == "married" ?  "selected='selected'" : '' }}>Married</option>
                                            <option value="single" {{ $subscriber->marital_status == "single" ?  "selected='selected'" : '' }}>Single</option>
                                            <option value="divorced" {{ $subscriber->marital_status == "divorced" ?  "selected='selected'" : '' }}>Divorced</option>
                                            <option value="widowed" {{ $subscriber->marital_status == "widowed" ?  "selected='selected'" : '' }}>Widowed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row ml-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn2 button shadow mx-auto activeBPLink">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- Add -->
                    <div class="col-md-12 mybox shadow my-4 py-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row px-4">
                                    <div class="box_general padding_bottom" id="checkDiagnosis">
                                    <div class="header_box version_2">
                                        <h5><span><img style="width: 50px; height: 50px;" src="{{ asset('img/diagnosis.png') }}"></span> Add Diagnosis</h5>
                                    </div>
                                    <form action="{{ url('/diagnosis/new') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="diagnosis">Name of Diagnosis</label>
                                            <input type="text" name="name" id="name" class="form-control shadow" placeholder="Malaria, Typhioa...">
                                        </div>
                                        {{-- <a href="" class="btn_1 gray"> Add Medication</a> --}}
                                        <hr>
                                        <button type="submit" class="btn btn2 button shadow mx-auto blue approve">Add Diagnosis</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                   
</section>

<!--

    <div class="container">
        <div class="box_general padding_bottom">
            <a href="#updateProfile" class="btn_1 gray"><i class="fa fa-user"></i> Update Profile</a>
            <a href="#checkDiagnosis" class="btn_1 gray"><i class="fa fa-deviantart"></i> Check Diagnosis</a>
        </div>
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                @if($errors->all())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-3">
                        @isset($subscriber->avatar)
                        <img class="img-thumbnail" src="{{ asset('/storage/'.$subscriber->avatar) }}" />
                        @else
                        <img class="img-thumbnail" src="{{ asset('img/avatar.png') }}" />
                        @endisset
                        <form method="POST" action="{{ url('/profile/avatar') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Upload Profile Picture</label>
                                <input type="file" class="form-control shadow {{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">
                                @if ($errors->has('avatar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                                @endif
                                <br>
                                <button type="submit" class="btn_1 small">Upload Image</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" style="width:{{ $value }}%" aria-valuenow="{{ $value }}" aria-valuemin="{{ $min }}" aria-valuemax="{{ $max }}">{{ $value }}%</div>
                                </div><small>Profile Completed</small>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                @if($errors->profile->all())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->profile->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if(session('status'))
                                <div class="alert alert-success">{{session('status')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ url('updateProfile') }}" method="post">
                                    {{csrf_field()}}
                                    <div class="header_box version_2">
                                        <h2><i class="fa fa-user"></i>Update Username</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" value="{{ $subscriber->email }}" type="email" class="form-control shadow" placeholder="Email" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input name="phone" value="{{ $subscriber->phone }}" type="text" class="form-control" placeholder="Your telephone number" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="form-group">
                                            <button type="submit" class="btn_1 medium">Update Username</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box_general padding_bottom" id="updateProfile">
            <div class="header_box version_2">
                <div class="row">
                    
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div> -->
@endsection

@extends('layouts.admin.adminlayout')

@section('title')
    Dashboard
@endsection
@section('content')
<style type="text/css">
  .check
{
  opacity:0.5;
  color:#996;
}
.img-check:hover {
  cursor: pointer;
}
.hidden {
  visibility: hidden;
}
</style>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Physical Trainer Dashboard</li>
        </ol>
        <!-- Icon Cards-->
        <!-- <div class="box_general padding_bottom" data-aos="fade-right">
          <div class="row">
            <h1>Admin Dashboard</h1>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                        <i class="fa fa-fw fa-caret-up"></i>
                     
                  </div>
                  <div class="mr-5">
                    <h5>Blood Pressure </h5>
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div> -->
          <!-- <div class="continer">
            <div class="row">
              @foreach($users as $user)
                <p>  
                {{ $user->name }}<br/>
                </p>
              @endforeach
            </div>
        </div> -->
        <!-- /cards -->

        <!-- /.container-fluid-->
  <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <!-- Blood Pressure DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fa fa-table"></i> <h2>Physical Trainer List</h2></div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="bloodPressureTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Active</th>
                              <th>DOB</th>
                              <th>Action</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Active</th>
                              <th>DOB</th>
                              <th>Action</th>
                              <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="user{{$user->id}}">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->active }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{\App\Http\Utility::dateToWords($user->created_at)}}</td>
                                <td><button data-id="{{$user->id}}" class="btn btn-sm btn-primary fa fa-pencil edit-user" onclick=""></button>
                                    <button data-id="{{$user->id}}" class="btn btn-sm btn-danger fa fa-trash del-user"></button>
                                    <!-- <a href="{{$user->id}}" class="btn btn-sm btn-ifo fa fa-trash del-user"></a> -->
                                  </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">Blood Pressure</div>
                </div>
                 <!-- /tables-->
              </div>
          </div>
  </div>

</div>


@endsection
@section('scripts')

</script>
@endsection

@extends('layouts.medicalPersonal')

@section('title')
    Dashboard
@endsection
@section('content')
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
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
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
            
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
                    <h5 class="text-center">Approved Care Team</h5>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Subscriber Name</th>
                            <th>Subscriber Phone Number</th>
                            <th>Action</th>
                        </tr>
                        @if( count($careTeams) > 0 )

                            @foreach($careTeams as $careTeam)
                                <tr>
                                    <td>{{ $careTeam->id }}
                                    <td>{{ $careTeam->subscriber->name }}</td>
                                    <td>{{ $careTeam->subscriber->phone }}</td>
                                    <td><a href="javascript:void(0);" onclick="addUserToCareTeam({{ $careTeam->id  }})" class="btn_1 gray approve wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Approve Connection Request</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><div class="alert alert-warning">There are no approved subscriber</div></td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
         
            <!-- /row-->
          </div>
      
    </div>
        <!-- /.container-fluid-->
  </div>
@endsection
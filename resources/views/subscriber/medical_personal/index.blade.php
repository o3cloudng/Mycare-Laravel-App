
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
            <li class="breadcrumb-item active">Medical Personals</li>
          </ol>
          <div class="box_general">
                <div class="header_box">
                    <h2 class="d-inline-block">Medical Personals</h2>
                    <div class="filter">
                        <select name="orderby" class="selectbox">
                            <option value="Any time">Any time</option>
                            <option value="Latest">Latest</option>
                            <option value="Oldest">Oldest</option>
                        </select>
                    </div>
                </div>
                <div class="list_general">
                    <ul>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                            <li>
                                {{-- <figure><img src="img/avatar1.jpg" alt=""></figure> --}}
                                <small>{{-- ucfirst($user->roles()->first()->name) --}}</small>
                                <h4>{{ $user->name }}</h4>
                                <p>{{ $user->email }}</p>
                                <p>{{ $user->phone }}</p>
                                <ul class="buttons">
                                    <li><a href="javascript:void(0);" onclick="addUserToCareTeam({{ $user->id }})" class="btn_1 gray approve wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Add to Care Team</a></li>
                                </ul>
                            </li>
                            @endforeach
                        @endif
                      
                    </ul>
                </div>
            </div>
            <!-- /box_general-->
            <nav aria-label="...">
                <ul class="pagination pagination-sm add_bottom_30">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <!-- /pagination-->
         
         
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

function addUserToCareTeam(userID) {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/care-team/member/new') }}",
                type: 'POST',
                data: {
                  user_id: userID
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result)
                    toastr.success('Congrats, You have send a request to ' + result.username)
                },
                error : function(e) {
                    console.log(e)
                    // toastr.error("There was an error sending your request")
                }
              });
    }

</script>
@endsection
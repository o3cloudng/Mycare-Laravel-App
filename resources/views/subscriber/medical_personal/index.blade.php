
@extends('layouts.dashboard')

@section('header')
<h2 class="d-inline-block">Medical Personals</h2>
@endsection

@section('title')
    Care Team
@endsection

@section('emergency-active')
black
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <h4 class="heading shadow-sm">Medical Personels</h4>
            </div>

                <div class="list_general">
                    <ul>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                            <li class="box">
                                <center><img class="rounded" style="width: 50px; height: 50px; margin: auto;" src="img/avatar.png" alt=""></center>
                                <small>{{-- ucfirst($user->roles()->first()->name) --}}</small>
                                <h4 class="text-center">{{ $user->name }}</h4>
                                <p class="text-center">{{ $user->email }}</p>
                                <p class="text-center">{{ $user->phone }}</p>
                                <ul class="buttons text-center">
                                    <li class="text-center"> <a href="javascript:void(0);" onclick="addUserToCareTeam({{ $user->id }});" class="btn_1 gray approve wishlist_close btn2 activeLink shadow text-center"><i class="fa fa-fw fa-times-circle-o"></i> Add to Care Team </a></li>
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
    });



    function addUserToCareTeam(userID) {
    // alert(userID);
        // $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
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
                    toastr.error("There was an error sending your request")
                }
              });
    }
});



</script>
@endsection
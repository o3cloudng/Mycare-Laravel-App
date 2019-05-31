
@extends('layouts.admin.adminlayout')

@section('title')
    MYBUMP
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
          <li class="breadcrumb-item active">Admin Dashboard</li>
        </ol>
        <!-- /.container-fluid-->
  <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <!-- Blood Pressure DataTables Card-->
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fa fa-table"></i> <h2>MYBUMP Content</h2></div>
                  <div class="card-body">
                    <div class="list-group">
                    @foreach ($blog as $b)
                      <div class="list-group-item my-2">
                        <strong><a href="blog/{{ $b->id }}"> {{ $b->title }}</a></strong> <br/>
                        <small>{{ $b->slug}} </small>                    
                      </div>                      
                    @endforeach
                    </div>
                  </div>
                  <div class="card-footer small text-muted">MYBUMP</div>
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
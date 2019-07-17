@extends('layouts.dashboard')

@section('title')
    Medical Records
@endsection
@section('header')
    <i class="fa fa-user"></i> Medical Records
@endsection
@section('content')
    <div class="container">
          <div class="box_general padding_bottom">
            <div class="row">
                <h4 class="heading shadow">Cholesterol Records</h4>
            </div>
            <div class="card">
                <div class="card-header"><i class="fa fa-table"></i> Cholesterol</div>
                <div class="card-body">
                    <div class="row">
                <div class="col-md-8">
                   <div class="table-responsive">
                        <table class="table table-condensed table-bordered" id="cholesterolTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Total Cholesterol Value (md/dl)</th>
                                <th>Total Cholesterol Status</th>
                                <th>High Density Lipoprotein Value (mg/dl)</th>
                                <th>High Density Lipoprotein Status</th>
                                <th>Time Last Updated</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Total Cholesterol Value (md/dl)</th>
                                <th>Total Cholesterol Status</th>
                                <th>High Density Lipoprotein Value (mg/dl)</th>
                                <th>High Density Lipoprotein Status</th>
                                <th>Time Last Updated</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @isset($cholesterol)
                            <tr>
                                <td>{{ $cholesterol->total_cholesterol }}</td>
                                <td>{{ $cholesterol->total_cholesterol_status }}</td>
                                <td>{{ $cholesterol->high_density_lipoprotein }}</td>
                                <td>{{ $cholesterol->hdl_status }}</td>
                                <td>{{ $cholesterol->updated_at->diffForHumans() }}</td>
                            </tr>
                            @endisset
                        </tbody>
                    </table>
                   </div>
                </div>
                <div class="col-md-4">
                   
                    <h5> 
                        @isset($cholesterol) 
                            Update 
                        @else 
                            Add 
                        @endisset 
                        Cholesterol details
                    </h5>
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
                    @if($errors->all())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('cholesterol') }}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Total Cholesterol (mg/dl)</label>
                            <input class="form-control shadow" value="@isset ($cholesterol) {{ $cholesterol->total_cholesterol }} @endisset" name="total_cholesterol" type="number" placeholder="Your Total Cholesterol">
                        </div>
                        <div class="form-group">
                            <label>High Density Lipoprotein (mg/dl)</label>
                            <input class="form-control shadow" value="@isset ($cholesterol) {{ $cholesterol->high_density_lipoprotein }} @endisset" name="high_density_lipoprotein" type="number" placeholder="Your High Density Lipoprotein">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn_1 medium btn btn2 shadow activeBPLink">Submit</button>
                        </div>
                    </form>
                    <!-- /row-->
                </div>
            </div>
                </div>
                <div class="card-footer"></div>
            </div>
          </div> 
          <!-- /row-->
         
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection

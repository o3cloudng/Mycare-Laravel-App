
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Find easily a doctor and book online an appointment">
  <meta name="author" content="Ansonika">
    <title>MyCarePlus Activate</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style/bootstrap-select.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css">
   
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



  <link href="{{asset('css/icon_fonts/css/all_icons_min.css')}}" rel="stylesheet">


  <link href="css/style/style.css" rel="stylesheet">

  </head>
  <body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top fixed-top"  style="border: 1px solid #efefef; box-shadow: 1px 2px 5px #eee;">
      <div class="container">
      <a href="/"><img style="width: 80px; height:40px;" src="{{ asset('img/logo.jpeg') }}" /></a>
        <span style="color: black;">Hi Guest</span>
      <div>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item"></li>
          <li class="nav-item"></li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <a href="/phonesignin" class="nav-link btn btn-success btn-large float-right activate"> Already subscribed?</a>
        </form>
      </div>
      </div>
    </nav>
<section>
  <div class="container my-2 d-none d-md-block">
    <div class="row">
      &nbsp;
    </div>
  </div>
</section>

<div id="main" class="mt-5 mt-sm-2">
      <section class="my-5">
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
                              @if(session('status'))
                                            <div class="alert alert-success">{{session('status')}}</div>
                              @endif
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
            <div class="row">
              <div class="col-md-3 shadow text-center my-3 mybox">
                <img src="img/svg/mybp.svg" class="my-4" />
                <h3>My Blood Pressure</h3>
                <p class="p-2">My Blood Pressure (MYBP) 
                    Monitor your blood pressure and avoid the risk of Hypertension</p>
                    <p>
                        <!-- <a href="dashboard" class="btn btn1 btn-warning">Subscribe Now</a> -->
                        <button type="button" class="btn btn2 button shadow activeBPLink text-sm-center" data-toggle="modal" data-target="#addBloodPressure">Subscribe Now</button>
                      </p>
              </div>
              <div class="col-md-3 shadow offset-md-1 text-center my-3 mybox">
                <img src="img/svg/mybg.svg" class="my-4" />
                <h3>My Blood Glucose</h3>
                <p class="p-2">My Blood Glucose (MYBG) 
                    Monitor your blood glucose level and avoid the risk of Diabetes</p>
                    <p>
                        <button type="button" class="btn btn2 button shadow activeBPLink text-sm-center" data-toggle="modal" data-target="#addBloodPressure">Subscribe Now</button>
                      </p>
              </div>
              <div class="col-md-3 shadow offset-md-1 text-center my-3 mybox">
                <img src="img/svg/mybump.svg" class="my-4"/>
                  <h3>MYBUMP</h3>
                  <p class="p-2">My BUMP 
                      Important and regular updates for you during pregnancy.
                    </p>
                    <p>
                      <button type="button" class="btn btn2 button shadow activeBPLink text-sm-center" data-toggle="modal" data-target="#addBloodPressure">Subscribe Now</button>
                    </p>
                </div>
            </div>
        </div>
        
      </section>
</div>



<div class="modal fade" id="addBloodPressure" tabindex="-1" role="dialog" aria-labelledby="addBloodPressureLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="addMedicationLabel">Select Subscription Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
         
          <form action="{{ url('/activate/new') }}" method="POST">
              <div class="modal-body">
                  {{csrf_field()}}
                  <div class="row">
                      <div class="col-md-12 form-group">
                          <label>Phone Number (0809xxxxxxx)</label>
                          <input class="form-control shadow" required value="{{old('systolic')}}" name="phone" type="number" placeholder="08012345678">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 form-group">
                          <label>Service</label>
                          <select name="service_id" id="" class="form-control">
                            <option value="3705">MYCARE</option>
                            <!-- <option value="3705">MYBG</option>
                            <option value="3705">MYBUMP</option> -->
                          </select>
                          <!-- <input class="form-control shadow" value="{{old('systolic')}}" name="systolic" type="text"> -->
                      </div>
                  </div>
                  <div class="row">
                      <div class="form-group col-md-12">
                          <label>Period & Amount</label>
                          <select name="serviceAmount" id="" class="form-control">
                            <option value="20">NGN 20 - 1 Day</option>
                            <!-- <option value="50">NGN 50 - 3 Days</option>
                            <option value="100">NGN 100 - 7 Days</option> -->
                          </select>
                      </div>
                  </div>
              <div class="modal-footer">
                  <div class="form-group">
                      <button type="button" class="btn_1 btn btn2 button shadow default gray delete" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn_1 btn btn2 button shadow activeBPLink gray approve">Subscribe</button>
                  </div>
              </div>
              
          </form>
                    
                    
                <!-- /row-->
                </div>
            </div>
          </div>

<!-- Begin page content -->
<!-- <main role="main" class="flex-shrink-0">
  <div class="container">
      
  </div>
</main> -->

<!-- <footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/bootstrap-select.min.js"></script>


<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Page level plugin JavaScript-->
{{-- <script src="{{asset('admin/vendor/chart.js/Chart.js')}}"></script> --}}
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('admin/vendor/jquery.selectbox-0.2.js')}}"></script>
<script src="{{asset('admin/vendor/retina-replace.min.js')}}"></script>
<script src="{{asset('admin/vendor/jquery.magnific-popup.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('admin/js/admin.js')}}"></script>
<!-- Custom scripts for this page-->
<script src="{{asset('admin/js/admin-charts.js')}}"></script>

<!-- Javascript Functions-->
<script src="{{asset('admin/js/functions.js')}}"></script>
<!-- COMMON SCRIPTS -->

<script src="{{asset('js/common_scripts.min.js')}}"></script>
<script src="{{asset('js/functions.js')}}"></script>

    </body>
</html>

@extends('layouts.dashboard')

@section('title')
    Medical Records
@endsection
@section('header')
    <i class="fa fa-user"></i> Body Mass Index
@endsection
@section('content')

    <div class="container">
          <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <div class="row heading">
                    <div class="col-md-9">
                      <h4 class="">Body Mass Index (Profile details)</h4>
                    </div>
                    <div class="col-md-3">
                      <button type="button" class="btn_1 btn btn2 shadow activeBPLink" data-toggle="modal" data-target="#addBodyMass">
                            Add New Body Mass Index
                        </button>
                    </div>    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class=""><i class="fa fa-table"></i> Body Mass Indexes</h5>
                </div>
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
                    <table class="table table-condensed table-bordered" id="bodyMassIndexTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Weight (kg)</th>
                                <th>Height (cm)</th>
                                <th>Body Mass Index (kg/m2)</th>
                                <th>Status</th>
                                <th>Risk</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Weight (kg)</th>
                                <th>Height (cm)</th>
                                <th>Body Mass Index (kg/m2)</th>
                                <th>Status</th>
                                <th>Risk</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(isset($body_mass_indexes))
                                @foreach ($body_mass_indexes as $bmi)
                                    <tr class="data-row">
                                        <td class="weight">{{ $bmi->weight }}</td>
                                        <td class="height">{{ $bmi->height }}</td>
                                        <td>{{  number_format($bmi->bmi, 1) }}</td>
                                        <td>{{ $bmi->status }}</td>
                                        <td>{{ $bmi->risk }}</td>
                                        <td>
                                            <button data-id="{{ $bmi->id }}" data-height="{{ $bmi->height }}" data-weight="{{ $bmi->weight }}" class="btn btn-sm btn-primary fa fa-pencil" id="edit-bmi"  data-target="#edit-modal" data-toggle="modal"></button> 
                                            <!-- <button data-id="{{ $bmi->id }}" class="btn btn-sm btn-danger fa fa-trash del-bmi"></button> -->
                                            <!-- <a href="updateBmi/{{ $bmi->id }}" class="btn btn-sm btn-primary fa fa-pencil"></a> -->
                                            <a href="deleteBMI/{{ $bmi->id }}" class="btn btn-sm btn-danger fa fa-trash del-bmi"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                       
                    </table>
                </div>
            </div>
                </div>
                <!-- <div class="card-footer"></div> -->
            </div>

            <!-- Add New Body Mass Index -->
            <div class="modal fade" id="addBodyMass" tabindex="-1" role="dialog" aria-labelledby="addBodyMassLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="addBodyMassLabel">Add Body Mass Index</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    
                        @if($errors->add_bmi->all())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->add_bmi->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('add-bmi'))
                            <div class="alert alert-success">{{session('add-bmi')}}</div>
                        @endif
                        <form action="{{ url('addBmi') }}" method="POST">
                                {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                                <div id="height">
                                                    <label>Height</label>
                                                    <input id="height_val" class="form-control shadow" value="{{old('height')}}" name="height" type="number" onfocusout="heightFeet()">
                                                </div>
                                                <div id="feet" class="col-sm-6" style="float: left;">
                                                    <label>Feet</label>
                                                    <input id="feet_val" class="form-control shadow" value="{{old('feet')}}" name="feet" type="number">
                                                </div>
                                                <div id="inches" class="col-sm-6" style="float: left;"> 
                                                    <label>Inches</label>                                                   
                                                    <input id="inches_val" class="form-control shadow" value="{{old('inches')}}" name="inches" type="number" onfocusout="heightCm()">
                                                </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Measurement Unit (ft/cm)</label>
                                            <select name="height_unit" id="height_unit" class="form-control shadow" required>
                                                <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                                <option value="feet">Feet</option>
                                                <option value="cm">Centimeter</option>
                                            </select>
                                        </div>
                                    </div>
                                    <span>
                                    
                                </span>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Weight</label>
                                            <input class="form-control shadow" value="{{old('weight')}}" name="weight" type="number" step="any">
                                        </div>
                                        <div class="col-sm-6">
                                                <label>Measurement Unit (lbs/kg)</label>
                                            <select name="weight_unit" id="weight_unit" class="form-control shadow" required>
                                                <option value="" selected="selected" disabled="disabled">-- Select One --</option>
                                                <option value="lbs">Pounds</option>
                                                <option value="kg">Kilogram</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                    <button type="button" class="btn_1 gray delete btn2 button btn default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn_1 gray approve btn2 button btn activeBPLink">Submit</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            <!-- /Body Mass Index -->
                        <!-- /box_general-->


   <!-- Edit Medication Modal -->
   <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="edit-modal-label">Edit Body Mass Index</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="edit-form" class="form-horizontal" method="POST" action="{{ url('/updateBmi') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                        <input class="form-control shadow" name="id" type="hidden" id="id">
                    <div class="form-group">
                        <label>Height (cm)</label>
                        <input class="form-control shadow" name="height" type="number" id="height">
                    </div>
                    <div class="form-group">
                        <label>Weight (kg)</label>
                        <input class="form-control shadow" name="weight" type="float" id="weight">
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_1 btn btn2 button shadow default delete" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn_1 btn btn2 button shadow activeBPLink approve">Save Changes</button>
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
    $(document).ready(function() {
        // alert('Testing JS');

        $('#height').show();
        $('#feet').hide();
        $('#inches').hide();

        $("#height_unit").change(function() {

          if($(this).val() == "feet") {
            // alert('Changed to Feet');
            $('#feet').show();
            $('#inches').show();
            $('#height').hide();
            } else {
            // alert('Changed to cm');
                $('#height').show();
                $('#feet').hide();
                $('#inches').hide();
            }
        });
        $("#height_unit").trigger("change");





        // Edit within modal
        $('#edit-modal').on('show.bs.modal', function(event) {
            // console.log('Reading modal data'); 
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var height = button.data('height')
            var weight = button.data('weight')

            var modal = $(this)


            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #height').val(height)
            modal.find('.modal-body #weight').val(weight)

        });

    });

        // function heightCm() {
        //     var feet_val = $('#feet_val').val();
        //     var inches_val = $('#inches_val').val();
        //     inches_val = parseInt(inches_val, 10);

        //     var heightCm = feet_val * 12;
        //     // console.log(typeof inches_val);
        //     heightCm = heightCm + inches_val;
        //     heightCm = heightCm * 2.54;
        //     heightCm = Math.floor(heightCm);;
        //     // alert(heightCm);
        //     // console.log(typeof heightCm);

        //     // $('#height_val').val() = heightCm;
        //     document.getElementById('height_val').value = heightCm;
        // }
        // function heightFeet() {
        //     var height_val = $('#height_val').val();

        //     // Convert from cm to inches
        //     var heightInches = height_val / 2.54;
        //     // From inches to feet
        //     heightFeet = heightInches / 12;
        //     // Remainder inches
        //     heightInches = heightInches % 12;
        //     heightFeet = Math.floor(heightFeet);
        //     // console.log("Feet: "+heightFeet);
        //     document.getElementById('feet_val').value = heightFeet;
        //     heightInches = Math.round(heightInches);
        //     document.getElementById('inches_val').value = heightInches;
        //     // console.log("Inches: " + heightInches);
        // }


</script>
@endsection
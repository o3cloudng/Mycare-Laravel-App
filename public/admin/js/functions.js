import drugAPI from "./medication_list.js";

$(function() {

    

    // Datamaps Implementatio
        
        $('#bloodGlucoseTable').DataTable();
        $('#bloodPressureTable').DataTable();
        $('#bodyMassIndexTable').DataTable();
        $('#cholesterolTable').DataTable();
        $('#careTeamTable').DataTable();
        $('#medicationTable').DataTable();
        $('#diagnosisTable').DataTable();
        $('#contactTeamTable').DataTable();

    // Auto Complete Drug Search
        
        $( "input#drug_name" ).autocomplete({
            source: drugAPI
        });

    // Body Mass Index
        // Delete Body Mass Index
        $('.del-bmi').click(function(){
            if(confirm("Do you want to delete this Body Mass Index ?")){
                location = 'deleteBMI/' + $(this).data('id') + '/delete';
            }
        })

        // Edit BMI

        $(document).on('click', "#edit-bmi", function() {
                $(this).addClass('edit-item-trigger-clicked'); 

                var options = { 'backdrop': 'static'};
                $('#edit-modal').modal(options)
        })

        // on modal show
        $('#edit-modal').on('show.bs.modal', function() {
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
            var row = el.closest(".data-row");

            // get the data
            var id = el.data('id');
            var weight = row.children(".weight").text();
            var height = row.children(".height").text();

            // fill the data in the input fields
            $("#id").val(id);
            $("#weight").val(weight);
            $("#height").val(height);

        })

        // on modal hide
        $('#edit-modal').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
        })

        /** /Edit BMI */


    // Medication 
        // Delete Medication
        $('.del-medication').click(function(){
            var table =  $('#medicationTable').DataTable();
              if(confirm("Do you want to delete this Contact Team member ?")){
                  var medicationID = $(this).data('id');
                  table.row( $(this).parents('tr') ).remove().draw();
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                      url: "/medications/delete",
                      type: 'POST',
                      data: {
                        id: medicationID
                      },
                      dataType: 'json',
                      success: function (result) {
                          console.log(result)
                          toastr.success('Congrats, You have removed ' + result.name)
                      },
                      error : function(e) {
                          console.log(e)
                          toastr.error("There was an error sending your request")
                      }
                    });
              }
          })

        // Medication Edit

        $(document).on('click', "#edit-medication", function() {
            $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            var options = {
                'backdrop': 'static'
            };
            $('#edit-modal').modal(options)
        })

        // on modal show
        $('#edit-modal').on('show.bs.modal', function() {
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
            var row = el.closest(".data-row");

            // get the data
            var id = el.data('id');
            var name = row.children(".name").text();
            var dosage = row.children(".dosage").text();
            var frequency = row.children(".frequency").text();
            var medical_personal = row.children(".medical_personal").text();
            var medical_personal_phone = row.children(".medical_personal_phone").text();
            var start_date = row.children(".start_date").text();
            var end_date = row.children(".end_date").text();

            // fill the data in the input fields
            $("#id").val(id);
            $("#name").val(name);
            $("#dosage").val(dosage);
            $("#medical_personal").val(medical_personal);
            $("#medical_personal_phone").val(medical_personal_phone);
            $("#frequency").val(frequency);
            $("#start_date").val(start_date);
            $("#end_date").val(end_date);
        })

        // on modal hide
        $('#edit-modal').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
        })

        /*** /Medication Edit */


    // Diagnosis
        // Delete Diagnosis
        $('.del-diagnosis').click(function(){
            if(confirm("Do you want to delete this diagnosis ?")){
                location = 'deleteDiagnosis/'+$(this).data('id');
            }
        })
        
        $('.edit-diagnosis').click(function(){
            location = 'editDiagnosis/'+$(this).data('id');
        })


    // Add Care Team Member
    $('#addUser').on('click', function(){
        if ( $(".medical").css('display') == 'none' ) {
            $(".medical").removeAttr("style");
            $("#populatedDoctor").css('display', 'none');
        } else {
            $("#populatedDoctor").removeAttr("style");
            $(".medical").css('display', 'none');
        }
    });

    

    // Blood Glucose

        $('.del-bg').click(function(){
            if(confirm("Do you want to delete this Blood Glucose reading ?")){
                location = 'deleteBG/'+$(this).data('id');
            }
        })
        $('.edit-bg').click(function(){
            location = 'editBG/'+$(this).data('id');
        })

    // Blood Pressure

        $('.del-bp').click(function(){
            if(confirm("Do you want to delete this Blood Pressure reading ?")){
                location = 'deleteBP/'+$(this).data('id');
            }
        })

        $('.edit-bp').click(function(){
            location = 'editBP/'+$(this).data('id');
        })


//  Contact Team
        $('.del-contactTeam').click(function(){
            var table =  $('#contactTeamTable').DataTable();
              if(confirm("Do you want to delete this Contact Team member ?")){
                  var contactTeamID = $(this).data('id');
                  table.row( $(this).parents('tr') ).remove().draw();
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                      url: "/contact-team/delete",
                      type: 'POST',
                      data: {
                        id: contactTeamID
                      },
                      dataType: 'json',
                      success: function (result) {
                          toastr.success('Congrats,You have removed ' + result.name + ' as a member of your contact team')
                      },
                      error : function(e) {
                          console.log(e)
                          toastr.error("There was an error sending your request")
                      }
                    });
              }
          })
    // Goals
          // Body Mass Index Goal
          $('#activateOrDeactivateBMI').click(function(){
              var bodyMassGoal = $(this).data('id');
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                      async: true,
                      url: "/setBmiGoal/activateOrDeactivate",
                      type: 'POST',
                      data: {
                        id: bodyMassGoal
                      },
                      dataType: 'json',
                      success: function (result) {
                          toastr.success(result.success)
                          $('body').load('/goals' + "#setBodyMGoal"); 
                      },
                      error : function(e) {
                          console.log(e)
                          toastr.error("There was an error sending your request")
                      }
                    });
                  
          })
});
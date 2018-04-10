<script>
          $('.breadcrumb').html('<li class="breadcrumb-item active">Resident</li>');
          $("#EditForm").validate({
               rules: {
                    email: {
                         required: true,
                         email: true
                    }
               }
          });


          if($( '#profile1' ).hasClass( "nav-link active" ))
          {
               //alert('maoni')
               $("#mch").hide();
               $("#ppdiv").hide();
               $("#walkin2").hide();
          }
          if($( '#emsiech' ).hasClass( "nav-link active" ))
          {
               //alert('maoni')
               $("#mch").show();
          }
          if($( '#pp' ).hasClass( "nav-link active" ))
          {
               //alert('maoni')
               $("ppdiv").show();
          }
          if($( '#walkin1' ).hasClass( "nav-link active" ))
          {
               //alert('maoni')
               $("#walkin2").show();
          }


          $('#bday_update').datetimepicker({
               format: 'YYYY-MM-DD'
          });

          $('#delivery').datetimepicker({
               format: 'YYYY-MM-DD'
          });

          $('#edc').datetimepicker({
               format: 'YYYY-MM-DD'
          });

          $('#birthdate').datetimepicker({
               format: 'YYYY-MM-DD'
          });

          $('#lmp').datetimepicker({
               format: 'YYYY-MM-DD'
          });
          $('#vita').datetimepicker({
               format: 'YYYY-MM-DD'
          });
          $('#datepp').datetimepicker({
               format: 'YYYY-MM-DD'
          });

          var resident = $('#residents-dt').DataTable({
               "processing": true,
               "serverSide": true,
               "ajax": "/resident_profile",
               "columns": [
                    {data: 'id'},

                    {data: 'first_name' },
                    {data: 'middle_name' },
                    {data: 'last_name' },
                    {data: 'gender'},
                    {data:'purok',
                    render: function(data, type, full, meta){
                         return full.purok +" "+ full.street+" "+full.barangay+", " + full.city;
                    }
               },
               {
                    data:'id',
                    render: function (data, type, full, meta)
                    {
                         return '<button type="button" id="'+data+'" class="btn btn-outline-info update_person"><i class="icon-settings"></i>&nbsp; Add Info</button>';
                    }
               },
          ]
     });
     function unhide()
               {
                    //alert('mao ni');
                    $("#mch").show();
                    $("#walkin").hide();
                    $("#ppdiv").hide();
                    $("#walkin2").hide();
               }
     function unhide1()
               {
                    $("#walkin").show();
               //     alert('mao ni');
                    $("#mch").hide();
                    $("#ppdiv").hide();
                    $("#walkin2").hide();
               }
     function unhide2()
              {
                    //alert('mao ni');
                    $("#walkin2").hide();
                    $("#ppdiv").show();
                    $("#mch").hide();
                   $("#walkin").hide();
                   $('#walkin').addClass('tab-pane').removeClass('tab-pane active');
               }

               function unhide3()
                        {
                              //alert('mao ni');
                              $("#walkin2").show();
                              $("#ppdiv").hide();
                              $("#mch").hide();
                             $("#walkin").hide();
                             $('#walkin').addClass('tab-pane').removeClass('tab-pane active');
                         }



          function refresh_resident_table()
                    {
                         resident.ajax.reload(); //reload datatable ajax
                    }



                    $('#AddForm').submit(function(e){
                         e.preventDefault();
          	              $.ajaxSetup({
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                 }
                            });
              $.ajax({
                    type: "POST",
                    url: "/add_resident",
                    data: $(this).serialize(),
                    success: function(data){
                      $('#first_name').val('');
                      $('#middle_name').val('');
                      $('#last_name').val('');
                      $('#gender').val('');
                      $('#purok').val('');
                      $('#street').val('');
                      $('#barangay').val('');
                      $('#city').val('');
                      $('#birthdate').val('');
                      $('#marital_status').val('');
                      $('#height').val('');
                      $('#weight').val('');
                      $('#blood_type').val('');
                      $('#contact_number').val('');
                      $('#email').val('');
                      $('#emergency_name').val('');
                      $('#emergency_contact').val('');
                      $('#emergency_relationship').val('');
                      swal( "Success!", "You added a resident!", "success", "Ok")
                      .then((value) => {
                    $("#AddForm").trigger('reset');
                          refresh_resident_table();
                      });

                    },
                    error: function(e) {

                    swal( "Oh no!", "Something went wrong!", "warning", "Ok");
                    }
              });
            });
      $(document).on('click', '.update_person', function(){
          var id = $(this).attr("id");
          $.ajax({
              url:"/update_resident",
              method: 'get',
              data:{id:id},
              dataType:'json',
              success:function(data){
                  $('#button_action').val('update');
                  $('#id').val(id);
                  $('#id_mch').val(id);
                  $('#id_pp').val(id);
                  $('#walkin_id').val(id);
                  $('#firstname_update').val(data.firstName);
                  $('a#profile1').text(data.firstName+"'s Profile");
                  $('#midname_update').val(data.midName);
                  $('#lastname_update').val(data.lastName);
                  $('#bday_update').val(data.dob);
                  $('#purok_update').val(data.purok);
                  $('#barangay_update').val(data.barangay);
                  $('#city_update').val(data.city);
                  $('#street_update').val(data.street);
                  $("#civStatus_update").val(data.civilStatus);
                  $("#gender_update").val(data.gender);
                  $("#height_update").val(data.height);
                  $("#weight_update").val(data.weight);
                  $("#btype_update").val(data.btype);
                  $("#contact_update").val(data.contact);
                  $("#email_update").val(data.email);
                  $('#addModal').modal('show');
                  refresh_resident_table();
              }
          })
      });

    $('#EditForm').submit(function(e) {

    e.preventDefault();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/post_update",
      method: 'post',
      data: $(this).serialize(),
      dataType: 'json',
      success: function(data){
        if(data.success==true){
          $('#addModal').modal('hide');
          refresh_resident_table();
           swal( "Success!", "You updated a resident!", "success", "Ok")
                      .then((value) => {
                    $("#addModal").trigger('reset');
                          refresh_resident_table();
                      });
                      }else{
                         swal( "Error!", "Something went wrong!", "warning", "Ok")
                      }
      },

      error: function(err) {
             swal( "Error!", "Something went wrong!", "warning", "Ok");
      }
    });
  });

   $('#mchForm').submit(function(e){
                         e.preventDefault();
                         var val = $('#id_mch').val();
          	              $.ajaxSetup({
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                 }
                            });
                            console.log(val);
              $.ajax({
                    type: "POST",
                    url: "/add_mch",
                    data: $(this).serialize(),
                    success: function(data){
                      $('#age_mch').val('');
                      $('#g_mch').val('');
                      $('#last_name').val('');
                      $('#p_mch').val('');
                      $('#lmp_mch').val('');
                      $('#edc_mch').val('');
                      $('#rcode_mch').val('');
                      $('#city').val('');
                      $('#level_mch').val('');
                      $('#range_mch').val('');
                      $('#remarks_mch').val('');
                      swal( "Success!", "You added a MCH consultation!", "success", "Ok")
                      .then((value) => {
                    $("#mchForm").trigger('reset');
                          refresh_resident_table();
                      });

                    },
                    error: function(e) {

                    swal( "Oh no!", "Something went wrong!", "warning", "Ok");
                    }
              });
            });

    $('#ppForm').submit(function(e){
                         e.preventDefault();
                         var val = $('#id_pp').val();
          	              $.ajaxSetup({
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                 }
                            });
                            console.log(val);
              $.ajax({
                    type: "POST",
                    url: "/add_pp",
                    data: $(this).serialize(),
                    success: function(data){
                      $('#age_pp').val('');
                      $('#delivery').val('');
                      $('#POdelivery').val('');
                      $('#attendee').val('');
                      $('#gender_pp').val('');
                      $('#fdg').val('');
                      $('#weight_pp').val('');
                      $('#vita').val('');
                      $('#date').val('');
                      $('#f_pp').val('');

                      swal( "Success!", "You added a resident!", "success", "Ok")
                      .then((value) => {
                    $("#ppForm").trigger('reset');
                          refresh_resident_table();
                      });

                    },
                    error: function(e) {

                    swal( "Oh no!", "Something went wrong!", "warning", "Ok");
                    }
              });
            });

    $('#walkinForm').submit(function(e){
      alert();
                         e.preventDefault();
          	              $.ajaxSetup({
                                  headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                 }
                            });
              $.ajax({
                    type: "POST",
                    url: "/add_walkin",
                    data: $(this).serialize(),
                    success: function(data){
                      $('#bp').val('');
                      $('#bs').val('');
                      $('#consultation').val('');
                      $('#findings').val('');
                      $('#notes').val('');
                      $('#med').val('');
                      $('#quantity').val('');
                      swal( "Success!", "You added a resident!", "success", "Ok")
                      .then((value) => {
                    $("#walkinForm").trigger('reset');
                          refresh_resident_table();
                      });

                    },
                    error: function(e) {

                    swal( "Oh no!", "Something went wrong!", "warning", "Ok");
                    }
              });
            });



</script>
<div class="animated fadeIn">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Residents Information

        </div>
        <div class="card-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active"  data-toggle="tab" href="#list" role="tab" aria-controls="list">List of Residents</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Add Resident</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="list" role="tabpanel">
              <table id="residents-dt" class="table table-hover table-bordered table-responsive-sm datatable dataTable no-footer" cellspacing="0" width="100%">
                <thead class="table-info">
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Firstname</th>
                    <th class="text-center">Middlename</th>
                    <th class="text-center">Lastname</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
              </table>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
                <form id="AddForm" novalidate="novalidate" >
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5">
                  <div class="card card-accent-primary">
                    <div class="card-header">
                      <strong>Personal Information</strong>
                      <small>Form</small>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name" value="">
                      </div>
                      <div class="form-group">
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter middle name">
                      </div>
                      <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
                      </div>
                      <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select name="gender"  id="gender"class="form-control">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="height">Height (inches):</label>
                        <input type="text" class="form-control" id="height" name="height" placeholder="Enter height">
                      </div>
                      <div class="form-group">
                        <label for="weight">Weight (pounds)</label>
                        <input type="text" class="form-control" id="weight" name="weight" placeholder="Enter weight">
                      </div>
                      <div class="form-group">
                        <label for="blood_type">Blood Type</label>
                        <select id="blood_type" name="blood_type" class="form-control">
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
                          <option value="B-">B-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label" for="bdate">Birthdate</label>
                        <div class="input-group date" >
                          <input type="text" id="birthdate" name="birthdate"   class="form-control">
                          <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="marital_status">Marital Status:</label>
                        <select name="marital_status" id="marital_status" class="form-control">
                          <option value="Single">Single</option>
                          <option value="Single">Married</option>
                          <option value="Single">Widowed</option>
                          <option value="Single">Separated</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control"  id="email" name="email" placeholder="Enter email address">
                      </div>
                      <div class="form-group">
                        <label for="contact">Contact Number</label>
                        <input type="text" class="form-control"  id="contact_number" name="contact_number" placeholder="Enter email address">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-7">
                  <div class="card card-accent-primary">
                    <div class="card-header">
                      <strong>In Case of Emergency</strong>
                      <small>Form</small>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="emergency_name">Name</label>
                        <input type="text" class="form-control" id="emergency_name" name="emergency_name" placeholder="Enter name">
                      </div>
                      <div class="form-group">
                        <label for="emergency_contact">Contact</label>
                        <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" placeholder="Enter contact number">
                      </div>
                      <div class="form-group">
                        <label for="emergency_relationship">Relationship</label>
                        <input type="text" class="form-control" id="emergency_relationship" name="emergency_relationship" placeholder="Enter relationship">
                      </div>
                    </div>
                  </div>
                  <div class="card card-accent-primary">
                    <div class="card-header">
                      <strong>Address Information</strong>
                      <small>Form</small>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-sm-4">
                          <label for="purok">Purok</label>
                          <select id="purok" name="purok" class="form-control">
                            <option value="Purok 1">Purok 1</option>
                            <option value="Purok 2">Purok 2</option>
                            <option value="Purok 3">Purok 3</option>
                            <option value="Purok 4">Purok 4</option>
                            <option value="Purok 5">Purok 5</option>
                            <option value="Purok 6">Purok 6</option>
                            <option value="Purok 7">Purok 7</option>
                            <option value="Purok 8">Purok 8</option>
                            <option value="Purok 9">Purok 9</option>
                            <option value="Purok 10">Purok 10</option>
                            <option value="Purok 11">Purok 11</option>
                            <option value="Purok 12">Purok 12</option>
                            <option value="Purok 13">Purok 13</option>
                            <option value="Purok 14">Purok 14</option>
                            <option value="Purok 15">Purok 15</option>
                            <option value="Purok 16">Purok 16</option>
                            <option value="Purok 17">Purok 17</option>
                            <option value="Purok 18">Purok 18</option>
                            <option value="Purok 19">Purok 19</option>
                            <option value="Purok 20">Purok 20</option>
                            <option value="Purok 21">Purok 21</option>
                            <option value="Purok 22">Purok 22</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-8">
                          <label for="street">Street</label>
                          <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-4">
                          <label for="barangay">Barangay</label>
                          <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter barangay">
                        </div>
                        <div class="form-group col-sm-8">
                          <label for="city">City</label>
                          <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="form-group col-sm-4 ">
              <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Save Changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>

<!-- modals -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div  class="modal-dialog modal-info modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Add Consultation</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                 </button>
            </div>
            <div class="modal-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="profile1" data-toggle="tab" onclick="return unhide1();" href="#walkIn" role="tab" aria-controls="walkIn">Walk-In</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="walkin1" data-toggle="tab" onclick="return unhide3();" href="#walkin2" role="tab" aria-controls="walkin2">Walk-In</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="emsiech" data-toggle="tab" onclick="return unhide();" href="#mch" role="tab" aria-controls="mch">MCH</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pp" data-toggle="tab" onclick="return unhide2();" href="#pp" role="tab" aria-controls="pp">PP</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="epi" data-toggle="tab" onclick="return unhide2();" href="#epi" role="tab" aria-controls="epi">EPI</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="ufc" data-toggle="tab" onclick="return unhide2();" href="#ufc" role="tab" aria-controls="ufc">UFC</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="fp" data-toggle="tab" onclick="return unhide2();" href="#fp" role="tab" aria-controls="fp">FP</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="cdd" data-toggle="tab" onclick="return unhide2();" href="#cdd" role="tab" aria-controls="cdd">CDD</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="mortality" data-toggle="tab" onclick="return unhide2();" href="#mortality" role="tab" aria-controls="mortality">Mortality</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="cari" data-toggle="tab" onclick="return unhide2();" href="#cari" role="tab" aria-controls="cari">CARI</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="gms" data-toggle="tab" onclick="return unhide2();" href="#gms" role="tab" aria-controls="gms">GMS</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="bip" data-toggle="tab" onclick="return unhide2();" href="#bip" role="tab" aria-controls="bip">BIP</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tbsymp" data-toggle="tab" onclick="return unhide2();" href="#tbsymp" role="tab" aria-controls="tbsymp">TB SYMP</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="rabies" data-toggle="tab" onclick="return unhide2();" href="#rabies" role="tab" aria-controls="rabies">RABIES</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="san" data-toggle="tab" onclick="return unhide2();" href="#san" role="tab" aria-controls="san">SANITATION</a>
                      </li>
                    </ul>


                    <!-- Tab panes -->

                    <div class="tab-content" >
                         <div id="walkin">
                        <div role="tabpanel" class="tab-pane active" id="walkIn">

                          <form id="EditForm" novalidate="novalidate" method="post" enctype="multipart/form-data" >
                          {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="">
                            <input type="hidden" name="button_action" id="button_action" value="">
                            <div class="row">
                              <div class="form-group col-md-4">
                                <label class="col-form-label" for="firstname">First name</label>
                                  <input type="text" class="form-control" id="firstname_update" name="firstname"  placeholder="First name" value="">
                              </div>

                                    <div class="form-group  col-md-4">
                                        <label class="col-form-label" for="midname">Middle Name</label>
                                          <input type="text" class="form-control" id="midname_update" name="midname" placeholder="Middle Name" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label class="col-form-label" for="lastname">Last name</label>
                                      <input type="text" class="form-control" id="lastname_update" name="lastname" placeholder="Last name" required>
                                    </div>
                                  </div>
                                  <div class="row">


                                    <div class="form-group col-md-2">
                                      <label class="col-form-label" for="gender">Gender</label>
                                      <br>
                                      <select class="form-control" name="gender" id="gender_update">

                                        <option value="male">Male</option>
                                        <option value="female">Female</option>


                                      </select>
                                     </div>
                                     <div class="form-group col-md-4">
                                       <label class="col-form-label" for="bdate">Birthdate</label>
                                       <div class="input-group date" >
                                         <input type="text" id="bday_update" name="bday"  value="" class="form-control">
                                         <div class="input-group-addon">
                                           <span class="glyphicon glyphicon-th"></span>
                                         </div>
                                       </div>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label class="col-form-label" for="civStatus">Marital Status</label>
                                        <br>
                                        <select class="form-control" name="civStatus" id="civStatus_update">

                                          <option value="Single">Single</option>
                                          <option value="Married">Married</option>
                                          <option value="Widow/er">Widow/er</option>
                                          <option value="Live-in">Live-in</option>
                                          <option value="Separated">Separated</option>
                                          <option value="Divorce">Divorce</option>


                                        </select>
                                       </div>
                                  </div>

                                     <div class="row">
                                       <div class="form-group col-md-4">
                                         <label class="col-form-label" for="firstname">Height(inches)</label>
                                           <input type="text" class="form-control" id="height_update" value="" name="height" placeholder="Height" required>
                                       </div>

                                             <div class="form-group  col-md-4">
                                                 <label class="col-form-label" for="midname">Weight(pounds)</label>
                                                   <input type="text" class="form-control" id="weight_update" value="" name="weight" placeholder="Weight" required>
                                             </div>
                                             <div class="form-group  col-md-4">
                                                 <label class="col-form-label" for="midname">Blood Type</label>
                                                  <select class="form-control" name="btype" id="btype_update">
                                                       <option value="O-">O-</option>
                                                       <option value="O+">O+</option>
                                                       <option value="A-">A-</option>
                                                       <option value="A+">A+</option>
                                                       <option value="B-">B-</option>
                                                       <option value="B+">B+</option>
                                                       <option value="AB-">AB-</option>
                                                       <option value="AB+">AB+</option>
                                                  </select>
                                             </div>
                                             </div>






                      <div class="row">
                        <div class="form-group col-sm-4">
                          <label for="purok">Purok</label>
                          <select id="purok_update" name="purok" class="form-control">
                            <option value="Purok 1">Purok 1</option>
                            <option value="Purok 2">Purok 2</option>
                            <option value="Purok 3">Purok 3</option>
                            <option value="Purok 4">Purok 4</option>
                            <option value="Purok 5">Purok 5</option>
                            <option value="Purok 6">Purok 6</option>
                            <option value="Purok 7">Purok 7</option>
                            <option value="Purok 8">Purok 8</option>
                            <option value="Purok 9">Purok 9</option>
                            <option value="Purok 10">Purok 10</option>
                            <option value="Purok 11">Purok 11</option>
                            <option value="Purok 12">Purok 12</option>
                            <option value="Purok 13">Purok 13</option>
                            <option value="Purok 14">Purok 14</option>
                            <option value="Purok 15">Purok 15</option>
                            <option value="Purok 16">Purok 16</option>
                            <option value="Purok 17">Purok 17</option>
                            <option value="Purok 18">Purok 18</option>
                            <option value="Purok 19">Purok 19</option>
                            <option value="Purok 20">Purok 20</option>
                            <option value="Purok 21">Purok 21</option>
                            <option value="Purok 22">Purok 22</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-8">
                          <label for="street">Street</label>
                          <input type="text" class="form-control" id="street_update" name="street" placeholder="Enter Street">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-4">
                          <label for="barangay">Barangay</label>
                          <input type="text" class="form-control" id="barangay_update" name="barangay" placeholder="Enter barangay">
                        </div>
                        <div class="form-group col-sm-8">
                          <label for="city">City</label>
                          <input type="text" class="form-control" id="city_update" name="city" placeholder="Enter city">
                        </div>
                      </div>


                                                       <div class="row">
                                                                <div class="form-group col-md-6">
                                                                  <label class="col-form-label" for="password">Contact Number</label>
                                                                    <input type="text" class="form-control" value="" id="contact_update" name="contact" placeholder="Contact Number" required>
                                                                </div>
                                                                      <div class="form-group col-md-6">
                                                                        <label class="col-form-label" for="email">Email Address</label>
                                                                          <input type="text" class="form-control" value="" id="email_update" name="email" placeholder="Email Address" required >
                                                                      </div>
                                                              </div>

                               <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Save Changes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               </div>
                              </form>
                         </div>
                    </div>


                         <div role="tabpanel" class="tab-pane active" id="mch">
                             <form id="mchForm" novalidate="novalidate" method="post" >
                                 {{ csrf_field() }}
                              <input type="hidden" name="id_mch" id="id_mch" value="">
                              <input type="hidden" name="button_action" id="button_action" value="">

                                   <div class="row">
                                        <div class="form-group col-md-4">
                                             <label class="col-form-label" for="firstname">Age</label>
                                             <input type="number" class="form-control" id="age_mch" value="" name="age" placeholder="Age" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                             <label class="col-form-label" for="firstname">G</label>
                                             <input type="text" class="form-control" id="g_mch" value="" name="g" placeholder="G" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                             <label class="col-form-label" for="firstname">P</label>
                                             <input type="text" class="form-control" id="p_mch" value="" name="p" placeholder="P" required>
                                        </div>

                                  </div>

                                     <div class="row">
                                          <div class="form-group col-md-4">
                                           <label class="col-form-label" for="bdate">LMP</label>
                                           <div class="input-group date" >
                                             <input type="text" id="lmp" name="lmp" placeholder="YYY-MM-DD"   class="form-control">
                                             <div class="input-group-addon">
                                               <span class="glyphicon glyphicon-th"></span>
                                             </div>
                                           </div>
                                         </div>
                                         <div class="form-group col-md-8">
                                         <label class="col-form-label" for="bdate">EDC</label>
                                         <div class="input-group date" >
                                           <input type="text" id="edc" name="edc" placeholder="YYY-MM-DD"    class="form-control">
                                           <div class="input-group-addon">
                                             <span class="glyphicon glyphicon-th"></span>
                                           </div>
                                         </div>
                                      </div>
                                   </div>
                             <div class="form-group">
                                      <label class="col-form-label" for="email">R(Code #)</label>
                                      <input type="text" class="form-control" id="rcode_mch" value="" name="rcode" placeholder="R Code Number" required="required">
                              </div>
                                        <div class="row">
                                             <div class="form-group  col-md-6">
                                               <select class="form-control" name="level" id="level_mch">
                                                  <option value="Normal">Normal</option>
                                                  <option value="Risk">Risk</option>
                                                </select>
                                             </div>
                                             <div class="form-group col-md-6">
                                                  <select class="form-control" name="range" id="range_mch">
                                                     <option value="1-3">1-3</option>
                                                     <option value="4-6">4-6</option>
                                                     <option value="7-9">7-9</option>
                                                   </select>
                                              </div>
                                        </div>
                              <div class="form-group">
                                        <label class="col-form-label" for="remarks">Remarks</label>
                                        <textarea class="form-control" id="remarks_mch" value="" name="remarks" placeholder="Remarks" required="required"></textarea>
                              </div>
                          <div class="form-group pull-right">
                               <button type="submit" class="btn btn-primary">Save Changes</button>
                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                          </form>
                        </div>

                        <div role="tabpanel" class="tab-pane active" id="ppdiv">
                            <form id="ppForm" novalidate="novalidate" method="post" >
                               {{ csrf_field() }}
                             <input type="hidden" name="id_pp" id="id_pp" value="">
                             <input type="hidden" name="button_action" id="button_action" value="">
                                    <div class="row">
                                         <div class="form-group col-md-6">
                                             <label class="col-form-label" for="firstname">Age</label>
                                             <input type="number" class="form-control" id="age_pp" value="" name="age" placeholder="Age" required>
                                        </div>
                                         <div class="form-group col-md-6">
                                         <label class="col-form-label" for="bdate">Date of Delivery</label>
                                         <div class="input-group date" >
                                            <input type="text" id="delivery" name="DOdelivery" placeholder="YYY-MM-DD"   class="form-control">
                                            <div class="input-group-addon">
                                              <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                         </div>
                                       </div>

                                         </div>
                            <div class="form-group">
                                     <label class="col-form-label" for="email">Place of Delivery</label>
                                     <input type="text" class="form-control" id="POdelivery" value="" name="POdelivery" placeholder="Place of Delivery" required="required">
                             </div>
                             <div class="form-group">
                                     <label class="col-form-label" for="email">Attended By</label>
                                     <input type="text" class="form-control" id="attendee" value="" name="attendee" placeholder="Attended By" required="required">
                             </div>
                                       <div class="row">
                                            <div class="form-group col col-md-4">
                                               <label class="col-form-label" for="email">Gender</label>
                                              <select class="form-control" name="gender" id="gender_pp">
                                                 <option value="M">Male</option>
                                                 <option value="F">Female</option>
                                              </select>
                                            </div>
                                            <div class="form-group col col-md-4">
                                                    <label class="col-form-label" for="email">FDG</label>
                                                    <input type="text" class="form-control" id="fdg" value="" name="fdg" placeholder="FDG" required="required">
                                            </div>
                                            <div class="form-group col col-md-4">
                                                    <label class="col-form-label" for="email">Weight</label>
                                                    <input type="number" class="form-control" id="weight_pp" value="" name="weight" placeholder="Weight" required="required">
                                            </div>
                                       </div>
                                       <div class="row">
                                           <div class="form-group col-md-6">
                                            <label class="col-form-label" for="bdate">Vitamin A</label>
                                            <div class="input-group date" >
                                              <input type="text" id="vita" name="vita" placeholder="YYY-MM-DD"   class="form-control">
                                              <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                              </div>
                                            </div>
                                         </div>
                                         <div class="form-group col-md-6">
                                         <label class="col-form-label" for="bdate">Date of PP</label>
                                         <div class="input-group date" >
                                            <input type="text" id="datepp" name="date" placeholder="YYY-MM-DD"    class="form-control">
                                            <div class="input-group-addon">
                                              <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                         </div>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="remarks">F</label>
                                        <input type="text" class="form-control" id="f_pp" value="" name="f" placeholder="F" required="required">
                                   </div>
                         <div class="form-group pull-right">
                              <button type="submit" class="btn btn-primary">Save Changes</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                         </form>
                       </div>


                       <div role="tabpanel" class="tab-pane active" id="walkin2">
                          <form id="walkinForm" novalidate="novalidate" method="post" >
                              {{ csrf_field() }}
                            <input type="hidden" name="walkin_id" id="walkin_id" value="">
                            <input type="hidden" name="button_action" id="button_action" value="">
                                   <div class="row">
                                       <div class="form-group col-md-6">
                                            <label class="col-form-label" for="firstname">Blood Pressure</label>
                                            <input type="number" class="form-control" id="bp" value="" name="bp" placeholder="Blood Pressure" required>
                                       </div>
                                       <div class="form-group col-md-6">
                                       <label class="col-form-label" for="bdate"></label>
                                       <label class="col-form-label" for="firstname">Blood Sugar</label>
                                       <input type="number" class="form-control" id="bs" value="" name="bs" placeholder="Blood Sugar" required>
                                      
                                      </div>
                                
                                       </div>
                                       <div class="row">
                                      <div class="form-group col-md-6">
                                          <label class="col-form-label" for="email">Consultation</label>
                                          <input type="text" class="form-control" id="consultation" value="" name="consultation" placeholder="Consultation" required="required">
                                     </div>
                                     <div class="form-group col-md-6">
                                         <label class="col-form-label" for="email">Findings</label>
                                         <input type="text" class="form-control" id="findings" value="" name="findings" placeholder="Findings" required="required">
                                    </div>

                                   </div>
                                   <div class="form-group">
                                      <label class="col-form-label" for="email">Notes</label>
                                      <textarea type="text" class="form-control" id="notes" value="" name="notes" placeholder="Notes" required="required"></textarea>
                                  </div>
                                   <h3><i class="icon-note"></i> Medicine</h3>
                                  <hr>
                                      <div class="row">
                                           <div class="form-group col col-md-6">
                                              <label class="col-form-label" for="email">Medicine</label>
                                             <select class="form-control" name="med" id="med">
                                                <option value="Ascorbic Acid">Ascorbic Acid</option>
                                                <option value="Mefenamic">Mefenamic</option>
                                                 <option value="Paracetamol">Paracetamol</option>
                                             </select>
                                           </div>
                                           <div class="form-group col col-md-6">
                                                   <label class="col-form-label" for="email">Quantity</label>
                                                   <input type="number" class="form-control" id="quantity" value="" name="quantity" placeholder="Quantity" required="required">
                                           </div>
                                      </div>
                        <div class="form-group pull-right">
                             <button type="submit" class="btn btn-primary">Save Changes</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                     </div>
                  </div>
                  </div>
                  </div>
                    </div>
                </div>
            </div>



<!-- end modals -->

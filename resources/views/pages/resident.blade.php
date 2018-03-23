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

$('#bday').datetimepicker({
    format: 'YYYY-MM-DD'
});

$('#birthdate').datetimepicker({
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
                  $('#firstname_update').val(data.firstName);
                  $('a#profile').text(data.firstName+"'s Profile");
                  $('#midname_update').val(data.midName);
                  $('#lastname_update').val(data.lastName);
                  $('#bday_update').val(data.dob);
                  $('#address_update').val(data.address);
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
           swal( "Success!", "You updated a resident!", "success", "Ok")
                      .then((value) => {
                    $("#addModal").trigger('reset');
                          refresh_resident_table();
                      });    
                      }else{
                         swal( "Error!", "Fill Up Every Field!", "warning", "Ok")
                      }   
      },

      error: function(err) {
             swal( "Error!", "Fill Up Very Field!", "warning", "Ok");
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
              <a class="nav-link active" data-toggle="tab" href="#list" role="tab" aria-controls="list">List of Residents</a>
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
                        <a class="nav-link active" id="profile" data-toggle="tab" href="#walkIn" role="tab" aria-controls="walkIn">Walk-In</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#mch" role="tab" aria-controls="mch">MCH</a>
                      </li>
                    </ul>


                    <!-- Tab panes -->
                    <div class="tab-content">
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


                                                      <div class="form-group">
                                                          <label class="col-form-label" for="email">Full Address</label>
                                                            <input type="text" class="form-control" id="address_update" value="" name="address" placeholder="Address" required="required">
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
                        <div role="tabpanel" class="tab-pane" id="mch">janrey pogi janrey pogi janrey pogi</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<!-- end modals -->

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
$(function () {
  $('#datetimepicker1').datetimepicker({ dateFormat: 'yyyy-mm-dd' });
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
      {data: 'address'},
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
                            $('#firstname').val(data.firstName);
                            $('a#profile').text(data.firstName+"'s Profile");
                            $('#midname').val(data.midName);
                            $('#lastname').val(data.lastName);
                            $('#bday').val(data.dob);
                            $('#address').val(data.address);
                            $("#civStatus").val(data.civilStatus);
                            $("#gender").val(data.gender);
                            $("#height").val(data.height);
                            $("#weight").val(data.weight);
                            $("#btype").val(data.bloodtype);
                            $("#contact").val(data.contactnumber);
                            $("#email").val(data.email);
                            console.log(data.firstName);
                            $('#addModal').modal('show');
                            refresh_resident_table();
                        }
                    })
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
                        <input type="text" class="form-control" name="middle_name" placeholder="Enter middle name">
                      </div>
                      <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter last name">
                      </div>
                      <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select name="gender" class="form-control">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="height">Height (inches):</label>
                        <input type="text" class="form-control" name="height" placeholder="Enter height">
                      </div>
                      <div class="form-group">
                        <label for="weight">Weight (pounds)</label>
                        <input type="text" class="form-control" name="weight" placeholder="Enter weight">
                      </div>
                      <div class="form-group">
                        <label for="blood_type">Blood Type</label>
                        <input type="text" class="form-control" name="blood_type" placeholder="Enter blood type">
                      </div>
                      <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input type="text" class="form-control" name="birthdate" placeholder="MM/DD/YYYY" data-provide="datepicker" >
                      </div>
                      <div class="form-group">
                        <label for="marital_status">Marital Status:</label>
                        <select name="marital_status" class="form-control">
                          <option>Single</option>
                          <option>Married</option>
                          <option>Widowed</option>
                          <option>Separated</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address">
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
                        <input type="text" class="form-control" name="emergency_name" placeholder="Enter name">
                      </div>
                      <div class="form-group">
                        <label for="emergency_contact">Contact</label>
                        <input type="text" class="form-control" name="emergency_contact" placeholder="Enter contact number">
                      </div>
                      <div class="form-group">
                        <label for="emergency_relationship">Relationship</label>
                        <input type="text" class="form-control" name="emergency_relationship" placeholder="Enter relationship">
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
                          <input type="text" class="form-control" name="purok" placeholder="Enter city">
                        </div>
                        <div class="form-group col-sm-8">
                          <label for="street">Street</label>
                          <input type="text" class="form-control" name="street" placeholder="Enter Street">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-4">
                          <label for="barangay">Barangay</label>
                          <input type="text" class="form-control" name="barangay" placeholder="Enter barangay">
                        </div>
                        <div class="form-group col-sm-8">
                          <label for="city">City</label>
                          <input type="text" class="form-control" id="city" placeholder="Enter city">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
                          <form id="EditForm" novalidate="novalidate" >
                            <input type="hidden" name="id" id="id" value="">
                            <input type="hidden" name="button_action" id="button_action" value="">
                            <div class="row">
                              <div class="form-group col-md-4">
                                <label class="col-form-label" for="firstname">First name</label>
                                  <input type="text" class="form-control" id="firstname" name="firstname"  placeholder="First name" value="">
                              </div>

                                    <div class="form-group  col-md-4">
                                        <label class="col-form-label" for="midname">Middle Name</label>
                                          <input type="text" class="form-control" id="midname" name="midname" placeholder="Middle Name" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label class="col-form-label" for="lastname">Last name</label>
                                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required>
                                    </div>
                                  </div>
                                  <div class="row">


                                    <div class="form-group col-md-2">
                                      <label class="col-form-label" for="gender">Gender</label>
                                      <br>
                                      <select class="form-control" name="gender" id="gender">

                                        <option value="male">Male</option>
                                        <option value="female">Female</option>


                                      </select>
                                     </div>
                                     <div class="form-group col-md-4">
                                       <label class="col-form-label" for="bdate">Birthdate</label>
                                       <div class="input-group date" data-provide="datepicker">
                                         <input type="text" id="bday" name="bday" value="" class="form-control">
                                         <div class="input-group-addon">
                                           <span class="glyphicon glyphicon-th"></span>
                                         </div>
                                       </div>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label class="col-form-label" for="civStatus">Marital Status</label>
                                        <br>
                                        <select class="form-control" name="civStatus" id="civStatus">

                                          <option value="Single">Single</option>
                                          <option value="Married">Married</option>
                                          <option value="Widowed">Widowed</option>


                                        </select>
                                       </div>
                                  </div>

                                     <div class="row">
                                       <div class="form-group col-md-4">
                                         <label class="col-form-label" for="firstname">Height(inches)</label>
                                           <input type="text" class="form-control" id="height" value="" name="height" placeholder="Height" required>
                                       </div>

                                             <div class="form-group  col-md-4">
                                                 <label class="col-form-label" for="midname">Weight(pounds)</label>
                                                   <input type="text" class="form-control" id="weight" value="" name="weight" placeholder="Weight" required>
                                             </div>
                                             <div class="form-group  col-md-4">
                                                 <label class="col-form-label" for="midname">Blood Type</label>
                                                   <input type="text" class="form-control" id="btype" value="" name="btype" placeholder="Blood Type" required>
                                             </div>
                                           </div>


                                                      <div class="form-group">
                                                          <label class="col-form-label" for="email">Full Address</label>
                                                            <input type="text" class="form-control" id="address" value="" name="address" placeholder="Address" required>
                                                      </div>
                                                              <div class="row">
                                                                <div class="form-group col-md-6">
                                                                  <label class="col-form-label" for="password">Contact Number</label>
                                                                    <input type="text" class="form-control" value="" id="contact" name="contact" placeholder="Contact Number" required>
                                                                </div>
                                                                      <div class="form-group col-md-6">
                                                                        <label class="col-form-label" for="email">Email Address</label>
                                                                          <input type="text" class="form-control" value="" id="email" name="email" placeholder="Email Address" required >
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

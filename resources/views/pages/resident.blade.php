<script>
  $('.breadcrumb').html('<li class="breadcrumb-item active">Resident</li>');
  
  $('#residents-dt').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "/resident_profile",    
    "columns": [
      {data: 'first_name' },
      {data: 'middle_name' },
      {data: 'last_name' },
      {data: 'gender'},
      {data: 'address'},
      {
        data: 'id',
        render: function ( data, type, row, meta ) {
          return '<div class="btn-group"><button data-target="#viewProfile" data-toggle="modal" data-id="'+data+'" data-backdrop="static" type="submit" data-tooltip="tooltip" data-trigger="hover" title="Options" class="btn btn-info fa fa-cog">Options</button>';
        }
      }
    ]
  });

  $('#viewProfile').on('shown.bs.modal', function(e) {
    $("#addDetails input[name='userid']").val();
  });

  $("#addDetails").submit(function(e){
    e.preventDefault();        

    $.ajax({
      type: 'post',
      url: '/addDetails',
        beforeSend: function (xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');
          if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
      },
      data: $(this).serialize(),
      dataType: 'json',
      success: function(data) {            
        if(data.success){
          pnotify(data.message, true);
          
          $('#change-password').modal('hide');
        } else {
          pnotify(data.message, false);

          if(!$('#changePasswordForm [type="submit"] i').hasClass('hidden')) {
            $('#changePasswordForm [type="submit"] i').addClass('hidden');
          }
        }

        if(!$('#changePasswordForm [type="submit"] i').hasClass('hidden')) {
          $('#changePasswordForm [type="submit"] i').addClass('hidden');
        }
      },
      error: function(error) {                
        pnotify('Incorrect Current Password .', false);

        if(!$('#changePasswordForm [type="submit"] i').hasClass('hidden')) {
          $('#changePasswordForm [type="submit"] i').addClass('hidden');
        }
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
          <div class="card-actions">
            <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></button>
          </div>
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
                        <input type="text" class="form-control" name="first_name" placeholder="Enter first name">
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="viewProfile" aria-hidden="true" id="viewProfile">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modal-lg">
      <form id="addDetails" method="post">
        {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" 
          class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="_method" value="put">
          <input type="hidden" name="userid">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="rpassword" name="password" class="form-control" required>
            @if ($errors->has('password'))
            <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div> 
          <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" id="c-password" name="password_confirmation" class="form-control" required>
            @if ($errors->has('password_confirmation'))
            <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" value="submit" class="btn btn-warning">
          <i class="fa fa-fw fa-spinner fa-spin hidden"></i> Confirm
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end modals -->
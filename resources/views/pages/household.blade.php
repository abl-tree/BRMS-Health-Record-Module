@if(App::isLocal())
  <!-- CoreUI main scripts -->
	<script src="{{ asset('/assets/js/views/tooltips.js') }}"></script>
@elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
  <!-- CoreUI main scripts -->
	<script src="{{ asset('/assets/js/views/tooltips.js') }}"></script>
@else
  <!-- CoreUI main scripts -->
	<script src="{{ asset('/assets/js/views/tooltips.js') }}"></script>
@endif

<script>
  $('.breadcrumb').html('<li class="breadcrumb-item active">Household</li>');

  // Toolbar extra buttons
  var btnFinish = $('<button></button>').text('Finish')
                                    .addClass('btn btn-success sw-finish-btn')
                                    .attr('disabled', true)
                                    .on('click', function(){ alert('Finish Clicked'); });
  var btnCancel = $('<button></button>').text('Cancel')
                                    .addClass('btn btn-danger sw-reset-btn')
                                    .on('click', function(){ $('#smartwizard').smartWizard("reset"); });
  
  $('#smartwizard').smartWizard({
    theme: 'circles',
    transitionEffect:'fade',
    showStepURLhash: false,
    autoAdjustHeight: true,
    toolbarSettings: {
      toolbarPosition: 'both',
      toolbarButtonPosition: 'end',
      toolbarExtraButtons: [btnFinish, btnCancel]
    }
  });

  $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
    if(stepPosition === "final") {
      $('.sw-finish-btn').removeAttr('disabled');
    } else {
      $('.sw-finish-btn').attr('disabled', true);
    }
  });
  
  $('#household').DataTable({
    // "processing": true,
    "serverSide": true,
    "ajax": "{{ route('member_queue', 'member') }}",
    "columns": [
      {data: 'last_name' },
      {data: 'first_name' },
      {data: 'middle_name' },
      {data: 'relationship' },
      {
        data: 'id',
        render: function( data, type, row, meta ){
          return '<a href="'+data+'">Download</a>';
        }
      },
      // {data: 'age' },
      // {data: 'birth_place' },
      // {data: 'sex' },
      // {data: 'civil_status' },
      // {data: 'educ_attainment' },
      // {data: 'occupation' },
    ]
  });

  $('.add-household-member').submit(function(e) {
    e.preventDefault();

    $.ajax({
      method: 'POST',
      url: "{{ route('household_member', 'add') }}",
      data: $(this).serialize(),
      dataType: 'json',
      success: function(data) {
        console.log(data);
      }
    });
  });

</script>
<div class="animated fadeIn">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Household Profile
        </div>
        <div class="card-body">
          <div id="smartwizard">
            <ul>
              <li><a href="#step-1">Step 1<br /><small>Basic Information</small></a></li>
              <li><a href="#step-2">Step 2<br /><small>Household Members</small></a></li>
              <li><a href="#step-3">Step 3<br /><small>Sanitation</small></a></li>
              <li><a href="#step-4">Step 4<br /><small>Review</small></a></li>
            </ul>
        
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div id="step-1" class="card border-info">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                      <label for="district">Municipality/City/District</label>
                      <input type="text" class="form-control" name="district" placeholder="Enter municapilty/city/district">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                      <label for="province">Province/City</label>
                      <input type="text" class="form-control" name="province" placeholder="Enter province/city">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="barangay">Barangay</label>
                        <input type="text" class="form-control" name="barangay" placeholder="Enter barangay">
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="brgy_chairman">Barangay Chairman</label>
                        <input type="text" class="form-control" name="brgy_chairman" placeholder="Enter brgy. chairman">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="committee">Committee on Health</label>
                        <input type="text" class="form-control" name="committee" placeholder="Enter committee on health">
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="midwife_assign">Midwife/NDP Assigned</label>
                        <input type="text" class="form-control" name="midwife_assign" placeholder="Enter Midwife/NDP assigned">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="purok">Purok</label>
                        <input type="text" class="form-control" name="purok" placeholder="Enter purok">
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="date_profiled">Date Profiled</label>
                        <input type="text" class="form-control" name="date_profiled" placeholder="Enter date profiled">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="interviewer">Profiled/Interviewed By</label>
                    <input type="text" class="form-control" name="interviewer" placeholder="Enter interviewer or profiler">
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="tribe">Tribe</label>
                        <input type="text" class="form-control" name="tribe" placeholder="Enter tribe">
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="philhealth_no">Philhealth No</label>
                        <input type="text" class="form-control" name="philhealth_no" placeholder="Enter philhealth number">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="emergency_relationship">NHTS: </label>                        
                        <div class="form-check form-check-inline mr-1">
                          <input class="form-check-input" id="nhts-radio1" value="1" name="nhts_opt" type="radio">
                          <label class="form-check-label" for="nhts-radio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mr-1">
                          <input class="form-check-input" id="nhts-radio2" value="0" name="nhts_opt" type="radio">
                          <label class="form-check-label" for="nhts-radio2">No</label>
                        </div>                  
                      </div>
                      <div class="form-group">
                        <label for="emergency_relationship">NON NHTS: </label>
                        <div class="form-check form-check-inline mr-1">
                          <input class="form-check-input" id="non-nhts-radio1" value="1" name="non_nhts_opt" type="radio">
                          <label class="form-check-label" for="non-nhts-radio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mr-1">
                          <input class="form-check-input" id="non-nhts-radio2" value="0" name="non_nhts_opt" type="radio">
                          <label class="form-check-label" for="non-nhts-radio2">No</label>
                        </div>                      
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="nhts_no">NHTS ID No</label>
                        <input type="text" class="form-control" name="nhts_no" placeholder="Enter NHTS ID number">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="emergency_relationship">IP's: </label>
                        <div class="form-check form-check-inline mr-1">
                          <input class="form-check-input" id="ip-radio1" value="1" name="ip_opt" type="radio">
                          <label class="form-check-label" for="ip-radio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mr-1">
                          <input class="form-check-input" id="ip-radio2" value="0" name="ip_opt" type="radio">
                          <label class="form-check-label" for="ip-radio2">No</label>
                        </div>                      
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="form-group">
                        <label for="ip_no">IP ID No</label>
                        <input type="text" class="form-control" name="ip_no" placeholder="Enter IP ID number">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="step-2" class="card border-info">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Household Members
                    <div class="card-actions">
                      <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-outline-secondary bg-info"><i class="icon-user-follow icons" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add household member"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <table id="household" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="text-center" style="min-width: 100px;">Last Name</th>
                          <th class="text-center" style="min-width: 100px;">First Name</th>
                          <th class="text-center" style="min-width: 100px;">Middle Name</th>
                          <th class="text-center" style="min-width: 100px;">Relationship to the Head of the Family</th>
                          <th class="text-center" style="min-width: 100px;">Actions</th>
                          <!-- <th class="text-center" style="min-width: 100px;"><small>HPN, DM, TB, CA, MI, PWD, SM, PWUD, etc.</small></th>
                          <th class="text-center" style="min-width: 100px;">Current User-FP Method</th>
                          <th class="text-center" style="min-width: 100px;">Pregnant</th>
                          <th class="text-center" style="min-width: 100px;">Nutritional Status</th>
                          <th class="text-center" style="min-width: 100px;">Height</th>
                          <th class="text-center" style="min-width: 100px;">Weight</th>
                          <th class="text-center" style="min-width: 100px;">FIC (Y/N)</th> -->
                        </tr>
                      </thead>
                      <!-- <tbody>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                          <td>sample</td>
                      </tbody> -->
                    </table>
                  </div>
                </div>
              </div>
              <div id="step-3" class="card border-info">
                <div class="card-body">
                  <div class="row">
                    Step Content
                  </div>
                </div>
              </div>
              <div id="step-4" class="card border-info">
                <div class="card-body">
                  <div class="row">
                    Step Content
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-info modal-lg" role="document">
    <div class="modal-content">
      <form action="POST" class="add-household-member">
        {{ csrf_field() }}
        <div class="modal-header">
          <h4 class="modal-title">Add Household Member</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-sm-12 col-md-4">
              <label for="member_lastname">Last Name</label>
              <input type="text" class="form-control" name="member_lastname" placeholder="Enter last name">
            </div>
            <div class="form-group col-sm-12 col-md-4">
              <label for="member_firstname">First Name</label>
              <input type="text" class="form-control" name="member_firstname" placeholder="Enter first name">
            </div>
            <div class="form-group col-sm-12 col-md-4">
              <label for="member_middlename">Middle Name</label>
              <input type="text" class="form-control" name="member_middlename" placeholder="Enter middle name">
            </div>
          </div>
          <div class="form-group">
            <label for="relationship_head">Relationship to the Head of the Family</label>
            <input type="text" class="form-control" name="relationship_head" placeholder="Enter relationship">
          </div>
          <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="text" class="form-control" name="date_of_birth" placeholder="Enter birthdate">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control" name="age" placeholder="Enter age">
          </div>
          <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" class="form-control" name="place_of_birth" placeholder="Enter place of birth">
          </div>
          <div class="form-group">
            <label for="sex">Sex</label>
            <input type="text" class="form-control" name="sex" placeholder="Enter gender">
          </div>
          <div class="form-group">
            <label for="civil_status">Civil Status</label>
            <input type="text" class="form-control" name="civil_status" placeholder="Enter civil status">
          </div>
          <div class="form-group">
            <label for="educ_attainment">Educational Attainment</label>
            <input type="text" class="form-control" name="educ_attainment" placeholder="Enter educational attainment">
          </div>
          <div class="form-group">
            <label for="occupation">Occupation</label>
            <input type="text" class="form-control" name="occupation" placeholder="Enter occupation">
          </div>
          <div class="form-group">
            <label for="philihealth_no">Philhealth ID Number</label>
            <input type="text" class="form-control" name="philihealth_no" placeholder="Enter Philhealth ID number">
          </div>
          <div class="form-group">
            <label for="expiration_date">Date of Expiration</label>
            <input type="text" class="form-control" name="expiration_date" placeholder="Enter date of expiration">
          </div>
          <div class="form-group">
            <label for="fp_method">Current User-FP Method</label>
            <input type="text" class="form-control" name="fp_method" placeholder="Enter user-fp method">
          </div>
          <div class="form-group">
            <label for="pregnant">Pregnant</label>
            <input type="text" class="form-control" name="pregnant" placeholder="Enter information">
          </div>
          <div class="form-group">
            <label for="nut_status">Nutritional Status</label>
            <input type="text" class="form-control" name="nut_status" placeholder="Enter nutritional status">
          </div>
          <div class="form-group">
            <label for="height">Height</label>
            <input type="text" class="form-control" name="height" placeholder="Enter height">
          </div>
          <div class="form-group">
            <label for="weight">Weight</label>
            <input type="text" class="form-control" name="weight" placeholder="Enter weight">
          </div>
          <div class="form-group">
            <label for="fic">FIC</label>
            <input type="text" class="form-control" name="fic" placeholder="Enter information">
          </div>
          <div class="form-group">
            <label for="training">Trained on Basic Life Support/First Aid</label>
            <input type="text" class="form-control" name="training" placeholder="Enter training">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Save changes</button>
        </div>
      </form>
    </div>
  </div>	
</div> 
<!-- end modals -->
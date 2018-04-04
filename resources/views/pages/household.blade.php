<div class="animated fadeIn">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> Household Profile
        </div>
        <form class="household-form" method="POST">
        <div class="card-body">
          <div id="smartwizard">
            <ul>
              <li><a href="#step-1">Step 1<br /><small>Basic Information</small></a></li>
              <li><a href="#step-2">Step 2<br /><small>Household Members</small></a></li>
              <li><a href="#step-3">Step 3<br /><small>Sanitation</small></a></li>
            </ul>
        
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div id="step-1" class="card border-info">
                <div class="card-body">
                  <div id="form-step-0" role="form" data-toggle="validator">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="form-group col-sm-12 col-md-6">
                        <label for="district">Municipality/City/District</label>
                        <input type="text" class="form-control" name="district" placeholder="Enter municapilty/city/district" required>
                        <div class="help-block with-errors invalid-feedback"></div>
                      </div>
                      <div class="form-group col-sm-12 col-md-6">
                        <label for="province">Province/City</label>
                        <input type="text" class="form-control" name="province" placeholder="Enter province/city" required>
                        <div class="help-block with-errors invalid-feedback"></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label for="barangay">Barangay</label>
                          <div class="controls">
                            <div class="input-group">
                              <select class="selectpicker show-tick form-control" name="barangay" size=5 title="Barangay" required="true">
                              @if($barangays)
                                @foreach($barangays as $barangay)
                                <option value="{{$barangay->id}}">{{$barangay->brgy_name}}</option>
                                @endforeach
                              @endif
                              </select>
                            </div>
                            <div class="help-block with-errors invalid-feedback"><ul class="list-unstyled"><li>Please fill out this field.</li></ul></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label for="purok">Purok</label>
                          <div class="controls">
                            <div class="input-group">
                              <select class="selectpicker show-tick form-control" name="purok" title="Purok" disabled></select>
                            </div>
                            <div class="help-block with-errors invalid-feedback"><ul class="list-unstyled"><li>Please fill out this field.</li></ul></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label for="committee">Committee on Health</label>
                          <input type="text" class="form-control" name="committee" placeholder="Enter committee on health" required>
                          <div class="help-block with-errors invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label for="midwife_assign">Midwife/NDP Assigned</label>
                          <div class="controls">
                            <div class="input-group">
                              <select class="selectpicker show-tick form-control required" name="midwife_assign" size=5 title="Midwife/NDP assigned" data-api-url="/data/webapi/worker"></select>
                            </div> 
                            <div class="help-block with-errors invalid-feedback"><ul class="list-unstyled"><li>Please fill out this field.</li></ul></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group search">
                          <label for="brgy_chairman">Barangay Chairman</label>
                          <div class="controls">
                            <div class="input-group">
                              <select class="selectpicker show-tick form-control" name="brgy_chairman" size=5 title="Brgy. chairman" data-api-url="/data/webapi/worker"></select>
                            </div> 
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label for="date_profiled">Date Profiled <small>(YYYY/MM/DD)</small></label>
                          <input type="text" class="form-control" name="date_profiled" placeholder="YYYY/MM/DD" data-provide="datepicker" data-date-end-date="0d" required>
                          <div class="help-block with-errors invalid-feedback"></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="interviewer">Profiled/Interviewed By</label>
                      <div class="controls">
                        <div class="input-group">
                          <select class="selectpicker show-tick form-control" name="interviewer" size=5 title="Interviewer or profiler" data-api-url="/data/webapi/worker"></select>
                        </div> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                          <label for="tribe">Tribe</label>
                          <input type="text" class="form-control" name="tribe" placeholder="Enter tribe" required>
                          <div class="help-block with-errors invalid-feedback"></div>
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
                            <input class="form-check-input" id="nhts-radio1" value="1" name="nhts_opt" type="radio" checked>
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
                            <input class="form-check-input" id="non-nhts-radio1" value="1" name="non_nhts_opt" type="radio" checked>
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
                            <input class="form-check-input" id="ip-radio1" value="1" name="ip_opt" type="radio" checked>
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
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
              <div id="step-3" class="card border-info">
                <div class="card-body">
                  @if($sanitations)
                    @foreach($sanitations as $sanitation)
                    <!-- <div class="row"> -->
                      <div class="form-group row">
                          <label class="col-md-3 col-form-label">{{$sanitation->description}}</label>                            
                          <div class="col-md-9 col-form-label">
                            @foreach($sanitation->option as $option)
                              @if($sanitation->id === 3)
                              <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="sanitation{{$option->id}}" value="{{$option->id}}" name="sanitation[]" type="radio">
                                <label class="form-check-label" for="sanitation{{$option->id}}">{{$option->option}}</label>
                              </div>
                              @else
                              <div class="form-check checkbox">
                                <input class="form-check-input" id="sanitation{{$option->id}}" value="{{$option->id}}" name="sanitation[]" type="checkbox">
                                <label class="form-check-label" for="sanitation{{$option->id}}">
                                  {{$option->option}}
                                </label>
                              </div>
                              @endif
                            @endforeach
                          </div>
                      </div>
                    <!-- </div> -->
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
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
            <div class="col-sm-12 col-md-12">
              <div class="form-group">
                <label for="existing_member">Search for an existing member: </label>
                <div class="controls">
                  <div class="input-group">
                    <select class="selectpicker show-tick form-control" name="existing_member" title="Search here" data-api-url="/data/resident"></select>
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="row info_retrieve" style="display: none;">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <i class="fa fa-refresh fa-spin fa-lg mt-4"></i> Retrieving...
            </div>
          </div>
          <div class="member_profile" style="display: none;">
            <input type="hidden" class="form-control" name="member_id" required>
            <div class="row">
              <div class="form-group col-sm-12 col-md-4">
                <label for="member_lastname">Last Name</label>
                <input type="text" class="form-control" name="member_lastname" placeholder="Enter last name" required>
              </div>
              <div class="form-group col-sm-12 col-md-4">
                <label for="member_firstname">First Name</label>
                <input type="text" class="form-control" name="member_firstname" placeholder="Enter first name" required>
              </div>
              <div class="form-group col-sm-12 col-md-4">
                <label for="member_middlename">Middle Name</label>
                <input type="text" class="form-control" name="member_middlename" placeholder="Enter middle name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="relationship_head">Relationship to the Head of the Family</label>
              <input type="text" class="form-control" name="relationship_head" placeholder="Enter relationship" required>
            </div>
            <div class="form-group">
              <label for="date_of_birth">Date of Birth <small>(YYYY/MM/DD)</small></label>
              <input type="text" class="form-control" name="date_of_birth" data-provide="datepicker" data-date-end-date="0d" placeholder="Enter birthdate" required>
            </div>
            <div class="form-group">
              <label for="place_of_birth">Place of Birth</label>
              <input type="text" class="form-control" name="place_of_birth" placeholder="Enter place of birth" required>
            </div>
            <div class="form-group">
              <label for="sex">Sex</label>
              <input type="text" class="form-control" name="sex" placeholder="Enter gender" required>
            </div>
            <div class="form-group">
              <label for="civil_status">Civil Status</label>
              <input type="text" class="form-control" name="civil_status" placeholder="Enter civil status" required>
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
              <label for="health_status">Health Status</label>
              <input type="text" class="form-control" name="health_status" placeholder="Enter health status">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

<script>
  $(document).ready(function() {
    $('.breadcrumb').html('<li class="breadcrumb-item active">Household</li>');
    $.fn.datepicker.defaults.format = "yyyy/mm/dd";
    
    var householdDt = $('#household').DataTable({
      "processing": true,
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
      ]
    });

    var select_picker = $('#form-step-0 select, select[name="existing_member"]').selectpicker({
      // live search options
      liveSearch: true,
      liveSearchPlaceholder: 'Search here',
      liveSearchNormalize: false,
      liveSearchStyle: 'contains',
    });
    
    // Toolbar extra buttons                                      
    var btnCancel = $('<button></button>').text('Cancel')
                                      .addClass('btn btn-danger sw-reset-btn')
                                      .on('click', function(){ 
                                        $('#smartwizard').smartWizard("reset"); 
                                        select_picker.selectpicker('refresh');
                                        $('form.household-form')[0].reset();
                                        householdDt.ajax.reload();
                                      });

    var btnFinish = $('<button></button>').text('Finish')
                                      .addClass('btn btn-success sw-finish-btn')
                                      .attr('disabled', true)
                                      .attr('type', 'button')
                                      .on('click', function(){
                                        $.ajax({
                                          url: "{{ route('set_household', 'household') }}",
                                          method: "POST",
                                          data: $('.household-form').serialize(),
                                          dataType: 'json',
                                          success: function(result) {
                                            btnCancel.click();
                                          }
                                        })
                                      });
    
    $('#smartwizard').smartWizard({
      theme: 'circles',
      transitionEffect:'fade',
      showStepURLhash: false,
      autoAdjustHeight: false,
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

    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
        var elmForm = $("#form-step-" + stepNumber);
        // stepDirection === 'forward' :- this condition allows to do the form validation
        // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
        if(stepDirection === 'forward' && elmForm){
            elmForm.validator('validate');
            elmForm.addClass('was-validated');
            var elmErr = elmForm.find('.has-error');
            var exclude = [];

            $('#form-step-0 select').map(function(){
              if(this.value) { 
                var selector = "select[name='"+$(this).attr('name')+"']";
                exclude.push(selector);
              }
            }).get()

            $('#form-step-0 select').not(exclude.join(',')).parent().parent().siblings('.with-errors').show();
            if(!$('#form-step-0 select').not(exclude.join(',')).parent().parent().hasClass('has-error has-danger')) {
              $('#form-step-0 select').not(exclude.join(',')).parent().parent().toggleClass('has-error has-danger');
            }

            if(elmErr && elmErr.length > 0){
                // Form validation failed
                return false;
            }
        }
        return true;
    });

    $('.add-household-member').submit(function(e) {
      e.preventDefault();

      $.ajax({
        method: 'POST',
        url: "{{ route('household_member', 'add') }}",
        data: $(this).serialize(),
        dataType: 'json',
        success: function(data) {
          householdDt.ajax.reload();

          $('select[name="existing_member"]').find('option').remove().end();
          $('select[name="existing_member"]').selectpicker('refresh');
          $('select[name="existing_member"]').change();
        }
      });
    });

    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms, 5 second for example
    var $input = $('#myInput');

    select_picker.on('change', function(e) {
      $(this).parent().parent().siblings('.with-errors').hide();

      if($(this).parent().parent().hasClass('has-error')) {
        $(this).parent().parent().toggleClass('has-error has-danger');
      }
    });

    $('select[name="barangay"]').on('change', function(){
      var selected = $(this).find("option:selected").val();

      if(selected) {
        $.get('/data/webapi/purok/' + selected, 'json', function(data) {
          $('select[name="purok"]').prop('disabled', false);
          $('select[name="purok"]').find('option').remove().end();
          $('select[name="purok"]').selectpicker('refresh');

          $.each(data.data, function(key, value) {
            $('select[name="purok"]').append('<option value="'+value.id+'"> Purok '+value.name+'</option>');
            $('select[name="purok"]').selectpicker('refresh');
          });
          
        });
      }
    });

    $('select[name="existing_member"]').on('change', function(){
      var selected = $(this).find("option:selected").val();

      if(selected) {
        $.ajax({
          url: $(this).data('api-url'),
          data: {id: selected},
          method: 'GET',
          dataType: 'json',
          beforeSend: function() {
            if(!$('.member_profile').is(':hidden')) {
              $('.member_profile').slideUp();
              $('.add-household-member')[0].reset();
            }

            if($('.info_retrieve').is(':hidden')) {
              $('.info_retrieve').show();
            }
          },
          success: function(result) {
            var data = result.data[0];
            if($('.member_profile').is(':hidden')) {
              $('form.add-household-member input[name="member_id"]').val(data.id);
              $('form.add-household-member input[name="member_lastname"]').val(data.lastName);
              $('form.add-household-member input[name="member_firstname"]').val(data.firstName);
              $('form.add-household-member input[name="member_middlename"]').val(data.midName);
              $('form.add-household-member input[name="date_of_birth"]').val(data.dob);
              $('form.add-household-member input[name="place_of_birth"]').val(data.placeOfBirth);
              $('form.add-household-member input[name="sex"]').val(data.gender);
              $('form.add-household-member input[name="civil_status"]').val(data.civilStatus);
              $('form.add-household-member input[name="educ_attainment"]').val(data.highestEducationAttainment);
              $('form.add-household-member input[name="occupation"]').val(data.occupationPriorToCBRAP);
              
              $('.member_profile').slideDown();
            }
            
            if(!$('.info_retrieve').is(':hidden')) {
              $('.info_retrieve').hide();
            }
          },
          error: function(error) {
            if(!$('.info_retrieve').is(':hidden')) {
              $('.info_retrieve').hide();
            }
            
            if(!$('.member_profile').is(':hidden')) {
              $('.member_profile').slideUp();
              $('.add-household-member')[0].reset();
            }
          }
        })
      } else {
        if(!$('.member_profile').is(':hidden')) {
          $('.member_profile').slideUp();
          $('.add-household-member')[0].reset();
        }
      }
    });

    select_picker.selectpicker().not('select[name="purok"], select[name="barangay"]').siblings('div.dropdown-menu.open').find('input').on('keyup keydown input', function(e) {
      var elem = $(this);
      
      // get keycode of current keypress event
      var code = (e.keyCode || e.which);

      // do nothing if it's an arrow key
      if(code == 37 || code == 38 || code == 39 || code == 40) {
          return;
      }
      
      if(e.type === 'keyup') {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(function() {
            doneTyping(elem.val(), elem);
          }, 
          doneTypingInterval);
      } else if(e.type === 'keydown') {        
        if(!$('.member_profile').is(':hidden')) {
          $('.member_profile').slideUp();
        }

        clearTimeout(typingTimer);
      } else if(e.type === 'input') {
        elem.parent().siblings('div.dropdown-menu.inner').html('<li class="no-results text-center"> Searching <i class="fa fa-spinner fa-spin"></i></li>');
      }
    });

    function doneTyping(value, element) {
      var sp = element.parent().parent().siblings('select');
      var url = sp.data('api-url');

      if(!value) {
        sp.find('option').remove().end();
        sp.selectpicker('refresh');

        return;
      }

      $.ajax({
        url: url,
        async: true,
        data: {q: value},
        dataType: 'json',
        beforeSend: function() {
          sp.find('option').remove().end();      
        },
        success: function(data) {
          var option = "";
          var token = value;
          $.each(data.data, function(key, value) {     
            option += '<option value="'+value.id+'" data-tokens="'+token+'">'+value.name+'</option>';
          });

          sp.html(option);

          sp.selectpicker('refresh');
        }
      });
    }
  });
</script>

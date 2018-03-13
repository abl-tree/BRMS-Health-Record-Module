<script>
$(document).ready(function(){

  $('#residents-dt').DataTable({
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
         data: 'id',
              render: function ( data, type, row, meta ) {
          return '<div class="btn-group"><button data-target="#viewProfile" data-toggle="modal" data-id="'+data+'" data-backdrop="static" type="submit" data-tooltip="tooltip" data-trigger="hover" title="Options" class="btn btn-info fa fa-cog">Options</button>';
          }
            }
    ]
    $('#viewProfile').on('shown.bs.modal', function(e) {
      $("#addDetails input[name='userid']").val();
    });
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
    })
     

})
  
</script>
<div class="animated fadeIn">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> List of Residents
          <div class="card-actions">
            <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></button>
          </div>
        </div>
        <div class="card-body">
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
            <div class="modal-body modal-lg">
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
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="userid">
                <div class="modal-body">
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
</div>
<!-- end modals -->
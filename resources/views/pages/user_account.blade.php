<script>
  $('#user-account-dt').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "/test",    
    "columns": [
      {data: 'id'},
      {data: 'fullname'},
      {data: 'username'},
      {data: 'role'},
      {data: 'created_at'},
    ]
  });
</script>

<div class="animated fadeIn">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> List of Users
          <div class="card-actions">
            <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></button>
          </div>
        </div>
        <div class="card-body">
          <table id="user-account-dt" class="table table-hover table-bordered" cellspacing="0" width="100%">
            <thead class="thead-dark">
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Full Name</th>
                <th class="text-center">Username</th>
                <th class="text-center">Role</th>
                <th class="text-center">Joined</th>
              </tr>
            </thead>
            <tfoot class="thead-dark">
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Full Name</th>
                <th class="text-center">Username</th>
                <th class="text-center">Role</th>
                <th class="text-center">Joined</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>

<!-- modals -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info">Save changes</button>
      </div>
    </div>
  </div>	
</div> 
<!-- end modals -->
<script>
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
    ]
  });
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
          <table id="residents-dt" class="table table-hover table-bordered" cellspacing="0" width="100%">
            <thead class="thead-dark">
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Firstname</th>
                <th class="text-center">Middlename</th>
                <th class="text-center">Lastname</th>
                <th class="text-center">Gender</th>
                <th class="text-center">Address</th>
              </tr>
            </thead>
            <tfoot class="thead-dark">
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Firstname</th>
                <th class="text-center">Middlename</th>
                <th class="text-center">Lastname</th>
                <th class="text-center">Gender</th>
                <th class="text-center">Address</th>
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
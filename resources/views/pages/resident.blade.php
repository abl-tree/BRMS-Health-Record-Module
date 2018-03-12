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
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages">Messages</a>
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
                  </tr>
                </thead>           
              </table>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
              <div class="form-group">
                <label for="company">Company</label>
                <input type="text" class="form-control" id="company" placeholder="Enter your company name">
              </div>

              <div class="form-group">
                <label for="vat">VAT</label>
                <input type="text" class="form-control" id="vat" placeholder="PL1234567890">
              </div>

              <div class="form-group">
                <label for="street">Street</label>
                <input type="text" class="form-control" id="street" placeholder="Enter street name">
              </div>

              <div class="row">

                <div class="form-group col-sm-8">
                  <label for="city">City</label>
                  <input type="text" class="form-control" id="city" placeholder="Enter your city">
                </div>

                <div class="form-group col-sm-4">
                  <label for="postal-code">Postal Code</label>
                  <input type="text" class="form-control" id="postal-code" placeholder="Postal Code">
                </div>

              </div>
              <!--/.row-->

              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" placeholder="Country name">
              </div>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
              3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
              dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
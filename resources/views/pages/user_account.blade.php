<script>
  $('#user-account-dt').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "/test",    
    "columns": [
      {data: 'id', name: 'id'},
      {data: 'fullname', name: 'fullname'},
      {data: 'username', name: 'username'},
      {data: 'role', name: 'role'},
      {data: 'created_at', name: 'created_at'},
    ]
  });
</script>

<div class="animated fadeIn">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
          <table class="table table-responsive-sm table-hover table-outline mb-0" id="user-account-dt" style="width:100%">
            <thead class="thead-light">
              <tr>
                <th>ID</th>
                <th class="text-center">Full Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Joined</th>
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
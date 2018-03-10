
<script>
  var requireJS = [];
  //loadJS(requireJS, "{{ asset('/assets/js/views/main.js') }}");
  //loadJS(requireJS, "{{ asset('/js/app.js') }}");
</script>

<div class="animated fadeIn">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> List of Person as of {{ date('m-d-Y ') }}
		  <div class="card-actions">
          <button type="button" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></button>
        </div>
        </div>
		 
        <div class="card-body">
		 <table class="table table-striped table-responsive-xl table-bordered datatable dataTable no-footer" id="DataTables_Table_0">
            <thead>
              <tr  class="table-primary">
                <th >User ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Address</th>
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

<script>
 var persontable = $('#DataTables_Table_0').DataTable({
				responsive: true,
                  processing: true,
                  serverSide: true,
                  ajax: "{{ route('refresh_person') }}",
                  columns: [
                  {data: 'userId', name: 'userId'},
                  {data: 'firstName', name: 'firstName'},
                  {data: 'gender', name: 'gender'},
                  {data: 'address', name: 'address'},
				  
				  
				  
                 
                  ]
              });
</script>
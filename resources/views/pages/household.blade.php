
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
          <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-outline-secondary"><i class="fa fa-edit"></i></button>
        </div>
        </div>
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
        <div class="card-body">
		 <table class="table table-striped table-responsive-sm table-bordered datatable dataTable no-footer" id="DataTables_Table_0" style="width:100%">
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
				   {data:'firstName',
			name:'firstname',
			render:function(data, type, full, meta){
			return full.lastName +", "+ full.firstName +" "+ full.midName;
				}
				 },
                  {data: 'gender', name: 'gender'},
                  {data: 'address', name: 'address'},
				  
				  
				  
                 
                  ]
              });
</script>
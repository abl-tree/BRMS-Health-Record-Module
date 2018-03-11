<script>
  $('#mch-dt').DataTable({
      responsive: true
  });

  $('#pp-dt').DataTable({
      responsive: true
  });

  $('#epi-dt').DataTable({
      responsive: true
  });
</script>
<div class="animated fadeIn">
  <div class="row">
    <div class="col-lg-12">
      <div class="card border-primary">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> List of Residents
        </div>
        <div class="card-body">
          <table id="mch-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center" rowspan="2">ID</th>
                <th class="text-center" rowspan="2">MCH</th>
                <th class="text-center" rowspan="2">Name</th>
                <th class="text-center" rowspan="2">Age</th>
                <th class="text-center" rowspan="2">G</th>
                <th class="text-center" rowspan="2">P</th>
                <th class="text-center" rowspan="2">LMP</th>
                <th class="text-center" rowspan="2">EDC</th>
                <th class="text-center" rowspan="2">R CODE #</th>
                <th class="text-center" rowspan="1" colspan="3">NORMAL</th>
                <th class="text-center" rowspan="1" colspan="3">RMK</th>
                <th class="text-center" rowspan="2">REMARKS</th>
              </tr>
              <tr>
                <th class="text-center">1-3</th>
                <th class="text-center">4-6</th>
                <th class="text-center">7-9</th>
                <th class="text-center">1-3</th>
                <th class="text-center">4-6</th>
                <th class="text-center">7-9</th>
              </tr>
            </thead>
            <tbody>
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
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-lg-12">
      <div class="card border-primary">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> List of Residents
        </div>
        <div class="card-body">
          <table id="pp-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Age</th>
                <th class="text-center">Date of Del.</th>
                <th class="text-center">Place of Del.</th>
                <th class="text-center">Attended By</th>
                <th class="text-center">Sex</th>
                <th class="text-center">Fdg</th>
                <th class="text-center">Wt.</th>
                <th class="text-center">Vit A</th>
                <th class="text-center">Ferroa</th>
                <th class="text-center">Date of PP</th>
              </tr>
            </thead>
            <tbody>
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
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-lg-12">
      <div class="card border-primary">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> List of Residents
        </div>
        <div class="card-body">
          <table id="epi-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">NAME</th>
                <th class="text-center">AGE</th>
                <th class="text-center">Birthday Date</th>
                <th class="text-center">PARENTS</th>
                <th class="text-center">Fdg</th>
                <th class="text-center">Wt.</th>
                <th class="text-center">R CODE #</th>
                <th class="text-center">VACCINES</th>
              </tr>
            </thead>
            <tbody>
                <td>sample</td>
                <td>sample</td>
                <td>sample</td>
                <td>sample</td>
                <td>sample</td>
                <td>sample</td>
                <td>sample</td>
                <td>sample</td>
                <td>sample</td>
            </tbody>
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
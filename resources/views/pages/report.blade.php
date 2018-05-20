<script>
  $('.breadcrumb').html('<li class="breadcrumb-item">Report</li><li class="breadcrumb-item active">Monthly</li>');

  $('#mch-dt').DataTable({
      responsive: true
  });


  var test = $('#pp-dt').DataTable({
       responsive: true,
       "processing": true,
       "serverSide": true,
       "ajax": "/pp_profile",
       "columns": [
            {data: 'id'},
            {data:'firstName',
            render: function(data, type, full, meta){
                 return full.lastName +", "+ full.firstName+" "+full.midName;
            }
           },
           {data: 'age'},
           {data: 'PlaceofDelivery'},
           {data: 'attended_by'},
           {data: 'gender'},
           {data: 'fdg'},
           {data: 'weight'},
           {data: 'date_of_pp'},
           {data: 'vitamina'},
           {data: 'dod'},
           {data: 'F'},


  ]
});

  var test1 = $('#epi-dt').DataTable({
      responsive: true,
      "processing": true,
      "serverSide": true,
      "ajax": "/epi_profile",
      "columns": [
           {data: 'id'},
           {data:'firstName',
           render: function(data, type, full, meta){
                return full.lastName +", "+ full.firstName+" "+full.midName;
           }
          },
          {data: 'age'},
          {data: 'dob'},
          {data:'mother_name',
          render: function(data, type, full, meta){
               return full.mother_name +", "+ full.father_name;
          }
     },
          {data: 'fdg'},
          {data: 'weight'},
          {data: 'r_code'},
          {data: 'vaccine'},
     ]
  });

  $('#ufc-dt').DataTable({
       responsive: true,
      "processing": true,
      "serverSide": true,
      "ajax": "/ufc_profile",
      "columns": [
           {data: 'id'},
           {data:'firstName',
           render: function(data, type, full, meta){
                return full.lastName +", "+ full.firstName+" "+full.midName;
           }
          },
          {data: 'age'},
          {data: 'dob'},
          {data:'mother_name',
          render: function(data, type, full, meta){
               return full.mother_name +", "+ full.father_name;
          }
     },
          {data: 'fdg'},
          {data: 'weight'},
          {data: 'r_code'},
          {data: 'remarks'},
     ]
  });

  $('#fp-dt').DataTable({
       responsive: true,
    "processing": true,
    "serverSide": true,
    "ajax": "/fp_profile",
    "columns": [
          {data: 'id'},
          {data:'firstName',
          render: function(data, type, full, meta){
               return full.lastName +", "+ full.firstName+" "+full.midName;
          }
         },
         {data: 'age'},

         {data: 'num_child'},
         {data: 'lmp'},
         {data: 'client_type'},
         {data: 'method_accepted'},
         {data: 'remarks'},
   ]
  });

  $('#cod-dt').DataTable({
       responsive: true,
   "processing": true,
   "serverSide": true,
   "ajax": "/cdd_profile",
   "columns": [
         {data: 'id'},
         {data:'firstName',
         render: function(data, type, full, meta){
              return full.lastName +", "+ full.firstName+" "+full.midName;
         }
        },
        {data: 'age'},

        {data: 'complaints'},
        {data: 'num_OR'},
        {data: 'remarks'},

  ]
  });

  $('#cari-dt').DataTable({
       responsive: true,
 "processing": true,
 "serverSide": true,
 "ajax": "/cari_profile",
 "columns": [
       {data: 'id'},
       {data:'firstName',
       render: function(data, type, full, meta){
            return full.lastName +", "+ full.firstName+" "+full.midName;
       }
       },
       {data: 'age'},

       {data: 'complaints'},
       {data: 'HO_advice'},

]
  });

  $('#gms-dt').DataTable({
       responsive: true,
"processing": true,
"serverSide": true,
"ajax": "/gms_profile",
"columns": [
       {data: 'id'},
       {data:'firstName',
       render: function(data, type, full, meta){
            return full.lastName +", "+ full.firstName+" "+full.midName;
       }
       },
       {data: 'age'},

       {data: 'complaints'},
       {data: 'HO_advice'},

]
  });

  $('#bip-dt').DataTable({
      responsive: true
  });

  $('#tbsymp-dt').DataTable({
      responsive: true
  });

  $('#rabies-dt').DataTable({
      responsive: true
  });

  $('#sanitation-dt').DataTable({
      responsive: true
  });

  $('#mortality-dt').DataTable({
      responsive: true
  });
</script>
<div class="animated fadeIn">
  <div class="row">
    <div class="col-lg-12">
      <div class="card border-primary">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> MCH Report
        </div>
        <div class="card-body">
          <table id="mch-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center col" rowspan="2">ID</th>
                <th class="text-center col" rowspan="2">Name</th>
                <th class="text-center col" rowspan="2">Age</th>
                <th class="text-center col" rowspan="2">G</th>
                <th class="text-center col" rowspan="2">P</th>
                <th class="text-center col" rowspan="2">LMP</th>
                <th class="text-center col" rowspan="2">EDC</th>
                <th class="text-center col" rowspan="2">R CODE #</th>
                <th class="text-center col" rowspan="1" colspan="3">NORMAL</th>
                <th class="text-center col" rowspan="1" colspan="3">RMK</th>
                <th class="text-center col" rowspan="2">REMARKS</th>
              </tr>
              <tr>
                <th class="text-center col">1-3</th>
                <th class="text-center col">4-6</th>
                <th class="text-center col">7-9</th>
                <th class="text-center col">1-3</th>
                <th class="text-center col">4-6</th>
                <th class="text-center col">7-9</th>
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
          <i class="fa fa-align-justify"></i> PP Report
        </div>
        <div class="card-body">
          <table id="pp-dt" class="table table-hover table-bordered table-responsive-sm datatable dataTable no-footer" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center col" width="10%">ID</th>
                <th class="text-center col" width="40%">Name</th>
                <th class="text-center col" width="10%">Age</th>
                <th class="text-center col" width="20%">Date of Del.</th>
                <th class="text-center col" width="30%">Place of Del.</th>
                <th class="text-center col" width="30%">Attended By</th>
                <th class="text-center col" width="10%">Sex</th>
                <th class="text-center col" width="10%">Fdg</th>
                <th class="text-center col" width="10%">Wt.</th>
                <th class="text-center col" width="120%">Vit A</th>
                <th class="text-center col" width="10%">Ferroa</th>
                <th class="text-center col">Date of PP</th>
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
          <i class="fa fa-align-justify"></i> EPI Report
        </div>
        <div class="card-body">
          <table id="epi-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center col" width="10%">ID</th>
                <th class="text-center col" width="40%">NAME</th>
                <th class="text-center col" width="10%">AGE</th>
                <th class="text-center col" width="20%">Birthday Date</th>
                <th class="text-center col" width="40%">PARENTS</th>
                <th class="text-center col" width="10%">Fdg</th>
                <th class="text-center col"width="10%">Wt.</th>
                <th class="text-center col" width="10%">R CODE #</th>
                <th class="text-center col" width="20%">VACCINES</th>
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
  <div class="row">
    <div class="col-lg-12">
      <div class="card border-primary">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> UFC Report
        </div>
        <div class="card-body">
          <table id="ufc-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center col" width="10%">ID</th>
                <th class="text-center col" width="40%">NAME</th>
                <th class="text-center col" width="10%">AGE</th>
                <th class="text-center col" width="20%">Birthday Date</th>
                <th class="text-center col" width="40%">PARENTS</th>
                <th class="text-center col" width="10%">Fdg</th>
                <th class="text-center col" width="10%">Wt.</th>
                <th class="text-center col" width="10%">R CODE #</th>
                <th class="text-center col" width="30%">REMARKS</th>
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
  <div class="row">
    <div class="col-lg-12">
      <div class="card border-primary">
        <div class="card-header">
          <i class="fa fa-align-justify"></i> FP Report
        </div>
        <div class="card-body">
          <table id="fp-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center col" width="10%">ID</th>
                <th class="text-center col"  width="30%">NAME</th>
                <th class="text-center col" width="10%">AGE</th>
                <th class="text-center col" width="10%">Number of Child</th>
                <th class="text-center col" width="20%">LMP</th>
                <th class="text-center col" width="10%" >TYPE OF CLIENT</th>
                <th class="text-center col" width="20%">Method Accepted</th>
                <th class="text-center col" width="30%">REMARKS</th>
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
          <i class="fa fa-align-justify"></i> COD Report
        </div>
        <div class="card-body">
          <table id="cod-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center col" width="10%">ID</th>
                <th class="text-center col" width="30%">NAME</th>
                <th class="text-center col" width="10%">AGE</th>
                <th class="text-center col" width="30%">COMPLAINTS</th>
                <th class="text-center col" width="10%">Number of Or's Given</th>
                <th class="text-center col" width="40%">REMARKS</th>
              </tr>
            </thead>
            <tbody>
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
          <i class="fa fa-align-justify"></i> CARI Report
        </div>
        <div class="card-body">
          <table id="cari-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center col" width="10%">ID</th>
                <th class="text-center col" width="30%">NAME</th>
                <th class="text-center col" width="10%">AGE</th>
                <th class="text-center col" width="30%">COMPLAINTS</th>
                <th class="text-center col" width="30%">HOME CARE ADVICE</th>
              </tr>
            </thead>
            <tbody>
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
          <i class="fa fa-align-justify"></i> GMS Report
        </div>
        <div class="card-body">
          <table id="gms-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                  <th class="text-center col" width="10%">ID</th>
                  <th class="text-center col" width="30%">NAME</th>
                  <th class="text-center col" width="10%">AGE</th>
                  <th class="text-center col" width="30%">COMPLAINTS</th>
                  <th class="text-center col" width="30%">HOME CARE ADVICE</th>
              </tr>
            </thead>
            <tbody>
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
          <i class="fa fa-align-justify"></i> BIP Report
        </div>
        <div class="card-body">
          <table id="bip-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center col">ID</th>
                <th class="text-center col">NAME</th>
                <th class="text-center col">AGE</th>
                <th class="text-center col">MALE</th>
                <th class="text-center col">FEMALE</th>
                <th class="text-center col">BIP</th>
                <th class="text-center col">NEW</th>
                <th class="text-center col">OLD</th>
                <th class="text-center col">FAMILY HISTORY</th>
                <th class="text-center col">REMARKS</th>
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
          <i class="fa fa-align-justify"></i> TB SYMP Report
        </div>
        <div class="card-body">
          <table id="tbsymp-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center col">ID</th>
                <th class="text-center col">NAME</th>
                <th class="text-center col">AGE</th>
                <th class="text-center col">DATE OF X-XRAY RESULT</th>
                <th class="text-center col">DATE 1ST</th>
                <th class="text-center col">SUBMITTED 2ND</th>
                <th class="text-center col">SUBMITTED 3RD</th>
                <th class="text-center col">DATE 1ST</th>
                <th class="text-center col">SPUTUM 2ND</th>
                <th class="text-center col">RESULT 3RD</th>
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
          <i class="fa fa-align-justify"></i> RABIES Report
        </div>
        <div class="card-body">
          <table id="rabies-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center col">ID</th>
                <th class="text-center col">NAME</th>
                <th class="text-center col">AGE</th>
                <th class="text-center col">DATE</th>
                <th class="text-center col">COMPLAINTS ANIMAL BITE</th>
                <th class="text-center col">REMARKS</th>
              </tr>
            </thead>
            <tbody>
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
          <i class="fa fa-align-justify"></i> Sanitation Report
        </div>
        <div class="card-body">
          <table id="sanitation-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center col">ID</th>
                <th class="text-center col">NAME</th>
                <th class="text-center col">WITHOUT TOILET</th>
                <th class="text-center col">WITHOUT PROPER WASTE DISPOSAL</th>
                <th class="text-center col">POOR DRAINAGE</th>
                <th class="text-center col">WITHOUT SAFE WATER</th>
                <th class="text-center col">REMARKS</th>
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
          <i class="fa fa-align-justify"></i> Mortality Report
        </div>
        <div class="card-body">
          <table id="mortality-dt" class="table table-hover table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center" width="100%">ID</th>
                <th class="text-center" width="100%">NAME</th>
                <th class="text-center" width="100%">AGE</th>
                <th class="text-center" width="100%">DATE OF DEATH</th>
                <th class="text-center" width="100%">CAUSES OF DEATH</th>
              </tr>
            </thead>
            <tbody>
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

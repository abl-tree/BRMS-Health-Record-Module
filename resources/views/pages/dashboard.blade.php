<script>
  var requireJS = [];
  loadJS(requireJS, "{{ asset('/assets/js/views/main.js') }}");

</script>

<div class="animated fadeIn">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Report Summary
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6 col-lg-4">
              <div class="row">
                <div class="col-sm-6">
                  <div class="callout callout-warning">
                    <small class="text-muted">Population</small>
                    <br>
                    <strong class="h4 population-count">0</strong>
                    <div class="chart-wrapper">
                      <canvas id="sparkline-chart-3" width="100" height="30"></canvas>
                    </div>
                  </div>
                </div>
                <!--/.col-->
              </div>
              <!--/.row-->
              <hr class="mt-0">
              <ul class="horizontal-bars type-2">
                <li>
                  <i class="icon-user"></i>
                  <span class="title">Male</span>
                  <span class="value male-population-rate">0%</span>
                  <div class="bars">
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-warning male-population-rate" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </li>
                <li>
                  <i class="icon-user-female"></i>
                  <span class="title">Female</span>
                  <span class="value female-population-rate">0%</span>
                  <div class="bars">
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-warning female-population-rate" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </li>
                <li>
                  <i class="icon-user-unfollow"></i>
                  <span class="title">Undefined</span>
                  <span class="value undefined-population-rate">0%</span>
                  <div class="bars">
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-warning undefined-population-rate" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </li>
                <li class="divider"></li>
                <li class="divider text-center">
                  <button type="button" class="btn btn-sm btn-link text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="show more"><i class="icon-options"></i></button>
                </li>
              </ul>
            </div>
            <!--/.col-->
          </div>
          <!--/.row-->
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>
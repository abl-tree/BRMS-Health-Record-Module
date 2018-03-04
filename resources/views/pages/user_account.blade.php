<script>
  var requireJS = [];
  //loadJS(requireJS, "{{ asset('/assets/js/views/main.js') }}");
  //loadJS(requireJS, "{{ asset('/js/app.js') }}");
</script>

<div class="animated fadeIn">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div id="app">
            <div class="container">
                <vuetable
                    api-url="https://vuetable.ratiw.net/api/users"
                    table-wrapper="#content"
                    :fields="columns"
                    :item-actions="itemActions"
                ></vuetable>
            </div>
        </div>
      </div>
      <div class="card">
          <table class="table table-responsive-sm table-hover table-outline mb-0">
            <thead class="thead-light">
              <tr>
                <th class="text-center"><i class="icon-people"></i></th>
                <th>User</th>
                <th class="text-center">Country</th>
                <th>Activity</th>
              </tr>
            </thead>
            <tbody>
              @if($users)
                @foreach($users as $user)
                  <tr>
                    <td class="text-center">
                      <div class="avatar">
                        <img src="{{ asset('/assets/img/avatars/1.jpg') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
                        <span class="avatar-status badge-success"></span>
                      </div>
                    </td>
                    <td>
                      <div>{{ $user->profile()->first()->first_name }}</div>
                      <div class="small text-muted">
                        <span>New</span> | Registered: Jan 1, 2015
                      </div>
                    </td>
                    <td class="text-center">
                      <i class="flag-icon flag-icon-ph h4 mb-0" title="ph" id="ph"></i>
                    </td>
                    <td>
                      <div class="small text-muted">Last login</div>
                      <strong>10 sec ago</strong>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
  <!--/.row-->
</div>
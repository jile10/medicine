<nav class="side-navbar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar"><img src="/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
    <div class="title">
      <h1 class="h4">Rod Maverick Cuartero</h1>
      <p>Web Developer</p>
    </div>
  </div>
  <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
  <ul class="list-unstyled">
    <li id="dashboard"><a href="/dashboard"><i class="fa fa-home"></i>&ensp; Dashbaord </a></li>
    <li ><a id="maintenance" href="#dropdownMaintenance" aria-expanded="false" data-toggle="collapse"><i class="fa fa-cog" aria-hidden="true"></i>&ensp;Maintenance</a>
      <ul id="dropdownMaintenance" class="collapse list-unstyled ">
        <li id="item-type"><a href="/maintenance/item-type"><i class="fas fa-angle-double-right"></i>&ensp;Item Type</a></li>
        <li id="item-category"><a href="/maintenance/item-category"><i class="fas fa-angle-double-right"></i>&ensp;Item Category</a></li>
      </ul>
    </li>
    <li ><a id="transaction" href="#dropdownTransaction" aria-expanded="false" data-toggle="collapse"><i class="fas fa-exchange-alt"></i>&ensp;Transaction</a>
      <ul id="dropdownTransaction" class="collapse list-unstyled ">
        <li id="item"><a href="/items"><i class="fas fa-angle-double-right"></i>&ensp;Inventory</a></li>
      </ul>
    </li>
    <li ><a id="reports" href="#dropdownReports" aria-expanded="false" data-toggle="collapse"><i class="fas fa-chart-bar"></i>&ensp;Reports</a>
      <ul id="dropdownReports" class="collapse list-unstyled ">
        <li id="item"><a data-toggle="modal" href="#sales" data-href="#sales"><i class="fas fa-angle-double-right"></i>&ensp;Sales Report</a></li>
        <li id="item"><a href="/report/inventory" target="_blank"><i class="fas fa-angle-double-right"></i>&ensp;Inventory Report</a></li>
      </ul>
    </li>
  </ul>
</nav>

<!--Inventory Report Modal-->
<div id="sales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-md">
      <div class="modal-content">
          <form action="/report/sales" method="post" target="_blank">
              {{csrf_field()}}
            <div class="modal-header">
              <h4 id="exampleModalLabel" class="modal-title">Sales Report</h4>
              <input type="hidden" id="delete_id" name="id">
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                <label for="example-text-input" class="col-4 col-form-label">Frequency<font color="red">*</font></label>
                <div class="col-5">
                  <select name="frequency" class="form-control" onchange="changed(this)">
                    <option value="1">Monthly</option>
                    <option value="2">Yearly</option>
                  </select>
                </div>
              </div>
              <div id="frequency">
                <div class="form-group row">
                  <label for="example-text-input" class="col-2 col-form-label">Month</label>
                  <div class="col-4">
                    <select name="month" class="form-control">
                      <option value="1">January</option>
                      <option value="2">February</option>
                      <option value="3">March</option>
                      <option value="4">April</option>
                      <option value="5">May</option>
                      <option value="6">June</option>
                      <option value="7">July</option>
                      <option value="8">August</option>
                      <option value="9">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                  </div>
                  <label for="example-text-input" class="col-2 col-form-label">Year</label>
                  <div class="col-4">
                    <select name="year" class="form-control">
                      @for($x = Carbon\Carbon::now()->format('Y'); $x >= 2000; $x--)
                        <option value="{{$x}}">{{$x}}</option>
                      @endfor
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
              <button type="submit" class="btn btn-primary">Generate</button>
            </div>
          </form>
        </div>
    </div>
</div>
<script type="text/javascript">
  function changed(element){
    if(element.value == 1)
    {
      $('#frequency').empty();
      $('#frequency').append('<div class="form-group row"><label for="example-text-input" class="col-2 col-form-label">Month</label><div class="col-4"><select name="month" class="form-control"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select></div><label for="example-text-input" class="col-2 col-form-label">Year</label><div class="col-4"><select name="year" class="form-control"> @for($x = Carbon\Carbon::now()->format('Y'); $x >= 2000; $x--)<option value="{{$x}}">{{$x}}</option> @endfor</select></div></div>');
    }
    else
    {
      $('#frequency').empty();
      $('#frequency').append('<div class="form-group row"><label for="example-text-input" class="col-2 col-form-label">Year</label><div class="col-4"><select name="year" class="form-control"> @for($x = Carbon\Carbon::now()->format('Y'); $x >= 2000; $x--)<option value="{{$x}}">{{$x}}</option>@endfor</select></div></div>');
    }
  }
</script>
<div class="page-title">
  <div class="title_left">
    <h3>People</h3>
  </div>

  <div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Create Person 
          <small>This <strong>People Create</strong> feature should include student, faculty members and all employee's related to Student Management</small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form name="p.frmCreate" class="form-horizontal form-label-left" novalidate>
          <div class="form-group" ng-class="{'has-error': p.frmCreate.fname.$invalid && p.frmCreate.withError }">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="fname"  class="form-control col-md-7 col-xs-12" ng-model="p.personInfo.fname" required>
              <span class="help-block" ng-show="p.frmCreate.fname.$invalid && p.frmCreate.withError">First name is required field.</span>
            </div>
          </div>
          <div class="form-group" ng-class="{'has-error': p.frmCreate.lname.$invalid && p.frmCreate.withError }">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="lname" class="form-control col-md-7 col-xs-12" ng-model="p.personInfo.lname" required>
              <span class="help-block" ng-show="p.frmCreate.lname.$invalid && p.frmCreate.withError">Last name is required field.</span>
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="mname" class="form-control col-md-7 col-xs-12" ng-model="p.personInfo.mname">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div id="gender" class="btn-group" data-toggle="buttons">
                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="gender" value="M" ng-model="p.personInfo.gender"> &nbsp; Male &nbsp;
                </label>
                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="gender" value="F" ng-model="p.personInfo.gender"> Female
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Person Id <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="person00id" class="date-picker form-control col-md-7 col-xs-12" type="text" ng-model="p.personInfo.person00id">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="pull-right">
              <button type="reset" class="btn btn-default" ng-click="p.reset()">Reset</button>
              <button type="submit" class="btn btn-success" ng-click="p.submit(p.personInfo)" ng-disabled="p.frmCreate.$invalid && p.frmCreate.withError">Submit</button>
              <button type="button" class="btn btn-default" ng-click="p.get(p.personInfo)">Search</button>
            </div>
          </div>
        </form>
            <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
        @include('layouts.errors')
      </div>
    </div>
  </div>
</div>

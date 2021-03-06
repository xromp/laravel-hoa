<div ng-controller="CollectionViewCtrl as cv">
  <div class="alert alert-success">
    <div class="row">
      <div class="col-md-5">
        OR Date
        <div class="form-group">
          <div class="col-md-6">
            <p class="input-group">
              <input type="text" class="form-control" name="ordate" uib-datepicker-popup="MM/dd/yyyy" ng-model="cv.query.startdate" is-open="cv.dtIsOpen" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" placeholder="From" />
              <span class="input-group-btn">
                <button type="button" class="btn btn-default" ng-click="cv.datepickerOpen(cv,'DATEFROM')"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
            </p>
          </div>

          <div class="col-md-6">
            <p class="input-group">
              <input type="text" class="form-control" name="ordate" uib-datepicker-popup="MM/dd/yyyy" ng-model="cv.query.enddate" is-open="cv.dtIsOpen2" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats"/ placeholder="To">
              <span class="input-group-btn">
                <button type="button" class="btn btn-default" ng-click="cv.datepickerOpen(cv,'DATETO')"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        OR No.
        <div class="form-group">
          <div class="col-md-12">
            <input type="text" name="searchorno" class="form-control" ng-model="cv.query.orno">
          </div>
        </div>
      </div>

      <div class="col-md-3">
        Posted
        <div class="form-group">
          <div class="col-md-5">
            <input type="checkbox" name="posted" class="" ng-model="cv.query.posted" style="zoom:1.8;">
          </div>
        </div>
      </div>
      <div class="pull-right">
        <button class="btn btn-default" ng-click="cv.search(cv.query)"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="pull-right">
      <button class="btn btn-success" ng-click="cv.addCollection()">
        <i class="glyphicon glyphicon-plus"></i>
        Add New Collection
      </button>
    </div>
  </div>
  <div class="row">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>OR No.</th>
          <th>OR Date</th>
          <th>Collection Category</th>
          <th>Amount</th>
          <th>Date Encoded</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr ng-class="{'bg-success':collection.posted,'bg-danger':collection.deleted}" ng-repeat="collection in cv.collectionDetails | orderBy:'orno'">
          <td ><% $index+1 %></td>
          <td class="text-right" ng-bind="collection.orno"></td>
          <td ng-bind="collection.ordate | date:'dd-MMM-yyyy'"></td>
          <td ng-bind="collection.category_description"></td>
          <td class="text-right" ng-bind="collection.amount"></td>
          <td ng-bind="collection.created_at | date:'dd-MMM-yyyy'"></td>
          <td class="">
            <div class="pull-right">
              <button class="btn btn-success btn-xs" ng-disabled="collection.posted || collection.deleted" ng-click="cv.post(collection)"><i class="glyphicon glyphicon-ok"></i></button>
              <button class="btn btn-info btn-xs" ng-disabled="collection.posted || collection.deleted" ng-click="cv.edit(collection)"><i class="glyphicon glyphicon-pencil"></i></button>
              <button class="btn btn-danger btn-xs" ng-disabled="collection.posted || collection.deleted" ng-click="cv.remove(collection)"><i class="glyphicon glyphicon-remove"></i></button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
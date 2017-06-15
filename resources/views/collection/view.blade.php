<div ng-controller="CollectionViewCtrl as cv">
  <div class="row">
    <div class="pull-right">
      <button class="btn btn-success" ng-click="ce.addCollection()">
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
          <td ng-bind="collection.category"></td>
          <td class="text-right" ng-bind="collection.amount_paid"></td>
          <td ng-bind="collection.created_at | date:'dd-MMM-yyyy'"></td>
          <td ng-bind="collection.posted"></td>
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
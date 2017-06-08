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
        <tr ng-repeat="collection in cv.collectionDetails | orderBy:'orno'">
          <td ><% $index+1 %></td>
          <td class="text-right" ng-bind="collection.orno"></td>
          <td ng-bind="collection.ordate | date:'dd-MMM-yyyy'"></td>
          <td ng-bind="collection.category"></td>
          <td class="text-right" ng-bind="collection.amount"></td>
          <td ng-bind="collection.datecreated | date:'dd-MMM-yyyy'"></td>
          <td class="">
            <div class="pull-right">
              <button class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></button>
              <button class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i></button>
              <button class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
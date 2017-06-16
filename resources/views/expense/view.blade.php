<div ng-controller="ExpenseViewCtrl as ev">
  <div class="row">
    <div class="pull-right">
      <button class="btn btn-success" ng-click="ec.addExpense()">
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
          <th>PCV</th>
          <th>Ref No.</th>
          <th>OR Date</th>
          <th>Category</th>
          <th>Amount</th>
          <th>Date Encoded</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr ng-class="{'bg-success':expense.posted,'bg-danger':expense.deleted}" ng-repeat="expense in ev.expenseDetails | orderBy:'pcv'">
          <td ><% $index+1 %></td>
          <td class="text-right" ng-bind="expense.pcv"></td>
          <td class="text-left" ng-bind="expense.orno"></td>
          <td ng-bind="expense.ordate | date:'dd-MMM-yyyy'"></td>
          <td ng-bind="expense.category"></td>
          <td class="text-right" ng-bind="expense.amount"></td>
          <td ng-bind="expense.created_at | date:'dd-MMM-yyyy'"></td>
          <td class="">
            <div class="pull-right">
              <button class="btn btn-success btn-xs" ng-disabled="expense.posted || expense.deleted" ng-click="ev.post(expense)"><i class="glyphicon glyphicon-ok"></i></button>
              <button class="btn btn-info btn-xs" ng-disabled="expense.posted || expense.deleted" ng-click="ev.edit(expense)"><i class="glyphicon glyphicon-pencil"></i></button>
              <button class="btn btn-danger btn-xs" ng-disabled="expense.posted || expense.deleted" ng-click="ev.remove(expense)"><i class="glyphicon glyphicon-remove"></i></button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
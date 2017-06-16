define([
  'angular'
 ],function () {
  'use strict';
    app.lazy.controller('ExpenseCtrl',ExpenseCtrl)

    ExpenseCtrl.$inject = ['$scope', '$filter']
    function ExpenseCtrl($scope, $filter){
      var vm = this;

      vm.templateUrl = 'expense.create';

      vm.addExpense = function (){
        vm.templateUrl='expense.create';
      };
    }
});
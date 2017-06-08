define([
  'angular'
 ],function () {
  'use strict';
    app.lazy.controller('CollectionCreateCtrl',CollectionCreateCtrl)
    app.lazy.controller('ModalInfoInstanceCtrl',ModalInfoInstanceCtrl)
    app.lazy.factory('CollectionSrvcs', CollectionSrvcs)

      CollectionCreateCtrl.$inject = ['$scope', '$filter', 'CollectionSrvcs','$uibModal','blockUI', '$http']
      function CollectionCreateCtrl($scope, $filter, CollectionSrvcs, $uibModal, blockUI, $http){
        var vm = this;

        vm.collectionDetails = {
          type:'HOMEOWNER',
          refid:'',
          qty:1,
          amount:0
        };

        vm.init  = function() {
          vm.getOrList();
          vm.getCategoryList();
          vm.typeList = [
            {'id':1,'code':'HOMEOWNER','description':'Homeowner'},
            {'id':2,'code':'OUTSIDE','description':'Outside'}
          ];

          vm.monthList = [
            {'id':1,'description':'JAN'},
            {'id':1,'description':'FEB'},
            {'id':1,'description':'MAR'}
          ];
        }

        vm.submit = function (data) {
          if (vm.frmCreate.$valid) {
            vm.frmCreate.withError = false;
            
            var dataCopy = angular.copy(data);
            dataCopy.ordate = $filter('date')(dataCopy.ordate,'yyyy-MM-dd');
            dataCopy.entityvalue = ['JAN','FEB'];

            var appBlockUI = blockUI.instances.get('blockUI');
            appBlockUI.start();

            var formData = angular.toJson(dataCopy);
            CollectionSrvcs.save(formData)
            .then (function (response) {
              if (response.data.status == 200) {
                
                vm.personInfo = {};
              } else {

              }
              var modalInstance = $uibModal.open({
                  controller:'ModalInfoInstanceCtrl',
                  templateUrl:'shared.modal.info',
                  controllerAs: 'vm',
                  resolve :{
                    formData: function () {
                      return {
                        title: 'Create People',
                        message: response.data.message
                      };
                    }
                  }
                });

                modalInstance.result.then(function (){
                },function (){
                });
              appBlockUI.stop();
            },function(){alert("Error occured!");
            appBlockUI.stop();
            });
          } else {
            vm.frmCreate.withError = true;
          }
        };

        vm.get = function (data) {
          var dataCopy = angular.copy(data)
          data.person00id = 1;
          var formData = angular.toJson(dataCopy);

          CollectionSrvcs.get(data)
          .then (function (response) {
            if (response.status == 200) {
            }

          },function(){ alert("Bad Request!")})
        };

        vm.reset = function () {
          vm.personInfo = {};
        };

        vm.cancel = function () {
          $scope.$parent.$parent.ce.templateUrl ='collection.view';
        };
        
        vm.getOrList = function() {
          vm.orList = [
            {'id':'','orno':'001','category':'Membership Fee'},
            {'id':'','orno':'002','category':'Car Sticker'},
            {'id':'','orno':'003','category':'Car Sticker'}
          ];
        };

        vm.getRefList = function(data) {
          var formData = angular.copy(data);

          vm.refList = [
            {'refid':1, 'type':'HOMEOWNER', 'name':'Penaflor, Rommel'},
            {'refid':2, 'type':'HOMEOWNER', 'name':'Supnet, Erikson'}
          ];
        };

        vm.getCategoryList = function() {
          vm.categoryList = [
            {'id':1, 'code':'MF','description':'Membership Fee'},
            {'id':2, 'code':'MD','description':'Monthly Dues'},
            {'id':3, 'code':'CS','description':'Car Sticker'}
          ];
        };

        vm.datepickerOpen = function(i) {
          i.dtIsOpen = true;
        };

        vm.init();
      }

      ModalInfoInstanceCtrl.$inject = ['$uibModalInstance', 'formData']
      function ModalInfoInstanceCtrl ($uibModalInstance, formData) {
        var vm = this;
        vm.formData = formData;
        vm.ok = function() {
          $uibModalInstance.close();
        };

        vm.cancel = function() {
          $uibModalInstance.dismiss('cancel');
        };
      }

      CollectionSrvcs.$inject = ['$http']
      function CollectionSrvcs($http){
        return {
          save: function(data) {
            return $http({
              method:'POST',
              url: '/api/collection/create',
              data:data,
              headers: {'Content-Type': 'application/json'}
            })
          },
          get: function(data) {
            return $http({
              method:'GET',
              data:data,
              url: baseUrlApi + '/api/person?person00id='+ data.person00id,
              headers: {'Content-Type': 'application/json'}
            })
          },
          protected: function(data) {
            return $http({
              method:'GET',
              url: baseUrlApi + '/api/protected',
              headers: {'Content-Type': 'application/json','Authorization': 'admin'+':'+'admin'}
            })
          },
        }
      }
});
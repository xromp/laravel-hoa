define([
  'angular'
 ],function () {
  'use strict';
    app.lazy.controller('PersonCreateCtrl',PersonCreateCtrl)
    app.lazy.controller('ModalInfoInstanceCtrl',ModalInfoInstanceCtrl)
    app.lazy.factory('PersonSrvcs', PersonSrvcs)

      PersonCreateCtrl.$inject = ['$scope', 'PersonSrvcs','$uibModal','blockUI', '$http']
      function PersonCreateCtrl($scope, PersonSrvcs, $uibModal, blockUI, $http){
        var vm = this;

        vm.submit = function (data) {
          if (vm.frmCreate.$valid) {
            vm.frmCreate.withError = false;
            var dataCopy = angular.copy(data);
            var formData = angular.toJson(dataCopy);

            var appBlockUI = blockUI.instances.get('blockUI');
            appBlockUI.start();
            PersonSrvcs.save(formData)
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

          PersonSrvcs.get(data)
          .then (function (response) {
            if (response.status == 200) {
            }

          },function(){ alert("Bad Request!")})
        };

        vm.reset = function () {
          vm.personInfo = {};
        };
        
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

      PersonSrvcs.$inject = ['$http']
      function PersonSrvcs($http){
        return {
          save: function(data) {
            return $http({
              method:'POST',
              url: '/api/person/create',
              data:data,
              // headers: {'Content-Type': 'application/x-www-form-urlencoded'}
              headers: {'Content-Type': 'application/json','Authorization': 'admin'+':'+'admin'}
              // Access-Control-Allow-Origin
              // headers: {'Content-Type': 'multipart/form-data'}
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
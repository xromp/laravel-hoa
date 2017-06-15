define([
  'angular'
 ],function () {
  'use strict';
    app.lazy.controller('CollectionViewCtrl',CollectionViewCtrl)
    app.lazy.controller('ModalInfoInstanceCtrl',ModalInfoInstanceCtrl)
    app.lazy.factory('CollectionViewSrvcs', CollectionViewSrvcs)

      CollectionViewCtrl.$inject = ['$scope', '$filter', 'CollectionViewSrvcs','$uibModal','blockUI', '$http']
      function CollectionViewCtrl($scope, $filter, CollectionViewSrvcs, $uibModal, blockUI, $http){
        var vm = this;

        vm.query = {
          'startdate':'',
          'enddate':''
        };

        vm.init = function(){
          vm.get();
        };

        vm.get = function (data) {
          var appBlockUI = blockUI.instances.get('blockUI');
          appBlockUI.start();

          CollectionViewSrvcs.get()
          .then (function (response) {
            if (response.data.status == 200) {
              vm.collectionDetails = response.data.data;
            } else {

            }
            appBlockUI.stop();
          },function(){alert("Error occured!");
            appBlockUI.stop();
          });
        };

        vm.addCollection = function (){
          vm.templateUrl='collection.create';
        };
        
        vm.post = function(i) {
          var formDataCopy = angular.copy(i)
          formDataCopy.refid = formDataCopy.orno;
          formDataCopy.refdate = $filter('date')(formDataCopy.ordate,'yyyy-MM-dd');
          formDataCopy.amount = formDataCopy.amount_paid;
          formDataCopy.trantype = 'COLLECTION';

          var formData = angular.toJson(formDataCopy);
          CollectionViewSrvcs.post(formData)
          .then(function(response, status){
            if (response.data.status == 200) {
              i.posted = 1;  
            }
            var modalInstance = $uibModal.open({
              controller:'ModalInfoInstanceCtrl',
              templateUrl:'shared.modal.info',
              controllerAs: 'vm',
              resolve :{
                formData: function () {
                  return {
                    title: 'Collection Entry',
                    message: response.data.message
                  };
                }
              }
            });

            modalInstance.result.then(function (){
            },function (){
            });
          },function(){alert('Error occured')});

        };

        vm.edit = function(i) {

        };

        vm.remove = function(i) {
          var formDataCopy = angular.copy(i)

          var formData = angular.toJson(formDataCopy);
          CollectionViewSrvcs.delete(formData)
          .then(function(response, status){
            if (response.data.status == 200) {
              i.deleted = 1;  
            }
            var modalInstance = $uibModal.open({
              controller:'ModalInfoInstanceCtrl',
              templateUrl:'shared.modal.info',
              controllerAs: 'vm',
              resolve :{
                formData: function () {
                  return {
                    title: 'Collection Entry',
                    message: response.data.message
                  };
                }
              }
            });

            modalInstance.result.then(function (){
            },function (){
            });
          },function(){alert('Error occured')});

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

      CollectionViewSrvcs.$inject = ['$http']
      function CollectionViewSrvcs($http){
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
              url: '/api/collection/get',
              headers: {'Content-Type': 'application/json'}
            })
          },
          post: function(data) {
            return $http({
              method:'POST',
              data:data,
              url: '/api/transaction/post',
              headers: {'Content-Type': 'application/json'}
            })
          },
          delete: function(data) {
            return $http({
              method:'POST',
              data:data,
              url: '/api/collection/delete',
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
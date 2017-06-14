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
        vm.init = function(){
          vm.get();
        };

        vm.submit = function (data) {
          if (vm.frmCreate.$valid) {
            vm.frmCreate.withError = false;
            var dataCopy = angular.copy(data);
            var formData = angular.toJson(dataCopy);

            var appBlockUI = blockUI.instances.get('blockUI');
            appBlockUI.start();
            CollectionViewSrvcs.save(formData)
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
          // vm.collectionDetails = [
          //   {'orno':46,'ordate':'2017-05-03','category':'Membership Fees','amount':'1000','datecreated':'2017-06-31'},
          //   {'orno':3,'ordate':'2017-05-01','category':'Car Sticker','amount':'150.00','datecreated':'2017-07-31'},
          //   {'orno':45,'ordate':'2017-05-02','category':'Car Sticker','amount':'150.00','datecreated':'2017-07-31'}
          // ]
          // vm.collectionDetails[0].ordate = $filter('date')(new Date(),'dd-MMM-yyyy');
          // console.log(vm.collectionDetails[0]);
          // $filter('date')(new Date(),'yyyy-MM-dd');
          // var dataCopy = angular.copy(data)
          // data.person00id = 1;
          // var formData = angular.toJson(dataCopy);

          // CollectionViewSrvcs.get(data)
          // .then (function (response) {
          //   if (response.status == 200) {
          //   }

          // },function(){ alert("Bad Request!")})
        };

        vm.addCollection = function (){
          vm.templateUrl='collection.create';
        };

        vm.reset = function () {
          vm.personInfo = {};
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
<form name="ecc.frmCreate" class="form-horizontal form-label-left" ng-controller="ExpenseCreateCtrl as ecc" novalidate>
  <div class="row">
  </div>

  <div class="row">

    <div class="col-md-6">

      <div class="form-group" ng-class="{'has-error': ecc.frmCreate.orno.$invalid && ecc.frmCreate.withError }">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">OR No.</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="orno" class="form-control col-md-7 col-xs-12" ng-model="ecc.collectionDetails.orno" required>
          <span class="help-block" ng-show="ecc.frmCreate.orno.$invalid && ecc.frmCreate.withError">OR No. is required field.</span>
        </div>
      </div>

      <div class="form-group" ng-class="{'has-error': ecc.frmCreate.ordate.$invalid && ecc.frmCreate.withError }">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">OR Date <span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
        <p class="input-group">
          <input type="text" class="form-control" name="ordate" uib-datepicker-popup="MM/dd/yyyy" ng-model="ecc.collectionDetails.ordate" is-open="ecc.dtIsOpen" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" required/>
          <span class="input-group-btn">
            <button type="button" class="btn btn-default" ng-click="ecc.datepickerOpen(ecc)"><i class="glyphicon glyphicon-calendar"></i></button>
          </span>
        </p>
        <span class="help-block" ng-show="ecc.frmCreate.ordate.$invalid && ecc.frmCreate.withError">OR Date is required field.</span>
        </div>
      </div>
    </div>
  </div>
  <!-- <hr> -->
  <div class="row">

    <div class="col-md-6">

      <div class="form-group" ng-class="{'has-error': ecc.frmCreate.category.$invalid && ecc.frmCreate.withError }">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category <span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <p class="input-group">
            <select class="form-control" name="category" ng-model="ecc.collectionDetails.category" ng-init="ecc.getCategoryTypeList(ecc.collectionDetails)" ng-change="ecc.getCategoryTypeList(ecc.collectionDetails)" required>
              <option ng-repeat="category in ecc.categoryList" ng-bind="category.description" ng-value="category.code"></option>
            </select>
            <span class="input-group-btn">
              <button class="btn btn-success" ng-click="ecc.addCategory()"><i class="glyphicon glyphicon-plus"></i></button>
            </span>
          </p>
          <span class="help-block" ng-show="ecc.frmCreate.category.$invalid && ecc.frmCreate.withError">Categorys is required field.</span>
        </div>
      </div>

      <div class="form-group" ng-class="{'has-error': ecc.frmCreate.categorytype.$invalid && ecc.frmCreate.withError }">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category type<span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <p class="input-group">
            <select class="form-control" name="categorytype" ng-model="ecc.collectionDetails.categoryType" ng-init="ecc.getcategorytypeTypeList(ecc.collectionDetails)" ng-change="ecc.getcategorytypeTypeList(ecc.collectionDetails)" required>
              <option ng-repeat="categorytype in ecc.categoryTypeList | filter:{'category':ecc.collectionDetails.category}" ng-bind="categorytype.description" ng-value="categorytype.code"></option>
            </select>
            <span class="input-group-btn">
              <button class="btn btn-success" ng-click="ecc.addCategoryType()"><i class="glyphicon glyphicon-plus"></i></button>
            </span>
          </p>
          <span class="help-block" ng-show="ecc.frmCreate.categorytype.$invalid && ecc.frmCreate.withError">Categorys is required field.</span>
        </div>
      </div>

      <div class="col-md-9 col-md-offset-3">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h1 class="panel-title">Collection Category Details</h1>
          </div>
          <div class="panel-content">
            <br>
            <!-- MONTH DUES-->
           <!--  <div  ng-if="ecc.collectionDetails.category == 'MONTHLYDUES'">
              <div class="form-group">
                <div class="pull-right">
                  <button class="btn btn-danger" ng-click="ecc.modifyYear('LESS')"><i class="glyphicon glyphicon-plus"></i> Prev Year</button>
                  <button class="btn btn-success" ng-click="ecc.modifyYear('ADD')"><i class="glyphicon glyphicon-plus"></i>Next Year</button>
                </div>
              </div>

              <div class="form-group" ng-class="{'has-error': ecc.frmCreate.entityvalues.$invalid && ecc.frmCreate.withError }">
                <div class="col-md-4 col-sm-9 col-xs-12" ng-class="{'col-md-offset-3':ecc.categoryTypeList[0].year.length < 2}" ng-repeat="yr in ecc.categoryTypeList[0].year">
                  <div class="row form-group" style="margin-bottom: 0px;" ng-repeat="month in ecc.categoryTypeList[0].month | filter:{'year':yr}">
                    <label>
                      <input type="checkbox" name="" ng-model="ecc.monthSelected[month.name]">
                      <%month.description%>
                    </label>
                    <br>
                  </div>
                  <hr>
                </div>
              </div>
            </div> -->
            <!-- END MONTHLY DUES -->

            <!--CAR Sticker  -->
            <!-- <div ng-if="ecc.collectionDetails.category == 'CARSTICKER'">
              <div class="form-group">
                <div class="form-group" ng-repeat="sticker in ecc.stickerDetails">
                  <div class="col-md-4 col-md-offset-3">
                    <input type="text" name="stickerid" class="form-control" ng-model="sticker.stickerid" placeholder="Sticker ID">
                  </div>
                  <div class="col-md-4">
                    <input type="text" name="stickerid" class="form-control" ng-model="sticker.plateno" placeholder="Plate No.">
                  </div>
                  <div class="pull-right" ng-if="!$first">
                    <button class="btn btn-danger btn-xs" ng-click="ecc.removeCarSticker($index)">X</button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="pull-right">
                  <button class="btn btn-success" ng-click="ecc.addCarSticker()"><i class="glyphicon glyphicon-plus"></i>Add Car Sticker</button>
                </div>
              </div>
            </div> -->
            <!-- END CAR Sticker -->
            <div>
              
            </div>

            <div class="form-group" ng-class="{'has-error': ecc.frmCreate.remarks.$invalid && ecc.frmCreate.withError }">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Remarks </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea name="remarks" class="form-control col-md-7 col-xs-12" rows="5" ng-model="ecc.collectionDetails.remarks">
                </textarea> 
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="col-md-6">

      <div class="form-group" ng-class="{'has-error': ecc.frmCreate.amount.$invalid && ecc.frmCreate.withError }">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount Paid. <span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="number" min="0" name="amount"  class="form-control col-md-7 col-xs-12" ng-model="ecc.collectionDetails.amount" required>
          <span class="help-block" ng-show="ecc.frmCreate.amount.$invalid && ecc.frmCreate.withError">Amount is required field.</span>
        </div>
      </div>

    </div>
  </div>

  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="pull-right">
      <button type="submit" class="btn btn-success" ng-click="ecc.submit(ecc.collectionDetails)">Submit</button>
      <button type="button" class="btn btn-default" ng-click="ecc.cancel()">Cancel</button>
    </div>
  </div>
</form>
@include('layouts.errors')

<form name="cc.frmCreate" class="form-horizontal form-label-left" ng-controller="CollectionCreateCtrl as cc" novalidate>
  <div class="row">
    <div class="col-md-5 form-group pull-right">
      <label class="control-label col-md-4">Copy From:</label>
      <div class="col-md-8">
        <select class="form-control" ng-model="cc.collectionDetails.id">
          <option ng-repeat="or in cc.orList" ng-bind="or.orno + '('+ or.category +')'" ng-value='or.id'></option>
        </select>
        <!-- <input type="text" name="collectionid" class="form-control" ng-model="p.personInfo.collectionid"> -->
      </div>
    </div>    
  </div>

  <div class="row">

    <div class="col-md-6">

      <div class="form-group" ng-class="{'has-error': cc.frmCreate.type.$invalid && cc.frmCreate.withError }">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type <span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control col-md-7 col-xs-12" ng-model="cc.collectionDetails.type" ng-init="cc.getRefList()" ng-change="cc.getRefList()" required>
            <option ng-repeat="type in cc.typeList" ng-bind="type.description" ng-value="type.code"></option>
          </select>
          <!-- <input type="text" name="type"  class="form-control col-md-7 col-xs-12" ng-model="cc.collectionDetails.type" required> -->
          <span class="help-block" ng-show="cc.frmCreate.type.$invalid && cc.frmCreate.withError">type is required field.</span>
        </div>
      </div>

      <div class="form-group" ng-class="{'has-error': cc.frmCreate.orno.$invalid && cc.frmCreate.withError }">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">OR No.</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="orno" class="form-control col-md-7 col-xs-12" ng-model="cc.collectionDetails.orno" required>
          <span class="help-block" ng-show="cc.frmCreate.orno.$invalid && cc.frmCreate.withError">OR No. is required field.</span>
        </div>
      </div>

      <div class="form-group" ng-class="{'has-error': cc.frmCreate.ordate.$invalid && cc.frmCreate.withError }">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">OR Date <span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
        <p class="input-group">
          <input type="text" class="form-control" name="ordate" uib-datepicker-popup="MM/dd/yyyy" ng-model="cc.collectionDetails.ordate" is-open="cc.dtIsOpen" datepicker-options="dateOptions" close-text="Close" alt-input-formats="altInputFormats" required/>
          <span class="input-group-btn">
            <button type="button" class="btn btn-default" ng-click="cc.datepickerOpen(cc)"><i class="glyphicon glyphicon-calendar"></i></button>
          </span>
        </p>
        <span class="help-block" ng-show="cc.frmCreate.ordate.$invalid && cc.frmCreate.withError">OR Date is required field.</span>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">

    <div class="col-md-6">

      <div class="form-group" ng-class="{'has-error': cc.frmCreate.refid.$invalid && cc.frmCreate.withError }">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">From
          <span class="required">*</span>
          <small>(Members/Outside)</small>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control" name="refid" ng-model="cc.collectionDetails.refid" required>
            <option value="">Select from <% cc.collectionDetails.type %> ...</option>
            <option ng-repeat="ref in cc.refList" ng-bind="ref.name" ng-value="ref.refid"></option>
          </select>
          <!-- <input type="text" name="refid" class="form-control col-md-7 col-xs-12" ng-model="cc.collectionDetails.refid" required> -->
          <span class="help-block" ng-show="cc.frmCreate.refid.$invalid && cc.frmCreate.withError">From is required field.</span>
        </div>
      </div>

      <div class="form-group" ng-class="{'has-error': cc.frmCreate.category.$invalid && cc.frmCreate.withError }">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category <span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-control" name="category" ng-model="cc.collectionDetails.category" required>
            <option ng-repeat="category in cc.categoryList" ng-bind="category.description" ng-value="category.code"></option>
          </select>
          <!-- <input type="text" name="type"  class="form-control col-md-7 col-xs-12" ng-model="cc.collectionDetails.category" required> -->
          <span class="help-block" ng-show="cc.frmCreate.category.$invalid && cc.frmCreate.withError">Categorys is required field.</span>
        </div>
      </div>

      <div class="col-md-9 col-md-offset-3">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h1 class="panel-title">Collection Category Details</h1>
          </div>
          <div class="panel-content">
            <br>
            <div class="form-group" ng-class="{'has-error': cc.frmCreate.entityvalue1.$invalid && cc.frmCreate.withError }">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Reference </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" name="entityvalue1" class="form-control col-md-7 col-xs-12" ng-model="cc.collectionDetails.entityvalue1" required>
                <span class="help-block" ng-show="cc.frmCreate.entityvalue1.$invalid && cc.frmCreate.withError">Reference is required field.</span>
              </div>

            </div>
            <div class="form-group" ng-class="{'has-error': cc.frmCreate.remarks.$invalid && cc.frmCreate.withError }">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Remarks </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea name="remarks" class="form-control col-md-7 col-xs-12" rows="5" ng-model="cc.collectionDetails.remarks">
                </textarea> 
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="col-md-6">

      <div class="form-group" ng-class="{'has-error': cc.frmCreate.amount.$invalid && cc.frmCreate.withError }">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount Paid. <span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="number" min="0" name="amount"  class="form-control col-md-7 col-xs-12" ng-model="cc.collectionDetails.amount" required>
          <span class="help-block" ng-show="cc.frmCreate.amount.$invalid && cc.frmCreate.withError">Amount is required field.</span>
        </div>
      </div>

    </div>
  </div>

  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="pull-right">
      <button type="submit" class="btn btn-success" ng-click="cc.submit(cc.collectionDetails)">Submit</button>
      <button type="button" class="btn btn-default" ng-click="cc.cancel()">Cancel</button>
    </div>
  </div>
</form>
@include('layouts.errors')
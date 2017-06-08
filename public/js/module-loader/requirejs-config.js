var baseUrl = 'http://localhost:8000';
var assetsUrl = baseUrl + '/assets';
requirejs.config({
  paths:{
    // jQuery
    'jquery':'http://localhost:8000/assets/jquery/dist/jquery.min',

    // AngularJs
    'angular':assetsUrl + '/angular/angular.min',
    // 'angular':'http://localhost/sims/assets/angular/angular.min',
    'angular-route':assetsUrl + '/angular-route/angular-route.min',
    'angular-block-ui':assetsUrl + '/angular-block-ui/dist/angular-block-ui.min',
    'angular-animate':assetsUrl + '/angular-animate/angular-animate.min',
    'angular-sanitize':assetsUrl + '/angular-sanitize/angular-sanitize.min',

    // Bootstraps
    'bootstrap':assetsUrl + '/bootstrap/dist/js/bootstrap.min',
    'bootstrap-progressbar':assetsUrl + '/bootstrap-progressbar/bootstrap-progressbar.min',
    'bootstrap-wysiwyg': assetsUrl + '/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min',
    'ui.bootstrap': assetsUrl + '/others/js/ui-bootstrap-tpls-2.5.0.min',

    // Plugins
    'icheck' :assetsUrl + '/iCheck/icheck.min',
    'jquery-smartwizard': assetsUrl + '/jQuery-Smart-Wizard/js/jquery.smartWizard',
    'jquery.hotkeys' : assetsUrl + '/jquery.hotkeys/jquery.hotkeys',
    'google-code-prettify': assetsUrl + '/google-code-prettify/src/prettify',
    'jquery.tagsinput': assetsUrl + 'jquery.tagsinput/src/jquery.tagsinput',
    'switchery': assetsUrl + '/switchery/dist/switchery.min',
    'select2':'select2/dist/js/select2.full.min',

    // lib
    'fastclick': assetsUrl + '/fastclick/lib/fastclick',

    // js
    'datepicker': assetsUrl + 'js/datepicker/daterangepicker',

    // customs
    'custom' :assetsUrl + '/custom/js/custom.min'

  },
  shim:{

    'jquery' : {
      exports:'$'
    },
    'bootstrap' : {
      deps:['jquery']
    },
    'custom' : {
      deps:['jquery']
    },
    // AngularJS
    'angular':{
      exports: 'angular',
      deps:['jquery']
    },
    'angular-route':{
      deps:['angular']
    },
    'angular-block-ui':{
      deps:['angular']
    },
    'angular-animate':{
      deps:['angular']
    },
    'angular-sanitize':{
      deps:['angular']
    },
    // plugins
    'jquery-smartwizard':{
      deps:['jquery','bootstrap','fastclick']
    },
    'switchery':{
      deps:['jquery','bootstrap','icheck']
    },
    // bootstrap
    'ui.bootstrap':{
      deps:['angular']
    }
  }
});

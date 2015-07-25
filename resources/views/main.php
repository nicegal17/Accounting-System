
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="/">

    <title>Accounting System</title>

    <!-- Bootstrap core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Angular Toastr -->
    <link href="bower_components/angular-toastr/dist/angular-toastr.css" rel="stylesheet"/>
    <!-- Angular NgDialog -->
    <link href="bower_components/ngDialog/css/ngDialog.css" rel="stylesheet"/>
    <link href="bower_components/ngDialog/css/ngDialog-theme-default.css" rel="stylesheet"/>
    <!-- Angular ngTable -->
    <link href="bower_components/ng-table/dist/ng-table.css" rel="stylesheet"/>
    <!-- font awesome icons -->
    <link href="bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="styles/style.css" rel="stylesheet">
   
  </head>

  <body ng-app="accounting">

    <!-- mao ning  nav bar sa bootstrap nga g.himong directive nako pra pwede ma reuse sa ubang page -->
    <nav-bar ng-controller="headerCtrl"></nav-bar>

    <!-- Dri e render sa angular ang mga views nga naa sa templates -->
    <div id="wrapper">
      <div id="page-wrapper">
        <div data-ui-view></div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Angular JS -->
    <script type="text/javascript" src="bower_components/angular/angular.js"></script>
    <!-- Angular Resource -->
    <script type="text/javascript" src="bower_components/angular-resource/angular-resource.min.js"></script>
    <!-- Angular Sanitize -->
    <script type="text/javascript" src="bower_components/angular-sanitize/angular-sanitize.js"></script>
    <!-- Angular Route -->
    <script type="text/javascript" src="bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    <!-- Angular Bootstrap -->
    <script type="text/javascript" src="bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
    <!-- Angular Animate -->
    <script type="text/javascript" src="bower_components/angular-animate/angular-animate.js"></script>
     <!-- Angular Toastr -->
    <script type="text/javascript" src="bower_components/angular-toastr/dist/angular-toastr.tpls.js"></script>
    <!-- Angular ngDialog  -->
    <script type="text/javascript" src="bower_components/ngDialog/js/ngDialog.js"></script>
    <!-- Angular ngTable -->
    <script type="text/javascript" src="bower_components/ng-table/dist/ng-table.js"></script>
    


    <!-- Angular Libraries -->
    <script src ="scripts/app.js"></script>
    <!-- Angular Controllers -->
    <script src ="scripts/controllers/mainctrl.js"></script>
    <script src ="scripts/controllers/employeectrl.js"></script>
    <script src ="scripts/controllers/branchctrl.js"></script>
    <script src ="scripts/controllers/cdvctrl.js"></script>
    <script src ="scripts/controllers/positionctrl.js"></script>
    <!-- Angular Directives -->
    <script src ="scripts/directives/header.js"></script>
    <!-- Angular Services -->
    <script src ="scripts/services/employees.js"></script>
    <script src ="scripts/services/branches.js"></script>
    <script src ="scripts/services/cdv.js"></script>
    <script src ="scripts/services/positions.js"></script>
  </body>
</html>

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
    <!-- font awesome icons -->
    <link href="bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet">
   
  </head>

  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Log In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="/auth/login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="email" value="" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" id="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <!-- <a ui-sref="dashboard.home" class="btn btn-lg btn-success btn-block" href="/main/login">Login</a> -->
                                <button type="submit" class="btn btn-lg btn-success btn-block" ng-click="getLogin()">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/lodash/lodash.min.js"></script>

  </body>
</html>

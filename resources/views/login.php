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
    <link href="styles/login.css" rel="stylesheet">
   
  </head>

  <body>

    <div class="container">
        <?php if (isset($message) && !empty($message)) : 
            foreach ($errors->all() as $error):
        ?>
        <div class="alert alert-danger" role="alert">
            <strong>WARNING: </strong> {{message}}.
        </div>
        <?php endforeach; endif; ?>
        <form class="form-signin" id="form-signin" method="post">
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/lodash/lodash.min.js"></script>
    <script src="bower_components/notifyjs/dist/notify-combined.min.js"></script>
    <script src="scripts/lib/login.js"></script>
  </body>
</html>

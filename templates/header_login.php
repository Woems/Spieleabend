<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php global $title; echo $title; ?>">
    <meta name="author" content="Woems">
    <link rel="icon" href="/favicon.ico">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="public/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/bootstrap-3.2.0-dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="index.css" rel="stylesheet">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="."><?php echo $title; ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" method="post" action="index.php">
            <div class="form-group">
              <input placeholder="Email" class="form-control" type="text" name=user>
            </div>
            <div class="form-group">
              <input placeholder="Password" class="form-control" type="password" name=passwort>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
            <a class="btn btn-primary" href="signup.php">Sign up</a>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

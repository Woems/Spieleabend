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
          <form class="navbar-form navbar-left" role="search" action="game.php" method="get">
            <input type=hidden name="t" value="<?=$_GET['t']=='own'?"own":"all"?>" id="value_search_type">
            <div class="input-group">
              <div class="input-group-btn">
                <button id="button_search_type" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?=$_GET['t']=='own'?"Eigene":"Alle"?> <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                <li><a href="javascript:;" onClick="document.getElementById('button_search_type').childNodes[0].textContent='Alle '; document.getElementById('value_search_type').value='all'; ">Alle</a></li>
                  <li><a href="javascript:;" onClick="document.getElementById('button_search_type').childNodes[0].textContent='Eigene '; document.getElementById('value_search_type').value='own'; ">nur eigene Spiele</a></li>
                </ul>
              </div><!-- /btn-group -->
              <input type="text" name="s" class="form-control" placeholder="Spieletitel" value="<?=$_GET['s']?>">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-success">Suchen</button>
              </span>
            </div>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">bootstrap <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="http://getbootstrap.com/css/" target=bootstrap>CSS</a></li>
                <li><a href="http://getbootstrap.com/components/" target=bootstrap>Components</a></li>
                <li><a href="http://getbootstrap.com/javascript/" target=bootstrap>JavaScript</a></li>
                <li class="divider"></li>
                <li><a href="http://startbootstrap.com/template-overviews/sb-admin/" target=bootstrap>SB Admin - Overview</a></li>
                <li><a href="http://startbootstrap.com/templates/sb-admin/#" target=bootstrap>SB Admin - Live Preview</a></li>
                <li class="divider"></li>
                <li><a href="https://w-diskstation/phpMyAdmin/" target=phpMyAdmin>phpMyAdmin</a></li>
                <li><a href="http://php.net/manual/de/" target=phpMyAdmin>php Dokumentation</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Spieleseiten <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="http://www.brettspielwelt.de/" target=_blank>Brettspielwelt</a></li>
                <li class="divider"></li>
                <li><a href="http://boardgamegeek.com/" target=_blank>BoardGameGeek</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Spiele <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="game.php">Übersicht</a></li>
                <li><a href="game.php?user=<? global $user; echo $user->getID(); ?>">Eigene Spielesammlung</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?   global $user; echo $user->getName(); ?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php?Action=Profil"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
                <li><a href="index.php?Action=Inbox"><span class="glyphicon glyphicon-envelope"></span> Posteingang</a></li>
                <li><a href="index.php?Action=Config"><span class="glyphicon glyphicon-cog "></span> Einstellungen</a></li>
                <li class="divider"></li>
                <li><a href="?logout"><span class="glyphicon glyphicon-log-out"></span> Abmelden</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

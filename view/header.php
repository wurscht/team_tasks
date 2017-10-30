<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Team Tasks</title>

    <!-- Bootstrap core CSS and Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
      <script src="https://use.fontawesome.com/a951fb7605.js"></script>

    <!-- Custom styles for this template -->
    <link href="/css/style.css" type="text/css" rel="stylesheet">

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <a href="/home"><img id="logo" src="/images/logo_TT.png" alt="Logo"></a>
        <img id="header_img" alt="Header" src="/images/to-do-list.jpg">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li><a href="/home">Home</a></li>
              <li><a href="/task">Show all Tasks</a></li>
              <li><a href="/task/create">Add Tasks</a></li>
              <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
              <li><a href="/login/logout">Logout</a></li>
              <?php } else { ?>
              <li><a href="/">Login</a></li>
              <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
    </nav>
    <div class="container">
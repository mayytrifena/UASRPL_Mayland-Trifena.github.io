<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Admin</title>

</head>

<body>
  <nav class="navbar navbar-default navbar-static-top">

    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapsed" data-target="#navbar" aria-expanded="false" aria-control="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Administrator</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="<?= site_url() ?>index.php/admin/index"><i class="glyphicon glyphicon-home"></i>Admin</a></li>
          <li><a href="<?= site_url() ?>index.php/event/index"><i class="glyphicon glyphicon-list"></i>Event</a></li>
          <li><a href="<?= site_url() ?>index.php/pembayaran/index"><i class="glyphicon glyphicon-inbox"></i>Pembayaran</a></li>
          <li><a href="<?= site_url() ?>index.php/user/index"><i class="glyphicon glyphicon-user"></i>User</a></li>
          <li><a href="<?= site_url() ?>index.php/admin/logout" id="logout"><i class="glyphicon glyphicon-off"></i>Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
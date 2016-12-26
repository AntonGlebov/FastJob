<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <meta name="description" content="">
    <meta name="author" content="">


    <link rel="icon" href="../favicon.ico">

    <title>{TITLE}</title>


    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="non-responsive.css" rel="stylesheet">

    <script src="../bootstrap/js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <!-- The mobile navbar-toggle button can be safely removed since you do not need it in a non-responsive implementation -->
          <a class="navbar-brand" href="?">{LOGO}</a>
        </div>
        <!-- Note that the .navbar-collapse and .collapse classes have been removed from the #navbar -->
        <div id="navbar" >
          {LEFTMENU}

          {RIGHTMENU}
        </div>
      </div>
    </nav>

    <div class="container">

	{BODY}

	
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

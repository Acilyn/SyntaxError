<!DOCTYPE html>

<?
	require_once "sql.php";
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GetTrippy</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		</div>
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="?page=home">Home</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Places <span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="?page=amusement">Amusement</a></li>
				<li><a href="?page=museum">Museums</a></li>
			  </ul>
			</li>
			<li><a href="?page=register">Register</a></li>
		  <!--</ul>
		  <ul class="nav navbar-nav navbar-right">
		    <!-- User info -->
			<li>
				<?php

					if(isLoggedIn()){
						$output = "<a href='subpages/logout.php'>Logout from ".getUsername()."</a>";
						echo $output;
					}
					else {
						include("subpages/forms/toplogin.php");
					}
				?>
			</li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	<div class="row spacer">
	   <div class="span4">...</div>
	   <div class="span4">...</div>
	   <div class="span4">...</div>
	   <div class="span4">...</div>
	</div>
	
	<div class="container" >
		<div class="jumbotron">
			<img src="subpages/pictures/main_logo.jpg" width="100%">
		</div>
	</div>
	
	<div>
		<?php
			$page = $_GET['page'];
			switch($page){
				case "place":
					include("subpages/place.php");
					break;
				case "museum":
					include("subpages/museum.php");
					break;
				case "amusement":
					include("subpages/amusement.php");
					break;
				case "recover":
					include("subpages/passwordrecover.php");
					break;
				case "contact":
					include("subpages/contact.php");
					break;
				case "about":
					include("subpages/about.php");
					break;
				case "comment":
					include("subpages/comment.php");
					break;
				case "account":
					include("subpages/account.php");
					break;
				case "register":
					include("subpages/forms/register.php");
					break;
				default:
					include("subpages/main.php");
			}
		?>
	</div>
	<!--
	<div class="navbar navbar-default navbar-fixed-bottom">
		<div class="container">
			<p class="navbar-text pull-right">Built by: Dustin Owen, Sean Kotowich, Carishea Frame and Nicolas Aponte</p>
		</div>
	</div>
	-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


<?php mysqli_close($conn); //closing database ?>
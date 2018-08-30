<?php
	session_start();
	include "hotels_db.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="hotelMaster.php?Page=Home">Halli Mane</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	        <ul class="nav navbar-nav">
		        <li class="active"><a href="hotelMaster.php?Page=Home">Home</a></li>
		        <li><a href="hotelMaster.php?Page=Report">Page 1</a></li>
	        </ul>
	    </div>
	  </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
					if($_GET['Page'] == "Home"){
						include('order_item.php');
					}elseif ($_GET['Page'] == "Report") {
						include('order_report.php');
					}
				?>
			</div>
		</div>
		
	</div>
	<div class="container" style="margin-top:10%;margin-bottom: 10%;">
	<div class="row">
		
	</div>
</div>
<div class="container-fluid" style="width:100%;background-color: black;color: white;">
	<div class="row">
		<div class="col-md-12">
			<p style="margin-left: 47%;padding-top: 3%;">HalliMane</p>
			 <p style="margin-left: 45%;padding-bottom: 2%;">&copy;CopyRight-2018</p>
		</div>
	</div>
</div>
  </body>
  </html>
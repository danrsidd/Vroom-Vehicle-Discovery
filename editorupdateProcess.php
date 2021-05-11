<!DOCTYPE html>
<html lang="en">

 <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Vroom Vehicle Discovery</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.min.css" rel="stylesheet">

	<style>.headtitle {
font-weight: bold;
text-align:center;

}  

</style>
  </head>
<body>

<h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Vroom Vehicle Discovery</span>
	  <div >
            <a class="btn btn-primary btn" href="index.php">Shopper</a>
			            <a class="btn btn-primary btn" href="editorhome.php">Editor</a>
            <a class="btn btn-primary btn" href="adminhome.php">Admin</a>

          </div>

    </h1>

      <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="editorhome.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
		   <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="editornewmodel.php">Add Vehicles</a>
          </li>
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="editorupdate.php">Update Tool</a>
          </li>
          <li class="nav-item px-lg-4">
           <a class="nav-link text-uppercase text-expanded" href="editorvehicles.php">All Vehicles</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

     <section style="background: rgb(2,0,36); background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(255,226,145,0.8925945378151261) 0%);");>
      <div class="container">
	  
	  
			  <h2 class="headtitle section-heading mb-5">
        <br>
        <br>
        <br>
                <span class="section-heading-upper">Vroom</span>
                <span class="section-heading-lower">Update Successful!</span>         
        </h2>

</div>
<div class="row justify-content-center">

<?php

	require_once 'login_danyal.php'; 

	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

	foreach($_POST as $key=>$value) ${$key}=$value;
		
		
		//DO something with that value
		
		$sql = "UPDATE models SET model_name = '$model_name', model_year = '$model_year', model_value= '$model_value', model_description= '$model_description' WHERE model_id = '$model_id';";
				
		//As we have already connected to the database, execute the query stored in the $sql variable
		$result = mysqli_query($db_server, $sql);
		
		//Check if the UPDATE was successfully executed: if the result is NOT FALSE
		if($result) echo " ";else echo "UPDATE failed!";
		
		

?>

</div>             
    <h1></h1>
<form action="editorupdate.php">
	<div class="row justify-content-center">
	<input type="submit" value="Go Back to Update Tool" class="btn btn-success"></button>
	</div>
	</form>
</section>



    <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">Copyright &copy; Vroom Vehicle Discovery 2019</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

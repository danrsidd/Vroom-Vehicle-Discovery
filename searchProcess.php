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
table{
	border-spacing: 33px;
	width: 100%
	color: #e6a756;
	font-family: 'Lora';
	font-size: 25px;
	text-align: center;
	margin-left:auto; 
  margin-right:auto;
}

td{
	padding: 10px 20px;
}

tr:first-child { 
  font-weight: bold;
}

tr:nth-child(even) {background-color: #e6a756}
tr:nth-child(odd) {background-color: #ffffff}

tr:hover {background-color: #ffd373;}
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
              <a class="nav-link text-uppercase text-expanded" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
           
			<li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="discover.php">Discover</a>
            </li>
            <li class="nav-item px-lg-4">
                <a class="nav-link text-uppercase text-expanded" href="vehicles.php">Vehicles</a>
            </li>
            <li class="nav-item px-lg-4">
             <a class="nav-link text-uppercase text-expanded" href="about.php">About</a>
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
                <span class="section-heading-lower">Vehicle Discovery Tool</span>         
        </h2>

</div>
<div class="row justify-content-center">

	<?php
	
		
		foreach($_POST as $key=>$value) ${$key}=$value;
		
		require_once 'login_danyal.php'; 

		$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
		if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
		
		$make_name = $_POST['make_name'];
		
		$sql = "SELECT mk.make_name, mdl.model_name, mdl.model_value,b.body_style
				FROM models AS mdl INNER JOIN makes AS mk
				ON mdl.make_id = mk.make_id
					INNER JOIN body_types AS b               
					ON mdl.body_id = b.body_id
				WHERE mk.make_name ='$make_name';";
		
		$result = mysqli_query($db_server, $sql);
    	
		if($result)
		{
			
			echo "<table>";
      		echo "<tr><td>Make</td><td>Model</td><td>Value</td><td>Body Style</td></tr>";
			while($row=mysqli_fetch_assoc($result))
			{
				foreach($row as $key=>$value) ${$key}=$value;

				echo "<tr><td>$make_name</td><td>$model_name</td><td>$model_value</td><td>$body_style</td></tr>";
			}
			
			echo "</table>";
			
		}			
	?>
	
</div>             
    <h1></h1>
<form action="discover.php">
	<div class="row justify-content-center">
	<input type="submit" value="Go Back to Discovery Tool" class="btn btn-success"></button>
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

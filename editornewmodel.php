<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Vroom Vehicle Discovery</title>
<style>

.headtitle {
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


label {font-weight: bold;} 

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=reset] {
  width: 100%;
  background-color: #DC143C;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

input[type=reset]:hover {
  background-color: #8B0000
;
}
  </style>

 <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

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
		   <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="editornewmodel.php">Add Vehicles</a>
          </li>
          <li class="nav-item px-lg-4">
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
                <span class="section-heading-upper">Vroom Editors</span>
                <span class="section-heading-lower">New Vehicle Tool</span>         
        </h2>



</div>
	
			<br>
			<br>
		
<?php
		require_once 'login_danyal.php';

		$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
		if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
				
		$sql = "SELECT mk.make_name, mdl.model_name, mdl.model_year, mdl.model_value
				FROM models AS mdl INNER JOIN makes AS mk
				ON mdl.make_id = mk.make_id
				ORDER BY mk.make_name;";
		
		$result = mysqli_query($db_server, $sql);
    	
		if($result)
		{
			
			echo "<table>";
      		echo "<tr><td>Make</td><td>Model</td><td>Year</td><td>Value</td></tr>";
			while($row=mysqli_fetch_assoc($result))
			{
				foreach($row as $key=>$value) ${$key}=$value;

				echo "<tr><td>$make_name</td><td>$model_name</td><td>$model_year</td><td>$model_value</td></tr>";
			}
			
			echo "</table>";
	
		}			
?>
			

<!-- FORM BEGINS HERE -->
			
			<br>
<div class="row justify-content-center">
<form method="POST" action="editorinsertProcess.php" class="form-horizontal">

 <div class="form-group">
 <label>Make</label>  
 <input id="Make" name="make_name" type="text" placeholder="Manufacturer Name" class="form-control input-md" required>
  </div>

  <div class="form-group">
  <label>Model</label>  
  <input id="Model" name="model_name" type="text" placeholder="Model Name" class="form-control input-md" required> 
  </div>
<div class="form-group">
  <?php
		require_once 'login_danyal.php'; 

		$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
		if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
				
		$sql = "SELECT body_id, body_style FROM body_types ORDER BY body_id ASC;";
		
		$result = mysqli_query($db_server, $sql);
		
		if($result)
		{
			echo "<label>Body Type</label><br>";
			echo "<select name='body_id' class='form-control'>";

			while($row=mysqli_fetch_assoc($result))
			{
				foreach($row as $key=>$value) ${$key}=$value;
        
				echo "<option value='$body_id . $body_style'>$body_id . $body_style</option>";
			}
			echo "</select>";	
		}
?>
  </div>
  
  <div class="form-group">
  <label>Year</label>
    <select id="Year" name="model_year" class="form-control">
      <option value="2019">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
    </select>
  </div>

  <div class="form-group">
  <label>Value</label>  
  <input id="Value" name="model_value" type="number" placeholder="Value in USD" class="form-control input-md" min="10000.00" max="99999999.99" required>
  </div>

<div class="form-group">
  <?php
		require_once 'login_danyal.php'; 

		$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
		if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
				
		$sql = "SELECT feature_id, feature_name FROM features ORDER BY feature_id ASC;";
		
		$result = mysqli_query($db_server, $sql);
		
		if($result)
		{
		
			echo "<label>Features</label><br>";

			while($row=mysqli_fetch_assoc($result))
			{
				foreach($row as $key=>$value) ${$key}=$value;
        
				echo "<input type='checkbox' name='feature_id[]' value='$feature_id'>$feature_id . $feature_name</option><br>";
			}
		
		}
?>
  </div>
  
  <div class="form-group">
  <label>Description</label>
  <textarea class="form-control" id="Description" name="model_description" placeholder="Enter a new vehicle description."></textarea>
  </div>

<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
    <input type="submit" button id="button1id" name="button1id" class="btn btn-success"></button>
    <input type="reset" button id="button2id" name="button2id" class="btn btn-danger"></button>
  </div>


</form>
</div>
             
      </div>
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

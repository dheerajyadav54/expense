<?php
session_start();

require_once './connection.php' ;
	$username = $_SESSION["contact_no"];
	$sql = "SELECT * FROM expense_table WHERE contact_no='$username' ORDER BY date_ex";
	$result = $conn->query($sql);	 
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <style>
	 
	 .container{
		 font-family: Times New Roman;
		 padding-top: 40px;
	 }
	 .container-fluid{
		 background-color: #454141;
		 color: white;
		 margin-top: 60px;
	 }
	 .expensedetails{
		 height: auto;
	 }
	</style>
  <title>Your account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body style="background: linear-gradient(to top right, #eff0f2 0%, #ffffff 100%)">
<form action="" name="myForm" id="myForm1">
 <div class="row"><nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top"><div class="col-md-11">
  <a class="navbar-brand" href="youraccount.php">Personal Expense Manager</a></div>
<div class="col-md-1">  <a href="logout.php?logout"><input type="button" value="Logout" class="btn btn-dark" style="border:2px solid grey;">	</a></div>
</nav></div>

<div class="container" style="margin-top:40px;">
<div class="expensedetails">
<div class="row bg-dark" style="color: white; height: 60px">
	  	<div class="col-md-12" style="padding-top: 15px">
		<h4><b>Welcome
	<?php
		require_once './connection.php';
		$uname = $_SESSION["name"];
		echo $uname;
?>
</b></h4>
	 	<hr style="background-color: white">
 	</div>

</div>

 <div class="row bg-dark" style="color: white; height: 60px;">
 	<div class="col-md-4" style="padding-top: 15px">
		<h4><b>Date</b></h4>
 	</div>
 	 <div class="col-md-4" style="padding-top: 15px">
		 <h4><b>Expense Type</b></h4>
 	</div>
 	 <div class="col-md-4" style="padding-top: 15px">
 		<h4><b>Money &#x20B9;</b></h4>
 	</div>
  </div><hr>
   <div class="row">
    	<?php 
			if($result->num_rows > 0)
			{	
				while($row = $result->fetch_assoc()) {		
	?>
 	<div class="col-md-4" style="padding: 10px">
 	<?php 
				echo $row["date_ex"]; 
	?>
 	</div>
 	 <div class="col-md-4" style="padding: 10px">
 	<?php
			echo $row["e_type"]; 
	?>
 	</div>
 	<div class="col-md-4" style="padding: 10px">
 	<?php 
		 	echo $row["total"]; 	
		?>	
 	</div>
 		<?php 
	 }
			}
		?>
  </div>
   
  </div>
 <div class="row">
	 <div class="col-md-10">

	 </div>
 <div class="col-md-2">
 	<a href="selectexpense.php"><input type="button" value="Add Expenses" class="btn btn-secondary"></a>
 </div>
</div>
 <div class="row">
 <div class="col-md-6">
            <div class="form-group">
                <div class="input-group date" id="datetimepicker2">
                    <input type="date" name="date2" class="form-control" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
 </div>
 <div class="col-md-6">
 	<input class="btn btn-primary" type="submit" name="insert" value="ok">
 </div>
</div>
 <div class="row">
 <div class="col-md-12">
	<?php
if(isset($_POST['insert'])){
	
	$date = $_POST['date2'];
	echo $date;
	exit();
	$username = $_SESSION["contact_no"];
	$date = date("d-M-Y");

	$sql = "INSERT INTO expense_table (e_type, total, Contact_No, date_ex) VALUES('food', $total, $username, '$date')";
	$conn->query($sql);
	
	header("Location: youraccount.php");
} 
?>
 </div>
</div>
</div>
	<div class="container-fluid">
		<div class="container">
 		  	<div class="row">
   		  		<div class="col-md-6" > 
					<h3>Get In Touch</h3>
 		  			<p><i class="fa fa-envelope-o" style="font-size:24px"></i><a href="mailto:dheerajyadav2929@gmail.com">
					dheerajyadav2929@gmail.com</a></p>
						<p><i class="fa fa-phone"></i>  +91 8954542929</p>
						<p><i class="fa fa-home"></i>Personal Expense Manager Office Vandalur Kelambakkam <br>
							  Chennai TN 600127</p>
  		  		</div>
  		  		<div class="col-md-6" >
  	
  		  			<h3>Follow Us</h3>
						<a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-2x"></i></a>&nbsp;&nbsp;&nbsp;
						<a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-2x"></i></a>&nbsp;&nbsp;&nbsp;
						<a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-2x"></i></a>&nbsp;&nbsp;&nbsp;
						<a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-2x"></i></a>&nbsp;&nbsp;&nbsp;
						<a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-2x"></i></a>&nbsp;&nbsp;&nbsp;
  		  		</div>
		</div>
		<div class="row">
			<div class="col-md-12" >
				<hr style="background-color: white">
				 <center><b>&copy &nbsp; All Rights Reserved 2018 </b></center>
			</div>
		</div>
	</div>

	</div>
</form>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    locale: 'ru'
                });
            });
        </script>
</body>
</html>
<?php
	require_once '../../BusinessServiceLayer/controller/staffController.php';	

	$staff = new staffController();

	//Call view function
	if(isset($_POST['view']))
	{
  		$staff->view();
	}
	//Call edit function
	if(isset($_POST['edit']))
	{
  		$staff->edit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/style.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<title>IVMS | UpdateStaffInformation</title>

	<!-- HEADER-->
	<div class="header" >
	<h1 >INVENTORY MANAGEMENT SYSTEM</h1>
	</div>
	<!-- SAMPAI SINI -->
</head>
<body>
	<!-- NAVIGATION BAR-->
<ul>
	  <li><a href="http://localhost/ivms/login/Admin%20login/h.php">HOME</a></li>
  <li><a class="activeNav" href="http://localhost/IVMS/ApplicationLayer/ManageStaffInformation/myInfo.php">STAFF</a></li>
  <li><a href="http://localhost/IVMS/ApplicationLayer/ManageInventory/In_Item.php">INVENTORY</a></li>
  <li><a href="http://localhost/IVMS/ApplicationLayer/ManageItemOrderList/Item%20Order%20List%20Home.php">ITEM ORDER LIST</a></li>
  <li style="float:right"><a href="http://localhost/ivms/login/">LOGOUT</a></li>
  <li style="float:right"><a href="http://localhost/IVMS/ApplicationLayer/Audit%20Report/auditlist.php">AUDIT</a></li>
  <li style="float:right"><a href="http://localhost/IVMS/ApplicationLayer/GenerateReport/GenerateReport.php">REPORT</a></li>
	</ul>
	<!--COLUMN1, COLUMN2, COLUMN3-->
	<div>
		<div class="column1" style="padding-left: 20px">
	    <h2>MY INFORMATION</h2>
	    <p>
	    	<table  class="center" width="100%" >
	    		
	    		<tr><td align="center"><i class="fa fa-edit"></i> <input class="button" type="button" name="viewMyInfo" onclick="document.location='myInfo.php'" value="View/Edit My Information  "></td></tr>
	</table>
</p>
	  </div>
	  <div class="column2">
	    <h2>NEW STAFF INFORMATION</h2>
	    <p>
	    	<table  class="center" width="100%" >
	    		
	    	<tr><td align="center"><i class="fa fa-user-plus"></i>
	    		<input class="button" type="button" onclick="document.location='addStaff.php'" value=" Add New Staff Information "></td></tr></table>
	    </p>
	  </div>
	  <div class="column3" >
	    <h2>CURRENT STAFF INFORMATION</h2>
	    <p>
	    	<table  class="center" width="100%" >
	    		
	    		<tr>
	    			<td align="center">
	    				<i class="fa fa-trash"></i>&nbsp
	    		   		<input class="button" type="button" onclick="document.location='deleteStaff.php'" value="    Delete Staff Information     "></td></tr>
	    		<tr>
	    			<td align="center">
	    		   		<i class="fa fa-edit"></i>
	    		   		<input class="button" type="button" onclick="document.location='viewStaff.php'" value     ="  View/Edit Staff Information  "></td></tr>
	    	</table>
	    </p>
	  </div>
<div>
	<br><br><br><br><br><br><br><br><br><br>
<div style="background-color:white; padding-bottom: 10%; margin :5px; margin-top: 25px">
<h2 style="text-align: center; padding-top: 25px">EDIT STAFF INFORMATION</h2>
<div >
	<center>
		<!--Form to enter id to view-->
<form action="" method="post">
		ID Number : <input style="width: 50%" type="text" name="id" placeholder="enter staff ID"> 
	<input class="button" type="submit" name="view" value="  Edit  ">
</form>
</center>
</div>
<br>
<!--Form to edit staff information-->
	<form action="" method="POST">
		<table class="center">
		<?php
		$link = mysqli_connect("localhost", "root", "");
		$db = mysqli_select_db($link, "myDatabase");

		if(isset($_POST['view']))
		{
			$id = $_POST['id'];
			$sql = "SELECT * FROM staff WHERE id='$id'";
	    	$sql_run = mysqli_query($link, $sql);

	    	while($row = mysqli_fetch_array($sql_run))
	    	{
	    	?>
		<tr>
			<th>Name</th>
			<td width="100%"><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
			<td rowspan="8" ><i class="fa fa-user" style="font-size: 150px; padding-left: 30%;"></i>
				</td>
		</tr>
		<tr>
			<th>ID Number</th>
			<td><input type="text" name="id" value="<?php echo $row['id']; ?>"></td>
		</tr>
		<tr>
			<th>Phone Number</th>
			<td><input type="text" name="phone" value="<?php echo $row['phone']; ?>"></td>
		</tr>
		<tr>
			<th>Address</th>
			<td><input type="text" name="address" value="<?php echo $row['address']; ?>"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="text" name="email" value="<?php echo $row['email']; ?>"></td>
		</tr>
		<tr>
			<th>Office Tel</th>
			<td><input type="text" name="officeTel" value="<?php echo $row['officeTel']; ?>"></td>
		</tr>
		<tr>
			<th>Office Fax</th>
			<td><input type="text" name="officeFax" value="<?php echo $row['officeFax']; ?>"></td>
		</tr>
		<tr>
			<th>Group</th>
			<td><input type="text" name="groupsList" value="<?php echo $row['groupsList']; ?>"></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: center">
			<i class="fa fa-edit">&nbsp</i>
			<input class="button" type="submit" name="edit" value="  Edit  ">
			</td>
		</tr>
		<?php
			}
		}
	?>
	</table>
		</form>
</div>
</div>
<!-- FOOTER-->
</div>
<div class="footer">
	<p style="color:white;margin-top:25px;">2021 &#169;BING'S CORP</p>
</div>
</body>
</html>



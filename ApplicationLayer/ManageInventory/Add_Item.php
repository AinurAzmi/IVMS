<?php
require_once '../../BusinessServiceLayer/controller/itemController.php';

$add = new itemController();

if(isset($_POST['Submit'])){
   
    $add->add();
	header("location:In_Item.php");
	
}
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<title>IVMS | Add Item</title>
<style>

/* Header Hi*/
.header {
  text-align: center;
  background: #508585;
  color: white;
  font-size: 26px;
  font-family: cooper black;
  width:100%;
  height:120px;
  padding: 2px 25px 7px;
}

/* Column(kotak putih) */

.column1 {
		  background-color: white;
		  margin-left: 0px; margin-right: 5px; margin-top: 10px;
		  float: left;
		  width: 100%;
		  padding: 0px 25px 7px;
		  height: 7%;
		}

.column2 {
		  background-color: white;
		  margin-left: 0px; margin-right: 5px; margin-top: 30px;
		  float: left;
		  width:100%;
		  padding: 0px 25px 7px;
		  height: 910px;
		}
		
/* Table */
table{
	width: 65%;
    margin:auto;
}
td{
	padding-top: 15px;
	padding-bottom: 15px;
	padding-left: 10px;
	text-align: left;
	width: 40%;
}

.col{
	width: 40%;
	position: right;

}

.userin{
	width: 55%;
	height: 33px;
}

/* Save Button */
.button{
	display: inline-block;
	text-align: center;
	padding: 13px 45px 13px;
	border:none;
	background-color: #508585;
	color: white;
	font-size: 15px;
	border-radius: 15px;
}

.button:hover {
  background-color: #ddd;
  color: black;
}

/* Navigation Bar */
ul {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		  overflow: hidden;
		  background-color: #333;
		}

		li {
		  float: left;
		}

		li a {
		  display: block;
		  color: white;
		  font-family: cooper black;
		  text-align: center;
		  padding: 14px 20px;
		  text-decoration: none;
		}

		li a:hover:not(.active) {
		  background-color: #B6D5D5;
		}

		.activeNav {
		  background-color: #7EDADB;
		}
		
body{ background-color: #7EDADB }

.center {
  margin-left: auto;
  margin-right: auto;
}

/* Dropdown Button */
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 10px 15px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

.center {
  margin-left: auto;
  margin-right: auto;
}

.btn {
  border: none;
  background-color: inherit;
  padding: 14px 28px;
  font-size: 15px;
  cursor: pointer;
  display: inline-block;
  margin-top: 15px;
}

.success:hover {
  background-color: #04AA6D;
  color: white;
}

.active, .btn:hover {
  background-color: #04AA6D;
  color: white;
}

/* Footer */
.footer{
        position: absolute;
		background-color: #508585;
		height: 50px;
		width:100%;
		padding: 2px 25px 7px;
		top: 900px;
        left: 7px;
	}

</style>
</head>

<body>
<!-- HEADER-->
<div class="header">
  <h1>INVENTORY MANAGEMENT SYSTEM</h1>
</div>
<!-- NAVIGATION BAR-->
<ul>
  <li><a href="http://localhost/ivms/login/Admin%20login/h.php">HOME</a></li>
  <li><a href="http://localhost/IVMS/ApplicationLayer/ManageStaffInformation/myInfo.php">STAFF</a></li>
  <li><a class="activeNav"  href="http://localhost/IVMS/ApplicationLayer/ManageInventory/In_Item.php">INVENTORY</a></li>
  <li><a href="http://localhost/IVMS/ApplicationLayer/ManageItemOrderList/Item%20Order%20List%20Home.php">ITEM ORDER LIST</a></li>
  <li style="float:right"><a href="http://localhost/ivms/login/">LOGOUT</a></li>
  <li style="float:right"><a href="http://localhost/IVMS/ApplicationLayer/Audit%20Report/auditlist.php">AUDIT</a></li>
  <li style="float:right"><a href="http://localhost/IVMS/ApplicationLayer/GenerateReport/GenerateReport.php">REPORT</a></li>
</ul>

<!--COLUMN 1-->
<div class="column1">
  <div>
  <center><button class="btn success"><a href="In_Item.php">In-Item</a></button>
          <button class="btn success"><a href="Out_Item.php">Out-Item</a></button>
		  <div class="dropdown">
          <button class="btn active" style="color:blue;text-decoration:underline;">More</button>
          <div class="dropdown-content">
          <a href="add_Item.php">Add Item</a>
          <a href="delete_Item.php">Delete Item</a>
          <a href="search.php">Search Item</a>
          </div>
  </center>
</div>
</div>

<!--COLUMN 2-->
 <div class="column2">
 <center>
 <form action="" method="post">
 <!--ADD ITEM-->
 <table>
    	<tr><td></td></tr><br>
		<tr>
    		<td colspan="3"><b>Item ID: </b>
			<input class="userin" style="margin-left:80px;" type="text" name="ItemID" placeholder="Item Id" required></td>
    	</tr>
    	<tr>
    		<td colspan="3"><b>Item Name: </b>
			<input class="userin" style="margin-left:60px;" type="text" name="itemName" placeholder="Item Name" required></td>
    	</tr>
    	<tr>
    		<td colspan="3"><b>Quantity Order: </b>
			<input class="userin" style="margin-left:30px;" type="text" name="qtorder" placeholder="Quantity Ordered" required></td>
    	</tr>
		<tr>
    		<td colspan="3"><b>Quantity Received: </b>
			<input class="userin" style="margin-left:13px;" type="text" name="qtreceived" placeholder="Quantity Received" required></td>
    	</tr>
    	<tr>
    		<td colspan="3"><b>Unit Price(RM): </b>
			<input class="userin" style="margin-left:33px;" type="text" name="unitPrice" placeholder="Unit Price" required></td>
    	</tr>
        <tr>
    		<td colspan="3"><b>Location: </b>
			<input class="userin" style="margin-left:80px;" type="text" name="location" placeholder="Location"required></td>
    	</tr>
        <tr>
    		<td colspan="3"><b>Date Ordered: </b>
			<input class="userin" style="margin-left:45px;" type="date" name="dateOrder" placeholder="Date Order" required></td>
    	</tr>
        <tr>
    		<td colspan="3"><b>Date Arrived: </b>
			<input class="userin" style="margin-left:50px;" type="date" name="dateArrived" placeholder="Date Arrived" required></td>
    	</tr>
        <tr>
    		<td colspan="3"><b>Company Name: </b>
			<input class="userin" style="margin-left:30px;" type="text" name="companyName" placeholder="Company Name" required></td>
    	</tr>
        <tr>
    		<td colspan="3"><b>Company Address: </b>
			<input class="userin" style="margin-left:15px;" type="text" name="companyAddress" placeholder="Company Address" required></td>
    	</tr>
        <tr>
    		<td colspan="3"><b>Sender Name: </b>
			<input class="userin" style="margin-left:50px;" type="text" name="senderName" placeholder="Sender Name" required></td>
    	</tr>
        <tr>
    		<td colspan="3"><b>Truck Plate No: </b>
			<input class="userin" style="margin-left:40px;" type="text" name="truckPlateNo" placeholder="Truck Plate No" required></td>
    	</tr>
    	<tr><td><input class="button" style="margin-left:380px;" type="submit" name="Submit" value="Save" ></td></tr> 
    </table>
	</form>
    </center>
</div>

<!--FOOTER-->
<div>
  <div style="margin-top:380px;" class="footer">
  <p style="color:white;margin-top:25px;">2022 &#169; BING'S CORP</p>
  </div>
</div>
</body>
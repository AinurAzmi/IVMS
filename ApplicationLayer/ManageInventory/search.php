<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <title>IVMS | Search Item</title>
</head>

<style>

/* Header ivms*/
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
		  width:100%;
		  padding: 7px 25px 7px;
		  height: 140%;
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

/* Green Button */
.btn {
  border: none;
  background-color: inherit;
  font-size: 15px;
  cursor: pointer;
  padding: 14px 28px;
  display: inline-block;
}

.success:hover {
  background-color: #b4d463;
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
		height: 120px;
		width:100%;
		padding: 2px 25px 7px;
		top: 1200px;
    left: 7px;
	}
	
/* Dropdown Button */
.dropdown {
  position: relative;
  display: inline-block;
}
	
/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 120px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>
</head>

<body>

<!--HEADER-->
<div class="header">
  <h1>INVENTORY MANAGEMENT SYSTEM</h1>
</div>

<!--NAVIGATION BAR-->
<ul>
  <li><a href="http://localhost/ivms/login/Admin%20login/h.php">HOME</a></li>
  <li><a href="http://localhost/ivms/ApplicationLayer/ManageStaffInformation/myInfo.php">STAFF</a></li>
  <li><a class="activeNav" href="http://localhost/ivms/ApplicationLayer/ManageInventory/In_Item.php">INVENTORY</a></li>
  <li><a href="http://localhost/ivms/ApplicationLayer/ManageItemOrderList/Item%20Order%20List%20Home.php">ITEM ORDER LIST</a></li>
  <li style="float:right"><a href="http://localhost/ivms/login/">LOGOUT</a></li>
  <li style="float:right"><a href="http://localhost/ivms/ApplicationLayer/Audit%20Report/auditlist.php">AUDIT</a></li>
  <li style="float:right"><a href="http://localhost/ivms/ApplicationLayer/GenerateReport/GenerateReport.php">REPORT</a></li>
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
          </div>
  </center>
</div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button class="btn active" type="submit">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>ITEM ID</th>
                                <th>ITEM NAME</th>
                                <th>UNIT PRICE (RM)</th>
                                <th>LOCATION</th>
                                <th>COMPANY NAME</th>
                                <th>COMPANY ADDRESS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","mydatabase");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT ItemID, itemName, unitPrice, location, companyName, companyAddress FROM inventory 
                                        WHERE CONCAT(ItemID, itemName, unitPrice, location, companyName, companyAddress) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                               <tr>
                                                <td><?= $row['ItemID'];?></td>
                                                <td><?= $row['itemName'];?></td>
				                                <td><?= $row['unitPrice'];?></td>
				                             	<td><?= $row['location'];?></td>
                                                <td><?= $row['companyName'];?></td>
				                            	<td><?= $row['companyAddress'];?></td>
                                              </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <div> 
<!--FOOTER-->
  <div style="margin-top:140px;" class="footer">
  <p style="color:white;margin-top:25px;">2022 &#169; BING'S CORP</p>
  </div>
</div>
</body>
</html>
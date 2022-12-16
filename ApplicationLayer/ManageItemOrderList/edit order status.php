<?php
require_once '../../BusinessServiceLayer/controller/itemorderlistController.php';

$edit = new itemorderlistController();	

	if(isset($_POST['edit']))
	{
  		$edit->edit();
	}
?>
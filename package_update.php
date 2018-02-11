<?php
$conn=mysqli_connect('localhost', 'root', 'mysql_password', 'spot');

$array_string= mysqli_real_escape_string(serialize($array));
mysqli_query("insert into table (column) values($array_string)",$conn);

	if(isset($_POST['Submit'])){
		

	//get the text data from the fields
	$package_name = trim(mysqli_real_escape_string($con, $_POST['package_name']));
	$place_list = trim(mysqli_real_escape_string($con, $_POST['place_list']));
	
	$new_place = json_encode($place_list);
	
	$sql = mysqli_query($con, "INSERT INTO package VALUES ('$package_name','$place_list')");

	
?>
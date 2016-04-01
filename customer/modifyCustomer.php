<?php
	// Updates a customer in the database. Returns false
	// if the update failed.
	function updateCustomer($con, $username, $updating)
	{

		$sql = "UPDATE CUSTOMER SET ";
		$emailSet = false;

		if(!empty($updating["email"]))
		{
			$sql .= "email='".$updating["email"]."'";
			$emailSet = true;
		}
		if(!empty($updating["password"]))
		{
			if($emailSet)
				$sql .= ",";
			$sql .= "password='".$updating["password"]."'";
		}

		$sql .= " WHERE username='$username'";

		$result = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) > 0)
			return true;
		else
			return false;
	}

	function deleteCustomer($con, $username)
	{
		$sql = "DELETE FROM CUSTOMER WHERE username='$username'";
		echo "<br>Query: $sql<br>";
		$result = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) > 0)
			return true;
		else
			return false;

	}

	function addCustomer($con, $username, $email, $password)
	{
		$sql = "INSERT INTO CUSTOMER (username, email, password) VALUES ('". $username."','". $email ."','".$password."')";
		if (!mysqli_query($con,$sql))
			return false;
		else
			return true;
	}
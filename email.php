<?php
	$email = $_POST['email'];

	// Database connection
	$conn = new mysqli('localhost','root','','email');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into email(email) 
        values(?)");
		$stmt->bind_param("s", $email);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
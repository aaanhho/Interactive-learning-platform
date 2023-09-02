<?php 
include_once "connect-to-sql.php";

if (isset($_POST['student_id'])) {
	$sql = "DELETE FROM attempts 
			WHERE student_id = '".$_POST['student_id']. "'";
	header('Content-type: application/json');
	
	if($connection->query($sql) === TRUE){
		echo json_encode(['is' => 'success', 'complete' => 'Success']);
	}
	else{
		echo json_encode(['is' => 'fails', 'uncomplete' => 'Unsuccess']);	
	}
}

?>
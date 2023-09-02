<?php
include_once "connect-to-sql.php";

if (isset($_POST['id'])){
    $sql = "UPDATE attempts 
            SET score = " . $_POST['score'] . 
            " WHERE id = " . $_POST['id'] . "";
    header('Content-type: application/json');
    
    if ($connection->query($sql) === TRUE){
        echo json_encode(['is' => 'success', 'complete' => 'Success']);
    }
    else {
        echo json_encode(['is' => 'fails', 'uncomplete' => 'Unsuccess']);	
    }
}
?>
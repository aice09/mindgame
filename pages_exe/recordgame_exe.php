<?php
include '../environment.php';
include '../config/database.php';

if (isset($_POST['gamestatus'])) {
    $score_userid = $_SESSION['system_userid'];
	$score_time = $_POST["timefinish"];
	$score_flips = $_POST["totalflips"];

	$score_dtcreated = $currentdate;
	$score_createdby =$_SESSION['system_userid'];


    //Insert Data
    $query = "INSERT INTO scores (score_userid, score_time, score_flips, score_dtcreated, score_createdby) VALUES ('$score_userid', '$score_time', '$score_flips', '$score_dtcreated', '$score_createdby')";
  
		$response = array();
	if (!$result = mysqli_query($db,$query)) {
        $response=mysqli_error($db);
    } else {
        $response = 'ok';
    }
    echo json_encode($response);	
}

//Read Selected Job Ticket
if (isset($_POST['read_selected'])) {
    $id=$_POST['crud_id'];
    
    $query = "SELECT * FROM scores
    WHERE score_id = '$id'";
    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    echo json_encode($response);
}

//Update
if (isset($_POST['update_btn'])) {
    $id=$_POST['pet_id'];
    $pet_code = $_POST["pet_code"];
    $pet_catid = $_POST["pet_catid"];
    $pet_name = $_POST["pet_name"];
    $pet_adopted = $_POST["pet_adopted"];
    $pet_adoptedfrom = $_POST["pet_adoptedfrom"];
    $pet_rescuedfrom = $_POST["pet_rescuedfrom"];
	$pet_birthday = $_POST["pet_birthday"];
	$pet_gender = $_POST["pet_gender"];
    $pet_processdate = $currentdate;
    $pet_processby = $_SESSION['system_userid'];
    $pet_status = $_POST["pet_status"];

    $query = "UPDATE pets SET pet_code = '$pet_code', pet_catid = '$pet_catid', pet_name = '$pet_name', pet_adopted = '$pet_adopted', pet_adoptedfrom = '$pet_adoptedfrom', pet_rescuedfrom = '$pet_rescuedfrom', pet_birthday = '$pet_birthday', pet_gender = '$pet_gender', pet_processdate = '$pet_processdate', pet_processby = '$pet_processby', pet_status = '$pet_status' WHERE pet_id = '$id'";

	if (!$result1 = mysqli_query($db,$query)) {
        exit(mysqli_error());
    }  
}

//Delete
if (isset($_POST["delete_selected"])) {
    /*
    Deleting a single record is done is not been implemented rather than we are changing the status to "Deleted" to keep the data hidden from the user.
    */

    $id=$_POST['crud_id'];
    $query = "UPDATE pets SET
    pet_status = 'Deleted'
    WHERE pet_id = '$id'";

    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    } 
}

//Permanently Delete
if (isset($_POST["permanent_delete_selected"])) {
    $id=$_POST['crud_id'];
    $query = "DELETE FROM pets WHERE pet_id = '$id'";

    if (!$result = mysqli_query($db,$query)) {
        exit(mysql_error());
    } 
}

?>
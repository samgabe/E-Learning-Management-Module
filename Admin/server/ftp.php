<?php
session_start();
header('Access-Control-Allow-Origin: http://localhost/');
header('Access-Control-Allow-Methods: POST');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'config/database.php'; 

if (empty($_POST)) {
    $_POST = json_decode(file_get_contents('php://input'), true) ? : [];
}

 if (isset($_POST['upload'])) {

    if(saved_2_db())
    { 
      $response = array('status' => 'success', 'code' => 200 );
    }else{
      $response = array('status' => 'failed', 'code'  => 400 );
    }   

    echo json_encode($response);
 }
  

function savefile(){
    
    $file = $_FILES['file']['name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $file_loc = $_FILES['file']['tmp_name'];
    $folder='../media/';  
    $new_file_name = md5(time().rand(1,999)).'.'.$ext; 

    if(move_uploaded_file($file_loc,$folder.$new_file_name))
    {
        $result=$new_file_name;
    }else{
        $result =  false;
    }
    /*
    *@ return bool on fail
    *@ return string <image name> on success
    */
    return $result; 
}

function saved_2_db(){
	$data   = $_POST ; 
    $location  = 'media';
    $lesson  = savefile();
    #

    $conn   = Database::getInstance();  

    //$sql = "INSERT INTO lessons VALUES ('$ltitle','$lcode','".$media."','$due-date','".$target_file."','$upload-date')";
	//"`ltitle`, `lcode`, `due-date`, `media`, `location`, `upload-date`"
    $query = 'INSERT INTO lessons  SET
				                       lcode      =:code,
				                       lesson     =:lesson,
				                       ltitle     =:title,
				                       due_date   =:duedate,
				                       location   =:location,
				                       upload_date=NOW()
             ';


    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':duedate',$data['date'] ); 
    $stmt->bindParam(':title',  $data['title']); 
    $stmt->bindParam(':code',  $data['code']);
    $stmt->bindParam(':location',$location);  
    $stmt->bindParam(':lesson', $lesson);
    $stmt->execute();
    //print_r($conn->errorInfo());
    return $stmt->execute();


}


?>
 
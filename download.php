<?php
     
if (isset($_GET['lid'])) {
  
     
    $filepath = 'Admin/media/' . $_GET['lid'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize( $filepath));
        readfile( $filepath);

        
        exit;
    }
    

}

?>

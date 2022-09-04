<!-- connection to DB -->
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "phpcrud";

    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connection Successsfully";
    }
    catch(PDOException $e) 
    {
        echo "Connection Failed" .$e->getMessage();
    }

?>
<!-- End connection to DB -->

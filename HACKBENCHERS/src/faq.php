<?php
$Name = $_POST['Name'];
// $password = $_POST['password'];
// $gender = $_POST['gender'];
$Email = $_POST['Email'];
$Ask= $_POST['Ask'];
// $phone = $_POST['phone'];
if (!empty($Name) || !empty($Email) || !empty($Ask)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "submit";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT Email From register Where Email = ? Limit 1";
     $INSERT = "INSERT Into register (Name, Email, Ask) values(?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $Name, $Email, $Ask);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
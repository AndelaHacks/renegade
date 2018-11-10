<?php
$PersonID = $_POST['PersonID'];
$FirstName = $_POST['FirstName'];
$Address = $_POST['Address'];
$City = $_POST['City'];

if (!empty($PersonID) || !empty($FirstName) || !empty($Address) || !empty($City)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "fake";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT Address From Persons Where Address = ? Limit 1";
     $INSERT = "INSERT Into Persons (PersonID, FirstName, Address, City) values(?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Address);
     $stmt->execute();
     $stmt->bind_result($Address);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $PersonID, $FirstName, $Address, $City);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this Address";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass= "";
$db = "lokesh";
$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$name = $_POST["name"];
$mail = $_POST["email"];
$mobile = $_POST["mobile"];
$password = $_POST["pass"];
$know = $_POST["know"];
$learn = $_POST["learn"];

$sql = "SELECT * FROM register WHERE phone = '$mobile'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
    echo '
  <script>
    alert("User Already Registered");
  </script>
  ';
}
else{
  $sql = "INSERT INTO register VALUES('$name','$password','$mail','$mobile','$know','$learn')";
  $result = mysqli_query($conn,$sql);
}
echo '
  <script>
    window.location = "index.html";
  </script>
';
?>

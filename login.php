<?php
session_start();
$mobile = $_POST["mobile"];
$password = $_POST["password"];
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass= "";
$db = "lokesh";
$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$db);

// Check connection
if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM register WHERE phone = '$mobile' AND password='$password'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	$_SESSION["mobile"] = $mobile;
}
else{
	echo '
		<script>
			alert("Invalid Login Credentiatls");
			window.location = "index.html";
		</script>
	';
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Juspay Sample</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link href="https://fonts.googleapis.com/css?family=Pacifico|Quicksand" rel="stylesheet">
		<link rel="stylesheet" href="awesomplete.css" />
		<script src="awesomplete.js" async></script>
		<script>
		$( function() {
		var input=document.getElementById("tags");
		new Awesomplete(input, {
		list:  [
		"ActionScript",
		"AppleScript",
		"Asp",
		"BASIC",
		"C",
		"C++",
		"Clojure",
		"COBOL",
		"ColdFusion",
		"Erlang",
		"Fortran",
		"Groovy",
		"Haskell",
		"Java",
		"JavaScript",
		"Lisp",
		"Perl",
		"PHP",
		"Python",
		"Ruby",
		"Scala",
		"Scheme"
		]});
  </script>
	</head>

	<style>
		body{
		font-family: 'Quicksand', sans-serif;
		background-image: url('bg.png');
		}
		h1{
		font-family: 'Pacifico', cursive;
		}
	</style>

	<body>
		<div class="w3-container">
			<h1 id="test3" class="w3-display-topmiddle w3-padding-64 w3-margin-top ">Welcome!</h1>
			<div class="w3-card-2 w3-black w3-round-large w3-opacity-min w3-display-middle w3-center" style="width:30%">
				<?php
            $mobile = $_SESSION["mobile"];
						$dbhost = 'localhost';
						$dbuser = 'root';
						$dbpass= "";
						$db = "lokesh";
						$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$db);
						// Check connection
						if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						}

						$sql = "SELECT * FROM register WHERE phone = '$mobile'";
						$result = mysqli_query($conn,$sql);
						if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
				$learn = $row["learn"];
				$know = $row["know"];
        echo "<p>People who can teach $learn : </p>";
    }
} else {
    echo "ERROR!";
}
$sql = "SELECT * FROM register WHERE know = '$learn'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
echo "" . $row["name"]. " - " . $row["phone"]. " - " . $row["email"]. "<br>";
}
} else {
echo "No one";
}

echo "<p>People who want to learn $know</p>";
$sql = "SELECT * FROM register WHERE learn = '$know'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
echo "" . $row["name"]. " - " . $row["phone"]. " - " . $row["email"]. "<br>";
}
} else {
echo "No one!";
}
session_destroy();

         ?>
			</div>
		</div>

	<script>
	function myFunction(id) {
    var x = document.getElementById(id);
    var y = document.getElementById('test1');
	var z = document.getElementById('test2');
	var w = document.getElementById('test3');
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        y.className += " w3-hide";
		z.className += " w3-hide";
		w.className += " w3-hide";
    } 	else {
        x.className = x.className.replace(" w3-show", "");
		}
	}
	</script>

	</body>

</html>

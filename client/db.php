<?php
$file = 'id.txt';
if(!is_file($file)){
    $contents = '1';
    file_put_contents($file, $contents);
}else{
    $contents = date("Y-m-d h:i:sa");
    file_put_contents($file, $contents);
}
echo file_get_contents($file).'<br />';

// $servername = "gveautomotive.com";
// $username = "gveautom_external";
// $password = "KeVg6riAMVMEBKP";
// $dbname = "gveautom_mykomunity";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gveasia.client";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM jobs ORDER BY no DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["no"]. " - Name: " . $row["fullname"]. " " . $row["ic_number"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();


?>

<?php
echo "<h2>Updating the database</h2>";

$bloodType = $_POST['bloodType'];
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phoneNumber = $_POST['phoneNumber'];

echo "First name: " . $fname . "<br>";
echo "Last name: " . $lname . "<br>";
echo "Blood Type: " . $bloodType . "<br>";
echo "Email: " . $email . "<br>";
echo "Phone number: " . $phoneNumber . "<br>";


//Connect to Database by including the connect.php module
include 'connect.php';

//INSERTING INTO DATABASE
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

//SQL query for inserting values into table
$sql = "INSERT INTO blooddonor (bloodType, email, fname, lname, phoneNumber)
VALUES ('$bloodType', '$email', '$fname', '$lname', '$phoneNumber')";

if ($conn->query($sql) === TRUE) {
        echo "<h3 style = \"color:blue\">New record created successfully</h3>";
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT fname, lname FROM blooddonor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
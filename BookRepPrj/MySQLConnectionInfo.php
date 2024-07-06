<!-- MySQLConnectionInfo.php -->
<?php
// MySQL database connection information
$host = 'localhost'; // Name of the server or Hostname
$database = 'dbswvszialjjpy'; // Name of the database
$username = 'uim9xestk46so'; // Username
$password = ')2]1@1%%(i3A'; // Password

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

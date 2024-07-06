<?php
include 'Header.php';
include 'Menu.php';
include 'MySQLConnectionInfo.php';

// Your PHP logic for handling the final update goes here
$host = 'localhost';
$username = 'ubefx31mqcyen';
$password = 'eug7n1krawjy';
$database = 'lab9webprogramming';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Check if the admin is logged in
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: Admin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use the PDO connection and validate the login credentials
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM Employee WHERE EmailAddress = ? AND AdminCode = 999");
        $stmt->execute([$email]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['Password'])) {
            // Valid admin login, store admin information in session
            $_SESSION['admin'] = $admin;

            // Continue with the page logic (handling the final update)
            
            // Retrieve the updated information from the form
            $newFirstName = $_POST['newFirstName'];
            $newLastName = $_POST['newLastName'];

            // Update the employee information in the database
            $updateStmt = $pdo->prepare("UPDATE Employee SET FirstName = ?, LastName = ? WHERE EmailAddress = ?");
            $updateStmt->execute([$newFirstName, $newLastName, $email]);

            // Display success message
            echo "<div style='margin: 20px;'>";
            echo "<h2>Update Complete</h2>";
            echo "<p style='color: green;'>Employee information updated successfully!</p>";
            echo "</div>";
        } else {
            $error = "Invalid email or password. Please try again.";
            header("Location: Admin.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<?php
include 'Footer.php';
?>

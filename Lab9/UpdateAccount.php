<?php
include 'Header.php';
include 'Menu.php';
include 'MySQLConnectionInfo.php';

// Your PHP logic for updating employee information goes here
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

            // Continue with the page logic (updating records)
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

<div style="margin: 20px;">
    <h2>Update Employee Account</h2>
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>

    <!-- Your HTML form for updating employee information goes here -->
    <form action="UpdateComplete.php" method="POST">
        <!-- Include the necessary form fields for updating employee information -->
        <label for="newFirstName">New First Name:</label>
        <input type="text" name="newFirstName" required><br>

        <label for="newLastName">New Last Name:</label>
        <input type="text" name="newLastName" required><br>

        <!-- Add more fields based on the information you want to update -->

        <input type="submit" value="Update Record">
    </form>
</div>

<?php
include 'Footer.php';
?>

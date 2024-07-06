<?php
include 'Header.php';
include 'Menu.php';
include 'MySQLConnectionInfo.php';

// Your PHP logic for selecting an account goes here
$host = 'localhost';
$username = 'ubefx31mqcyen';
$password = 'eug7n1krawjy';
$database = 'lab9webprogramming';
session_start();

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Check if the admin is logged in
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

            // Continue with the page logic (redirecting to SelectAccount.php or updating records)
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
    <h2>Select Employee Account</h2>
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
    <form action="UpdateAccount.php" method="POST">
        <label for="email">Employee Email Address:</label>
        <input type="email" name="email" required><br>

        <label for="password">Admin Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Select Employee">
    </form>
</div>

<?php
include 'Footer.php';
?>

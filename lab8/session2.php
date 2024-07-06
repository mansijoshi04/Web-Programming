<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store form data in session
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['telephone_number'] = $_POST['telephone_number'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['birth_day'] = $_POST['birth_day'];
    $_SESSION['occupation'] = $_POST['occupation'];
    $_SESSION['favorite_sport'] = $_POST['favorite_sport'];
}
?>

<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<section>
    <!-- Display the information from the session -->
    <h2>Session 2</h2>
    <div>
        <p><strong>First Name:</strong> <?php echo isset($_SESSION['first_name']) ? $_SESSION['first_name'] : ''; ?></p>
        <p><strong>Last Name:</strong> <?php echo isset($_SESSION['last_name']) ? $_SESSION['last_name'] : ''; ?></p>
        <p><strong>Telephone Number:</strong> <?php echo isset($_SESSION['telephone_number']) ? $_SESSION['telephone_number'] : ''; ?></p>
        <p><strong>Email:</strong> <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></p>
        <p><strong>Birth Day:</strong> <?php echo isset($_SESSION['birth_day']) ? $_SESSION['birth_day'] : ''; ?></p>
        <p><strong>Occupation:</strong> <?php echo isset($_SESSION['occupation']) ? $_SESSION['occupation'] : ''; ?></p>
        <p><strong>Favorite Sport:</strong> <?php echo isset($_SESSION['favorite_sport']) ? $_SESSION['favorite_sport'] : ''; ?></p>
    </div>
</section>

<?php include 'footer.php'; ?>

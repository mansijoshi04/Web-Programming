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

    // Redirect to Session2.php
    header("Location: session2.php");
    exit();
}
?>

<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<section>
    <!-- Left side form -->
    <br><form id="session1Form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="telephone_number">Telephone Number:</label>
        <input type="number" id="telephone_number" name="telephone_number" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="birth_day">Birth Day:</label>
        <input type="date" id="birth_day" name="birth_day" required><br><br>

        <label>Occupation:</label>
        
        <input type="radio" id="student" name="occupation" value="Student" required>
        <label for="student">Student</label>
        
        <input type="radio" id="doctor" name="occupation" value="Doctor" required>
        <label for="doctor">Doctor</label>
       
        <input type="radio" id="farmer" name="occupation" value="Farmer" required>
        <label for="farmer">Farmer</label>
        
        <input type="radio" id="engineer" name="occupation" value="Engineer" required>
        <label for="engineer">Engineer</label><br><br>

        <label for="favorite_sport">Favorite Sport:</label>
        <select id="favorite_sport" name="favorite_sport" required>
            <option value="Hockey">Hockey</option>
            <option value="Football">Football</option>
            <option value="Carling">Carling</option>
            <option value="Tennis">Tennis</option>
        </select><br>

        <button type="submit">Submit</button>
    </form>

</section>



<?php include 'footer.php'; ?>

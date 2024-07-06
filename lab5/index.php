<?php
include('header.php');?>
<?php
include('menu.php');
?>

<div style="margin-left: 240px; padding: 20px;">
    <?php
    // Variables
    $firstName = "Mansi";
    $lastName = "Joshi";

    // Constants
    define('STUDENT_NUMBER', '041091664');

    // Concatenated text
    $concatenatedText = "Hello World!! " . "This is the first time I am using PHP!!";

    // Display content
    echo "<h3 style='color: green;'>Your first name: $firstName</h3>";
    echo "<h3 style='color: green;'>Your last name: $lastName</h3>";
    echo "<h3 style='color: green;'>Student number: " . STUDENT_NUMBER . "</h3>";
    echo "<h3 style='color: green;'>Concatenated text: $concatenatedText</h3>";
    echo "<h3 style='color: green;'>Length of concatenated text: $concatenatedText is: " . strlen($concatenatedText) . "</h3>";
    echo "<h3 style='color: green;'>Position of 'PHP' in concatenated text: $concatenatedText is: " . strpos($concatenatedText, 'PHP') . "</h3>";
    ?>
</div>

<?php
// Include footer
include('footer.php');
?>

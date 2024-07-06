<?php
include 'header.php'; // Include the common header
include 'menu.php';   // Include the common menu

// Task 3: Create arrays for currencies and exchange rates
$currencies = [
    "CAD" => "Canadian Dollar",
    "NZD" => "New Zealand Dollar",
    "USD" => "US Dollar"
];

$rates = [
    "CAD" => 0.97645,
    "NZD" => 1.20642,
    "USD" => 1.0
];

echo "<h1>Currency Converter</h1>";

echo "<form method='post'>";
echo "Convert <input type='text' name='srcamt'>";
echo "<select name='basecurr'>";
foreach ($currencies as $code => $name) {
    echo "<option value='$code'>$name</option>";
}
echo "</select>";
echo "to <select name='destcurr'>";
foreach ($currencies as $code => $name) {
    echo "<option value='$code'>$name</option>";
}
echo "</select>";
echo "<input type='submit' value='Do It!'>";
echo "</form>";

if (isset($_POST['srcamt'])) {
    $amount_input = $_POST['srcamt'];
    $basecurr = $_POST['basecurr'];
    $destcurr = $_POST['destcurr'];

    //Perform currency conversion
    $converted_output = ($amount_input / $rates[$basecurr]) * $rates[$destcurr];
    
    echo "<br><strong style='font-size: 20px;'>Conversion Results</strong><br></div>";
    echo "Convert $amount_input " . $currencies[$basecurr] . " to " . $currencies[$destcurr] . ": ";
    echo number_format($converted_output, 2); // Format the result to two decimal places
    echo "</div>";
}

include 'footer.php'; // Include the common footer
?>

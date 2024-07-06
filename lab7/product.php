<?php
include 'header.php'; // Include the common header
include 'menu.php';   // Include the common menu


// Sub-Task 1: Create a multidimensional associative array called '$Product'
$Product = [
    "Category" => [
        "Printer" => [
            [
                "Brand" => "Epson",
                "Quantity" => 100,
                "Price" => 2500
            ],
            [
                "Brand" => "Canon",
                "Quantity" => 100,
                "Price" => 3000
            ],
            [
                "Brand" => "Xerox",
                "Quantity" => 500,
                "Price" => 2000
            ]
        ],
        "Laptop" => [
            [
                "Brand" => "Apple",
                "Quantity" => 200,
                "Price" => 2000
            ],
            [
                "Brand" => "HP",
                "Quantity" => 300,
                "Price" => 1500
            ],
            [
                "Brand" => "Toshiba",
                "Quantity" => 100,
                "Price" => 1200
            ]
        ],
        "TV" => [
            [
                "Brand" => "Samsung",
                "Quantity" => 500,
                "Price" => 1200
            ],
            [
                "Brand" => "LG",
                "Quantity" => 500,
                "Price" => 1050
            ],
            [
                "Brand" => "Sony",
                "Quantity" => 200,
                "Price" => 1000
            ]
        ]
    ]
];

echo "<h1>Product Information</h1>";

// Sub-Task 2: Display the structure of the '$Product' array with breaks, no spaces
echo "<h2>Sub-Task 2: Display the Structure of the 'Product' Array</h2>";
echo "<pre>";
echo "array(3) {";
echo "<br>  [\"Category\"] => array(3) {";
foreach ($Product["Category"] as $category => $brands) {
    echo "<br>    [\"$category\"] => array(" . count($brands) . ") {";
    foreach ($brands as $brand) {
        echo "<br>      [\"Brand\"] => string(" . strlen($brand['Brand']) . ") \"" . $brand['Brand'] . "\"";
        echo "<br>      [\"Quantity\"] => int(" . $brand['Quantity'] . ")";
        echo "<br>      [\"Price\"] => int(" . $brand['Price'] . ")";
    }
    echo "<br>    }";
}
echo "<br>  }";
echo "<br>}";
echo "</pre>";

// Sub-Task 3: Display the elements of the 'Product' array with each brand in a different row
echo "<h2>Sub-Task 3: Display the Elements of the 'Product' Array</h2>";
echo "<table>";

foreach ($Product["Category"] as $category => $brands) {
    echo "<tr>";
    echo "<td><u>$category</u></td>";
    echo "</tr>";
    
    foreach ($brands as $brand) {
        echo "<tr>";
        echo "<td>Brand: {$brand['Brand']}</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Quantity: {$brand['Quantity']}</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Price: {$brand['Price']}</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><br></td>"; // Add a line break after the price
        echo "</tr>";
    }
}
echo "</table>";
// Sub-Task 4: Display the elements of the 'Product' array in a table format with borders
echo "<h2>Sub-Task 4: Display the Elements of the 'Product' Array in a Table</h2>";
echo "<table border='1'>";
echo "<tr><th>Category</th><th>Brand</th><th>Quantity</th><th>Price</th></tr>";
$categoryPrinted = false;

foreach ($Product["Category"] as $category => $brands) {
    foreach ($brands as $brand) {
        echo "<tr>";
        if (!$categoryPrinted) {
            echo "<td rowspan='" . count($brands) . "'>$category</td>";
            $categoryPrinted = true;
        }
        echo "<td>{$brand['Brand']}</td>";
        echo "<td>{$brand['Quantity']}</td>";
        echo "<td>{$brand['Price']}</td>";
        echo "</tr>";
    }
    $categoryPrinted = false; // Reset the flag for the next category
}

echo "</table>";
include 'footer.php'; // Include the common footer
?>

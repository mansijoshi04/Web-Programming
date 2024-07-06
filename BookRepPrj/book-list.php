<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">   

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap theme CSS -->
   <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>

<?php 
// Include the MySQL connection file
include 'includes/book-header.inc.php'; 
include 'MySQLConnectionInfo.php'; 

// Fetch customers from the database
$sql = "SELECT * FROM Customers";  
    // Check for sorting parameters in the query string
    $sortColumn = isset($_GET['sortColumn']) ? $_GET['sortColumn'] : 'FirstName';
    $sortDirection = isset($_GET['sortDirection']) ? $_GET['sortDirection'] : 'asc';


    // Check for search parameter
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $conn->real_escape_string($_GET['search']);
        $sql .= " WHERE FirstName LIKE '%$search%' OR LastName LIKE '%$search%' OR Email LIKE '%$search%'";
    }

  
    // Apply sorting to the SQL query
    $sql .= " ORDER BY $sortColumn $sortDirection";
    
    $result = $conn->query($sql);
    ?>

    <!-- ... (your HTML code remains unchanged) ... -->

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?php include 'includes/book-left-nav.inc.php'; ?>
            </div>

            <div class="col-md-8">
                <div class="panel panel-danger spaceabove">
                    <div class="panel-heading">
                        <h4>My Customers</h4>
                    </div>

                    <?php
                    // Check if there are rows in the result set
                    if (!$result) {
                        // Query failed, display error message
                        die("Query failed: " . $conn->error);
                    } else {
                        // Check if there are rows in the result set
                        if ($result->num_rows > 0) {
                    ?>
                            <table class="table">
                                <tr>
                                    <th><a href="?sortColumn=FirstName&sortDirection=<?php echo ($sortColumn == 'FirstName' && $sortDirection == 'asc') ? 'desc' : 'asc'; ?>&search=<?php echo urlencode($_GET['search']); ?>">Name <?php echo ($sortColumn == 'FirstName') ? ($sortDirection == 'asc' ? '&#x25B2;' : '&#x25BC;') : ''; ?></a></th>
                                    <th><a href="?sortColumn=Email&sortDirection=<?php echo ($sortColumn == 'Email' && $sortDirection == 'asc') ? 'desc' : 'asc'; ?>&search=<?php echo urlencode($_GET['search']); ?>">Email <?php echo ($sortColumn == 'Email') ? ($sortDirection == 'asc' ? '&#x25B2;' : '&#x25BC;') : ''; ?></a></th>
                                    <th><a href="?sortColumn=Address&sortDirection=<?php echo ($sortColumn == 'Address' && $sortDirection == 'asc') ? 'desc' : 'asc'; ?>&search=<?php echo urlencode($_GET['search']); ?>">Address <?php echo ($sortColumn == 'Address') ? ($sortDirection == 'asc' ? '&#x25B2;' : '&#x25BC;') : ''; ?></a></th>
                                    <th><a href="?sortColumn=City&sortDirection=<?php echo ($sortColumn == 'City' && $sortDirection == 'asc') ? 'desc' : 'asc'; ?>&search=<?php echo urlencode($_GET['search']); ?>">City <?php echo ($sortColumn == 'City') ? ($sortDirection == 'asc' ? '&#x25B2;' : '&#x25BC;') : ''; ?></a></th>
                                    <th><a href="?sortColumn=Country&sortDirection=<?php echo ($sortColumn == 'Country' && $sortDirection == 'asc') ? 'desc' : 'asc'; ?>&search=<?php echo urlencode($_GET['search']); ?>">Country <?php echo ($sortColumn == 'Country') ? ($sortDirection == 'asc' ? '&#x25B2;' : '&#x25BC;') : ''; ?></a></th>
                                </tr>

                                <?php
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["firstName"] . " " . $row["lastName"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["address"] . "</td>";
                                    echo "<td>" . $row["city"] . "</td>";
                                    echo "<td>" . $row["country"] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        <?php
                        } else {
                            // No data found
                            echo "<p>No customers found.</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Close the database connection
    $conn->close();
    ?>

<!-- Include your Bootstrap and JavaScript files here -->
<script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
<script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>

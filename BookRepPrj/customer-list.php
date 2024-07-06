<?php
include 'MySQLConnectionInfo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template - Customer List</title>

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
include 'includes/book-header.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <?php include 'includes/book-left-nav.inc.php'; ?>
        </div>

        <div class="col-md-10">
            <!-- Customer List Panel -->
            <div class="panel panel-danger spaceabove">           
                <div class="panel-heading"><h4>Customers</h4></div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Country</th>
                        </tr>

                        <?php
                        // Fetch and display customers
                        $sql = "SELECT * FROM customers";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($customer = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$customer['first_name']}</td>
                                        <td>{$customer['last_name']}</td>
                                        <td>{$customer['email']}</td>
                                        <td>{$customer['address']}</td>
                                        <td>{$customer['city']}</td>
                                        <td>{$customer['country']}</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No customers found.</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include your Bootstrap and JavaScript files here -->
<script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
<script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Chessboard</title>
    <style>
        /* Define styles for black and white squares */
        .chessboard {
            display: grid;
            grid-template-columns: repeat(8, 50px); /* Adjust the size of the grid squares as needed */
            grid-template-rows: repeat(8, 50px); /* Adjust the size of the grid squares as needed */
            margin: 20px auto; /* Center the chessboard */
            border: 2px solid #000; /* Add a border around the chessboard */
            width: 400px; /* Adjust the width to fit the size of the chessboard */
            box-shadow: 2px 2px 5px #888; /* Add a shadow effect */
        }
        .white {
            background-color: white;
        }
        .black {
            background-color: black;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'menu.php'; ?> 

    <div class="chessboard">
        <?php
        /*Logic to draw a chessboard pattern*/
        $isBlack = false;

        for ($row = 0; $row < 8; $row++) {
            for ($col = 0; $col < 8; $col++) {
                $isBlack = !$isBlack; /*Alternate between black and white squares*/
                $colorClass = $isBlack ? 'black' : 'white';
                echo '<div class="' . $colorClass . '"></div>';
            }
            $isBlack = !$isBlack; /*Start the next row with the opposite color*/  
        }
        ?>
    </div>

   <?php include 'footer.php'; ?>
</body>
</html>

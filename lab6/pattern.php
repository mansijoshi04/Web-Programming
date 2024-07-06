<!DOCTYPE html>
<html>
<head>
    <title>Pattern</title>
</head>
<body>
    <?php include 'header.php'; ?> 
    <?php include 'menu.php'; ?>   

    <div class="pattern">
        <?php
        /*Loop to draw the specified pattern*/
        for ($i = 10; $i >= 1; $i--) {
            for ($j = 1; $j <= $i; $j++) {
                if ($i % 2 == 0) {
                    echo '$';
                } else {
                    echo '*';
                }
            }
            echo '<br>';
        }
        ?>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>

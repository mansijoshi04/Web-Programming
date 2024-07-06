<!DOCTYPE html>
<html>
<head>
    <title>Random Number Generator</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php include 'menu.php'; ?> 

    <div class="random-generator">
        <?php
        /* Generate and categorize random numbers*/
        $ranges = array(
            "01 - 10" => array(1, 10),
            "11 - 20" => array(11, 20),
            "21 - 30" => array(21, 30),
            "31 - 40" => array(31, 40),
            "41 - 50" => array(41, 50)
        );
        
        $rangeCounts = array();
        
        for ($i = 0; $i < 500; $i++) {
            $randomNumber = rand(1, 50);
            
            foreach ($ranges as $rangeName => $range) {
                if ($randomNumber >= $range[0] && $randomNumber <= $range[1]) {
                    if (!isset($rangeCounts[$rangeName])) {
                        $rangeCounts[$rangeName] = 0;
                    }
                    $rangeCounts[$rangeName]++;
                }
            }
        }

        /* Sort the array by range name*/
        ksort($rangeCounts);
        
        /* Display results*/
        foreach ($rangeCounts as $rangeName => $count) {
            echo $count . " numbers are randomly generated in the range between " . $rangeName . "<br>";
        }
        
        
        echo("<br>Histogram of stars as a percentage of the number of values are displayed below<br>");
        /* Display histogram of stars*/
        echo '<div class="histogram">';
        foreach ($rangeCounts as $rangeName => $count) {
            echo $rangeName . ': ';
            for ($i = 0; $i < ($count / 10); $i++) {
                echo "*";
            }
            echo "<br>";
        }
        echo '</div>';
        ?>
    </div>

    <?php include 'footer.php'; ?> 
</body>
</html>

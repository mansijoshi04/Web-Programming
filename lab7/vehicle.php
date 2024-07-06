<?php
include 'header.php'; // Include the common header
include 'menu.php';   // Include the common menu

// Task 6: Define an interface Vehicle
interface Vehicle {
    public function displayVehicleInfo();
}

// Task 7: Define a class LandVehicle that implements the Vehicle interface
class LandVehicle implements Vehicle {
    protected $make;
    protected $model;
    protected $year;
    protected $price;

    public function __construct($make, $model, $year, $price) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;
    }

    public function displayVehicleInfo() {
        echo "Make: $this->make, Model: $this->model, Year: $this->year, Price: $this->price, ";
    }
}

// Task 8: Define a derived class Car that inherits from LandVehicle
class Car extends LandVehicle {
    private $speedLimit;

    public function __construct($make, $model, $year, $price, $speedLimit) {
        parent::__construct($make, $model, $year, $price);
        $this->speedLimit = $speedLimit;
    }

    public function displayVehicleInfo() {
        parent::displayVehicleInfo();
        echo "Speed Limit: $this->speedLimit<br>";
    }
}

// Task 9: Define a class WaterVehicle that implements the Vehicle interface
class WaterVehicle implements Vehicle {
    protected $make;
    protected $model;
    protected $year;
    protected $price;

    public function __construct($make, $model, $year, $price) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;
    }

    public function displayVehicleInfo() {
        echo "Make: $this->make, Model: $this->model, Year: $this->year, Price: $this->price, ";
    }
}

// Task 10: Define a derived class Boat that inherits from WaterVehicle
class Boat extends WaterVehicle {
    private $boatCapacity;

    public function __construct($make, $model, $year, $price, $boatCapacity) {
        parent::__construct($make, $model, $year, $price);
        $this->boatCapacity = $boatCapacity;
    }

    public function displayVehicleInfo() {
        parent::displayVehicleInfo();
        echo "Boat Capacity: $this->boatCapacity<br>";
    }
}

echo "<h1>Vehicle Page</h1>";

// Task 11: Instantiate objects and display their properties
echo "<h2>Cars</h2>";
$car1 = new Car("Toyota", "Camry", 2022, 25000, 120);
$car2 = new Car("Honda", "Civic", 2023, 23000, 110);
$car1->displayVehicleInfo();
$car2->displayVehicleInfo();

echo "<h2>Boats</h2>";
$boat1 = new Boat("Sea Ray", "SRX 210", 2021, 35000, 8);
$boat2 = new Boat("Bayliner", "Element E16", 2022, 28000, 6);
$boat1->displayVehicleInfo();
$boat2->displayVehicleInfo();

include 'footer.php'; // Include the common footer
?>

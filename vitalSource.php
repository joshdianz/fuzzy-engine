<html>
    <head>
        <title>title</title>
        <link rel="shortcut icon" type="image/jpg" href="Favicon_Image_Location"/>
    </head>
    <body>

    </body>
</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product {

    private $description;

    private $price;

    private $inventory;

    private $onsale;

 

    public function __construct($name, $cost, $quantity, $sale) {

        $this->description = $name;

        $this->onsale = $sale;

        if ($cost < 0) {

            $this->price = 0;

        } else {

            $this->price = $cost;

        }

        if ($quantity < 0) {

            $this->inventory = 0;

        } else {

            $this->inventory = $quantity;

        }

    }

 

    public function __set($name, $value) {

        if ($name == "price" && $value < 0) {

            echo "<p>Invalid price set<p>\n";

            $this->price = 0;

        } elseif ($name == "inventory" && $value < 0) {

            echo "<p>Invalid inventory set: $value</p>\n";

        } else {

            $this->$name = $value;

        }

    }

 

    public function __get($name) {

        return $this->$name;

    }

 

    public function __clone() {

        $this->price = 0;

        $this->inventory = 0;

        $this->onsale = false;

    }

 

    public function __toString() {

        $output = "<p>Product: " . $this->description . "<br>\n";

        $output .= "Price: $" . number_format($this->price,2) . "<br>\n";

        $output .= "Inventory: " . $this->inventory . "<br>\n";

        $output .= "On sale: ";

        if ($this->onsale) {

            $output .= "Yes</p>\n";

        } else {

            $output .= "No</p>\n";

        }

        return $output;

}

    public function buyProduct($amount) {

        if ($this->inventory >= $amount) {

            $this->inventory -= $amount;

        } else {

            echo "<p>Sorry, invalid inventory requested:

                $amount</p>\n";

            echo "<p>There are only $this->inventory

                left</p>\n";

        }

    }

 

    public function putonsale() {

        $this->onsale = true;

    }

    public function takeoffsale() {

        $this->onsale = false;

    }

}

?>

Save the file as Product.inc.php (note the capitalization) in the DocumentRoot folder for your web server.
Open a new tab or window in your editor and type the following code:
<!DOCTYPE html>

<html>

<head>

<title>PHP Total OOP Test</title> 

</head>

<body>

<h1>Testing the PHP class</h1>

<?php

 

spl_autoload_register(function($class) {

    include $class . ".inc.php";

});

 

$prod1 = new Product("Carrots", 4.00, 10, false);

echo "<p>Creating one product:</p>\n";

echo $prod1;

 

$prod2 = new Product("Eggplant", 2.00, 5, true);

echo "<p>Creating one product:</p>\n";

echo $prod2;
?>

<?php
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>


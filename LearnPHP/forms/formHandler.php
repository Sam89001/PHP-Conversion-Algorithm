<?php
// No closing tag for a pure PHP file

// Security to prevent people accessing without permission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Security to make sure data sent isn't code
  $tshirtType = htmlspecialchars($_POST["tshirtType"]);
  $quantity = htmlspecialchars($_POST["quantity"]);
  $colour = htmlspecialchars($_POST["colour"]);
  $size = htmlspecialchars($_POST["size"]);

  // Checks if empty or is not valid
  if (empty($tshirtType) || empty($quantity) || empty($colour) || empty($size)) {
    echo "Fields must be populated.";
  } elseif (!is_numeric($quantity)) {
      echo "Quantity must be a number.";
  } 

  // Converts for string, ready for sort
  $orderString = "product_name: $tshirtType; quantity: $quantity; colour: $colour; size: $size";

  $unSortedOrderArray = [$orderString, $orderString, $orderString];
  
  stringToArraySort($unSortedOrderArray);

} else {
  // Redirects to base page upon unvalidated entry
  header("Location: ../index.php");
}

function stringToArraySort($unSortedOrderArray) {
  foreach ($unSortedOrderArray as $orderString) {
    $orderStringArray = explode(';', $orderString);
    $orderArray = [];

    foreach ($orderStringArray as $item) {
        $item = trim($item);
        $splitColon = explode(':', $item, 2);
        $orderArray[trim($splitColon[0])] = trim($splitColon[1]);
    }
    
    
    print_r($orderArray); 
    echo "<br>";
  }
}

 
  


<?php
// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($category_id == null || $category_id == false ||
        $code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database Part 7
    $sql = "INSERT INTO products ";
    $sql .= "(categoryID, productCode, productName, listPrice) ";
    $sql .= "VALUES (";
    $sql .= "'" . $category_id . "', ";
    $sql .= "'" . $code . "', ";
    $sql .= "'" . $name . "', ";
    $sql .= "'" . $price . "'";
    $sql .= ")";
    $pro_result = mysqli_query($db, $sql);

    // Display the Product List page Part 7
    if($pro_result) {
        //redirect to main index page
        header("Location: index.php");
    } else {
        //INSERT failed, redirect to error page
        header("Location: error.php");
    }
}
?>
<?php
//Add edit product page Part 9
// Get the product data
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
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

    // Edit the product in the database Part 7
    $sql = "UPDATE products SET ";
    $sql .= "categoryID='" . $category_id . "', ";
    $sql .= "productCode='" . $code . "', ";
    $sql .= "productName='" . $name . "', ";
    $sql .= "listPrice='" . $price . "' ";
    $sql .= "WHERE productID='" . $product_id . "' ";
    $sql .= "LIMIT 1";
    $ed_result = mysqli_query($db, $sql);

    // Display the Product List page Part 7
    if($ed_result) {
        //redirect to main index page
        header("Location: index.php");
    } else {
        //UPDATE failed, redirect to error page
        header("Location: error.php");
    }
}
?>
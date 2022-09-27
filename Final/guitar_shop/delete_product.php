<?php
require_once('database.php');
// Get IDs
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database Part 8
$sql = "DELETE FROM products ";
$sql .= "WHERE productID='" . $product_id . "' ";
$sql .= "AND categoryID='" . $category_id . "' ";
$sql .= "LIMIT 1";
$del_result = mysqli_query($db, $sql);
//For DELETE statements, result is true/false

// Display the Product List page Part 8
if($del_result) {
    //redirect to main index page
    header("Location: index.php");
} else {
    //Delete failed, redirect to error page
    header("Location: error.php");
}
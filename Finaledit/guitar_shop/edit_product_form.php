<?php
    require_once('database.php');
//Add edit product form page Part 9
    //Bring in both id's from index page
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    //Get Categories from the Database
    $sql = "SELECT * FROM categories";
    $categories = mysqli_query($db, $sql);
    //Get all product information that matches selected product/category
    $sql = "SELECT * FROM products WHERE productID='" . htmlspecialchars($product_id) . "' ";
    $sql .= "AND categoryID='" . htmlspecialchars($category_id) . "'";
    $result = mysqli_query($db, $sql);
    $product = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Edit Product</h1>
        <form action="edit_product.php" method="post"
              id="edit_product_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            <label>Code:</label>
            <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
            <input type="text" name="code" value="<?php echo $product['productCode']; ?>"><br>

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $product['productName']; ?>"><br>

            <label>List Price:</label>
            <input type="text" name="price" value="<?php echo $product['listPrice']; ?>"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Edit Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>

<?php
    db_disconnect($db); //disconnect from database
?>
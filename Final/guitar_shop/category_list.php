<?php
    require_once('database.php');
// Get all categories Part 4
    $sql = "SELECT * FROM categories";
    $categories = mysqli_query($db, $sql);
?>

<!-- Handle form value for adding a category Part 5-->
<?php
    $categoryName = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $categoryName = $_POST['categoryName'] ?? '';

        //CODE TO SUBMIT TO DATABASE
        $sql = "INSERT INTO categories ";
        $sql .= "(categoryName) ";
        $sql .= "VALUES (";
        $sql .= "'" . $categoryName . "'";
        $sql .= ")";
        $cat_result = mysqli_query($db, $sql);
        //For INSERT result is true/false
        if($cat_result) {
            //reload page with new category in table
            header("Location: category_list.php");
        } else {
            //INSERT failed, redirect to error page
            header("Location: error.php");
        }
    }
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        
        <!-- add code for the rest of the table here Part 4-->
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo $category['categoryName']; ?></td>
            </tr>
        <?php endforeach; ?>
    
    </table>

    <h2>Add Category</h2>
    
    <!-- add code for the form here Part 4-->
    <form action="category_list.php" method="post">
        <label for="cat_Name">Category Name:</label>
        <input type="text" id="cat_Name" name="categoryName"
            value="">
        <input type="submit" value="Add">
    </form>
    
    <br>
    <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>

<?php
    db_disconnect($db); //disconnect from database
?>
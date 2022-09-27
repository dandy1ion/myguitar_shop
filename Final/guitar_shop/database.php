<?php
ob_start();//output buffering turned on
//Create database connection Part 2
// Credentials
define("DB_SERVER", "localhost");
define("DB_USER", "webuser1");
define("DB_PASS", "pa55word2");
define("DB_NAME", "my_guitar_shop1");

//connect to database
function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}

//call function to connect to database and assign to variable for use on pages
$db = db_connect();

if (!isset($db)) {
    //redirect to database_error.php if connection doesn't work
    header("Location: database_error.php");
    exit;
}

//close the database connection
function db_disconnect($db) {
    if(isset($db)) {
    mysqli_close($db);
    }
}

//make sure query returned result set
function confirm_result_set($result_set) {
    if (!$result_set) {
        exit("Database query failed.");
    }
}

?>
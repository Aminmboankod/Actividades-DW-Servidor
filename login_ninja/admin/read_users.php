<?php
// core configuration
include_once "../configuration/configuration.php";
// check if logged in as admin
include_once "./configuration/login_checker.php";
// include classes
include_once '../classes/DatabaseConnection.php';
include_once '../objects/user.php';
// get database connection
$db = DatabaseConnection::getInstance();
// initialize objects
$user = new User($db);
// set page title
$page_title = "Users";
// include page header HTML
include_once "./layout_head.php";
echo "<div class='col-md-12'>";
    // read all users from the database
    $stmt = $user->readAll($from_record_num, $records_per_page);
    // count retrieved users
    $num = $stmt->rowCount();
    // to identify page for paging
    $page_url="read_users.php?";
    // include products table HTML template
    include_once "../templates/read_users_template.php";
echo "</div>";
// include page footer HTML
include_once "layout_foot.php";
?>
<?php
require_once'..\Log in\config.php';
function display_data()
{
    global $conn;
    $query = "SELECT * FROM user_form";
    $result = mysqli_query($conn,$query);
    return $result;
}
?>
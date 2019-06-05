<?php
    // Connecting to the database
$conn = new mysqli('localhost', 'root', '', 'staff_profile');
if(!$conn){
    echo "not connected";
}
?>
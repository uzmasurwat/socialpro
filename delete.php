<?php

include_once "autoload.php";

$delete_id = $_GET['delete_id'];

connect() ->query("DELETE FROM students WHERE id='$delete_id'");

header("location: index.php");


?>
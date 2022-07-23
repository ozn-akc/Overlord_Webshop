<?php
const DB_HOST = "localhost";
const DB_NAME = "webeng";
const DB_USER = "root";
const DB_PASSWORD = "";

$my_db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("DB not available");

?>
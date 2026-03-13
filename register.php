<?php
$conn = new mysqli("localhost","root","","expense_manager");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users(username,password) VALUES('$username','$password')";
$conn->query($sql);

header("Location: login.html");
?>
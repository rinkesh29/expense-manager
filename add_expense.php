<?php

$conn = new mysqli("localhost","root","","expense_manager");

$title = $_POST['title'];
$amount = $_POST['amount'];

$conn->query("INSERT INTO expenses(title,amount) VALUES('$title','$amount')");

header("Location: dashboard.php");

?>
<?php

$conn = new mysqli("localhost","root","","expense_manager");

$result = $conn->query("SELECT * FROM expenses");

$data = [];

while($row = $result->fetch_assoc()){
    $data[] = $row;
}

echo json_encode($data);

?>
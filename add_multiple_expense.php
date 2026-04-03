<?php
session_start();

/* Redirect if not logged in */
if(!isset($_SESSION['user'])){
    header("Location: login.html");
    exit;
}

$conn = new mysqli("localhost","root","","expense_manager");

/* Handle multiple expenses form */
if(isset($_POST['add_multiple'])){
    $titles = $_POST['title'];
    $amounts = $_POST['amount'];

    for($i=0; $i<count($titles); $i++){
        $t = $titles[$i];
        $a = $amounts[$i];

        if($t != "" && $a != ""){
            $conn->query("INSERT INTO expenses(title,amount) VALUES('$t','$a')");
        }
    }
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z63CMZ9Y88"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z63CMZ9Y88');
</script>
    <title>Add Multiple Expenses</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Add Multiple Expenses</h2>

<form method="POST">

<table border="1">
<tr>
<th>Expense Name</th>
<th>Amount</th>
</tr>

<tr>
<td><input type="text" name="title[]"></td>
<td><input type="number" name="amount[]"></td>
</tr>

<tr>
<td><input type="text" name="title[]"></td>
<td><input type="number" name="amount[]"></td>
</tr>

<tr>
<td><input type="text" name="title[]"></td>
<td><input type="number" name="amount[]"></td>
</tr>

</table><br>

<button type="submit" name="add_multiple">Add All Expenses</button>
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</div>
</body>
</html>

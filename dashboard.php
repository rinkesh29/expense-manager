<?php
session_start();

/* Redirect if not logged in */
if(!isset($_SESSION['user'])){
    header("Location: login.html");
    exit;
}

$conn = new mysqli("localhost","root","","expense_manager");

/* Handle single expense form */
if(isset($_POST['add_single'])){
    $title = $_POST['title'];
    $amount = $_POST['amount'];

    if($title != "" && $amount != ""){
        $conn->query("INSERT INTO expenses(title,amount) VALUES('$title','$amount')");
    }
}

/* Fetch expenses */
$result = $conn->query("SELECT * FROM expenses");
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Welcome <?php echo $_SESSION['user']; ?></h2>

<div style="text-align:center; margin-bottom:20px;">
    <a href="about.html">About</a> | 
    <a href="add_multiple_expense.php">Add Multiple Expenses</a> |
    <a href="logout.php">Logout</a>
</div>

<hr>

<!-- Single Expense Form -->
<h3>Add Single Expense</h3>
<form method="POST">
    Expense Name:<br>
    <input type="text" name="title" required><br>
    Amount:<br>
    <input type="number" name="amount" required><br><br>
    <button type="submit" name="add_single">Add Expense</button>
</form>

<hr>

<!-- Expense List -->
<h3>Expense List</h3>
<table border="1">
<tr>
<th>ID</th>
<th>Expense</th>
<th>Amount</th>
</tr>

<?php
while($row = $result->fetch_assoc()){
    $total += $row['amount'];
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['title']."</td>";
    echo "<td>₹".$row['amount']."</td>";
    echo "</tr>";
}
?>
</table>

<h3>Total Expense: ₹<?php echo $total; ?></h3>

</div>
</body>
</html>
<?php 
include("connection.php");

$query="select * from orders";
$result=mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Management</title>
    <link rel="stylesheet" href="main_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <style>
        .h2{
            position:absolute;
            bottom:400px;
            right:260px;
            font-size:40px;
            }
        .ordertable{
            position:absolute;
            top:330px;
            right:150px;
            font-size:19px;
            border-collapse:collapse;
        }
        .ordertable th, .ordertable td{
            border:2px solid white;
            padding:4px 20px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="left">
            <img src="background/logo.png">
        </div>

        <div class="center">
            Mess Master
        </div>

        <div class="right">
            <button title="Contact Us" class="btn" id="contact"> </button>
            <button title="Help" class="btn1" id="help"> </button>
        </div>
    </header>

    <h2 class="h2">Placed Orders:</h2>
    <table class="ordertable">
        <tr>
            <th>Order id</th>
            <th>User id</th>
            <th>Category</th>
            <th>Item name</th>
        </tr>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["orderid"] . "</td>";
                echo "<td>" . $row["userid"] . "</td>";
                echo "<td>" . $row["category"] . "</td>";
                echo "<td>" . $row["item"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results found</td></tr>";
        }
        ?>

    </table>

    <script>
        document.getElementById("contact").addEventListener("click", function () { window.location.href = "contact_us.html"; });
        document.getElementById("help").addEventListener("click", function () { window.location.href = "help.html"; });
    </script>
</body>
</html>
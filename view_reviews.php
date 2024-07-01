<?php 
include("connection.php");

$query="select category,item,rating,review from reviews";
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
            right:330px;
            font-size:40px;
            }
        .reviewtable{
            position:absolute;
            top:330px;
            /* right:10px; */
            left:770px;
            font-size:18px;
            border-collapse:collapse;
        }
        .reviewtable th, .reviewtable td{
            border:2px solid white;
            padding:4px 20px;
            word-wrap:break-word;
            word-break:break-word;
            max-width:350px;
        }
        .text{
            width:330px;
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

    <h2 class="h2">Reviews:</h2>
    <table class="reviewtable">
        <tr>
            <th>Category</th>
            <th>Item name</th>
            <th>Rating</th>
            <th class="text">Review</th>
        </tr>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["category"] . "</td>";
                echo "<td>" . $row["item"] . "</td>";
                echo "<td>" . $row["rating"] . "</td>";
                echo "<td>" . $row["review"] . "</td>";
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
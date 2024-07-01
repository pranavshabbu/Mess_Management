<?php 
include("connection.php");

$query1="select item,price from breakfast";
$result1=mysqli_query($con, $query1);

$query2="select item,price from lunch";
$result2=mysqli_query($con, $query2);

$query3="select item,price from dinner";
$result3=mysqli_query($con, $query3);
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
        .b{
            position:absolute;
            bottom:400px;
            right:560px;
            font-size:40px;
            }
        .breakfast{
            position:absolute;
            top:320px;
            right:570px;
            font-size:18px;
            /* border-collapse:collapse; */
        }
        .breakfast th{
            text-decoration:underline;
        }
        .breakfast th, .breakfast td{
            /* border:2px solid white; */
            padding:4px 20px;
            word-wrap:break-word;
            word-break:break-word;
            max-width:350px;
        }

        .l{
            position:absolute;
            bottom:400px;
            right:345px;
            font-size:40px;
            }
        .lunch{
            position:absolute;
            top:320px;
            right:300px;
            font-size:18px;
            /* border-collapse:collapse; */
        }
        .lunch th{
            text-decoration:underline;
        }
        .lunch th, .lunch td{
            /* border:2px solid white; */
            padding:4px 20px;
            word-wrap:break-word;
            word-break:break-word;
            max-width:350px;
        }

        .d{
            position:absolute;
            bottom:400px;
            right:75px;
            font-size:40px;
            }
        .dinner{
            position:absolute;
            top:320px;
            right:54px;
            font-size:18px;
            /* border-collapse:collapse; */
        }
        .dinner th{
            text-decoration:underline;
        }
        .dinner th, .dinner td{
            /* border:2px solid white; */
            padding:4px 20px;
            word-wrap:break-word;
            word-break:break-word;
            max-width:350px;
        }

        .vl2 {
            width: 3px;
            height: 385px;
            background-color: white;
            position: absolute;
            bottom: 130px;
            right: 270px;  
            border-radius:10px;       
        }
        .vl1 {
            width: 3px;
            height: 385px;
            background-color: white;
            position: absolute;
            bottom: 130px;
            right: 525px; 
            border-radius:10px;         
        }
        .hl {
            width: 700px;
            height: 3px;
            background-color: white;
            position: absolute;
            bottom: 425px;
            right: 55px;  
            border-radius:10px;        
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

    <div class="vl1"></div>
    <div class="vl2"></div>
    <div class="hl"></div>

    <h2 class="b">Breakfast</h2>
    <table class="breakfast">
        <tr>
            <th>Item </th>
            <th>Price</th>
        </tr>

        <?php
        if (mysqli_num_rows($result1) > 0) {
            while($row = mysqli_fetch_assoc($result1)) {
                echo "<tr>";
                echo "<td>" . $row["item"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results found</td></tr>";
        }
        ?>
    </table>

    <h2 class="l">Lunch</h2>
    <table class="lunch">
        <tr>
            <th>Item </th>
            <th>Price</th>
        </tr>

        <?php
        if (mysqli_num_rows($result2) > 0) {
            while($row = mysqli_fetch_assoc($result2)) {
                echo "<tr>";
                echo "<td>" . $row["item"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results found</td></tr>";
        }
        ?>
    </table>

    <h2 class="d">Dinner</h2>
    <table class="dinner">
        <tr>
            <th>Item </th>
            <th>Price</th>
        </tr>

        <?php
        if (mysqli_num_rows($result3) > 0) {
            while($row = mysqli_fetch_assoc($result3)) {
                echo "<tr>";
                echo "<td>" . $row["item"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
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
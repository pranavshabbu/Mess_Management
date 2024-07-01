<?php 
include("connection.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $category=$_POST['category'];
    $item=$_POST['itemname'];
    $price=$_POST['itemprice'];

    if(!empty($category) && !empty($item) && !empty($price))
    {
        $query="insert into $category values ('$item',$price)";
        $result=mysqli_query($con, $query);

        echo "<script>
                    alert('Item added');
                    window.location.href = 'staff_options.html';
                </script>";
    }
    else{
        echo "<script>
            alert('Error: Enter valid info.');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mess Management</title>
        <link rel="icon" href="background/logo.png">
        <link rel="stylesheet" href="main_style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
        <style>
            .h1{
                position:absolute;
                bottom:390px;
                right:285px;
                font-size:50px;
            }
            .catlabel{
                position:absolute;
                bottom:370px;
                right:430px;
                font-size:20px;
            }
            .catmenu{
                font-family: "Poetsen One", sans-serif;
                position:absolute;
                bottom:370px;
                right:210px;
                background-color: transparent;
                border:2px solid white;
                border-radius:5px;
                font-size:15px;
                padding: 4px 0px;
                width:185px;
                color: white;
                text-align:center;
            }
            .option{
                color:black;
                text-align:center;
            }
            .itemlabel{
                position:absolute;
                bottom:320px;
                right:438px;
                font-size:20px;
            }
            .itemfield{
                font-family: "Poetsen One", sans-serif;
                position:absolute;
                bottom:320px;
                right:210px;
                background-color: transparent;
                border:2px solid white;
                border-radius:5px;
                font-size:15px;
                padding: 4px 0px;
                width:183px;
                color: white;
                text-align:center;
            }
            .pricelabel{
                position:absolute;
                bottom:270px;
                right:443px;
                font-size:20px;
            }
            .pricefield{
                font-family: "Poetsen One", sans-serif;
                position:absolute;
                bottom:270px;
                right:210px;
                background-color: transparent;
                border:2px solid white;
                border-radius:5px;
                font-size:15px;
                padding: 4px 0px;
                width:183px;
                color: white;
                text-align:center;
            }
            .button{
                position:absolute;
                bottom:190px;
                right:340px;
                display: block;
                padding: 5px 25px;
                font-family: "Poetsen One", sans-serif;
                background-color: transparent;
                border-color: white;
                font-size: 15px;
                color: white;
                cursor: pointer;
                border-radius: 10px;
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

            <h1 class="h1">Add Item:</h1>

            <form method="POST" action="add_item.php">
                <label class="catlabel">Choose Category</label>
                <select class="catmenu" name="category" id="category" required>
                    <option value="" disabled selected hidden></option>
                    <option class="option" value="breakfast">breakfast</option>
                    <option class="option" value="lunch">lunch</option>
                    <option class="option" value="dinner">dinner</option>
                </select>
                <br><br>
                <label class="itemlabel">Enter item name</label>
                <input class="itemfield" type="text" name="itemname" id="itemname" required>
                <br><br>
                <label class="pricelabel">Enter item price</label>
                <input class="pricefield" type="number" name="itemprice" id="itemprice" required>
                <br><br>
                <input class="button" type="Submit" id="additem" value="Add Item">
            </form>

            <script>
                document.getElementById("contact").addEventListener("click", function () { window.location.href = "contact_us.html"; });
                document.getElementById("help").addEventListener("click", function () { window.location.href = "help.html"; });
            </script>
    </body>
</html>
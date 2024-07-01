<?php 
include("connection.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $category=$_POST['category'];
    $item=$_POST['item'];

    if(!empty($category) && !empty($item))
    {
        $query="delete from $category where item='$item'";
        $result=mysqli_query($con, $query);

        echo "<script>
                    alert('Item removed');
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="main_style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
        <style>
            .h1{
                position:absolute;
                bottom:350px;
                right:250px;
                font-size:50px;
            }
            .catlabel{
                position:absolute;
                bottom:330px;
                right:430px;
                font-size:20px;
            }
            .catmenu{
                font-family: "Poetsen One", sans-serif;
                position:absolute;
                bottom:330px;
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
                bottom:280px;
                right:475px;
                font-size:20px;
            }
            .itemmenu{
                font-family: "Poetsen One", sans-serif;
                position:absolute;
                bottom:280px;
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
            .itemmenu option{
                color:black;
            }
            .button{
                position:absolute;
                bottom:220px;
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

            <h1 class="h1">Remove Item:</h1>

            <form method="POST" action="remove_item.php">
                <label class="catlabel">Choose Category</label>
                <select class="catmenu" name="category" id="category" required>
                    <option value="" disabled selected hidden></option>
                    <option class="option" value="breakfast">breakfast</option>
                    <option class="option" value="lunch">lunch</option>
                    <option class="option" value="dinner">dinner</option>
                </select>
                <br><br>
                <label class="itemlabel">Choose Item</label>
                <select class="itemmenu" name="item" id="item" required>
                    <!-- Options will be populated dynamically using AJAX -->
                </select>
                <br><br>
                <input class="button" type="Submit" id="removeitem" value="Remove Item">
            </form>

            <script>
                $(document).ready(function(){
                    $('#category').on('change',function(){
                        var category=$(this).val();
                        $.ajax({
                            type:'POST',
                            url:'get_items.php',
                            data:{category:category},
                            success:function(response){
                                $('#item').html(response);
                            }
                        })
                    })
                })

                document.getElementById("contact").addEventListener("click", function () { window.location.href = "contact_us.html"; });
                document.getElementById("help").addEventListener("click", function () { window.location.href = "help.html"; });
            </script>
    </body>
</html>
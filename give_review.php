<?php 
include("connection.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $id=$_POST['userid'];
    $category=$_POST['category'];
    $item=$_POST['item'];
    $rating=$_POST['rating'];
    $review=$_POST['review'];

    if(!empty($id) && !empty($category) && !empty($item) && !empty($rating) && !empty($review))
    {
        try{
            $query="insert into reviews (userid,category,item,rating,review) values ($id,'$category','$item',$rating,'$review')";
            mysqli_query($con,$query);
            echo "<script>
                    alert('Review given');
                    window.location.href = 'stud_options.html';
                  </script>";
        }
        catch(mysqli_sql_exception $e){
            echo "<script>
                alert('Error: Invalid User ID.');
                </script>";
        }
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
        .idlabel{
            position:absolute;
            bottom:480px;
            right:430px;
            font-size:20px;
        }
        .idfield{
            font-family: "Poetsen One", sans-serif;
            position:absolute;
            bottom:480px;
            right:210px;
            background-color: transparent;
            border:2px solid white;
            border-radius:5px;
            padding: 4px 0px;
            width:181px;
            color: white;
        }
        .catlabel{
            position:absolute;
            bottom:430px;
            right:470px;
            font-size:20px;
        }
        .catmenu{
            font-family: "Poetsen One", sans-serif;
            position:absolute;
            bottom:430px;
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
            bottom:380px;
            right:514px;
            font-size:20px;
        }
        .itemmenu{
            font-family: "Poetsen One", sans-serif;
            position:absolute;
            bottom:380px;
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
        .ratelabel{
            position:absolute;
            bottom:330px;
            right:514px;
            font-size:20px;
        }
        .star-rating {
            position: absolute;
            bottom:320px;
            right:225px;
            direction: rtl;
            font-size: 2em;
        }

        .star-input {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
        }

        .star-input:checked + label,
        .star-input:checked + label ~ label {
            color: #f5c518;
        }
        .reviewlabel{
            position:absolute;
            bottom:285px;
            right:460px;
            font-size:20px;
        }
        .reviewarea{
            font-family: "Poetsen One", sans-serif;
            font-size:13px;
            position:absolute;
            bottom:185px;
            right:67px;
            background-color: transparent;
            border:2px solid white;
            border-radius:5px;
            padding: 5px 10px;
            color: white;
        }
        .reviewarea::placeholder{
            color:rgb(217,210,210);
        }
        .button{
            position:absolute;
            bottom:135px;
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

    <form method="POST" action="give_review.php">
        <label class="idlabel">Enter your student id</label>
        <input class="idfield" type="number" name="userid" id="userid" required>
        <br><br>

        <label class="catlabel">Choose category</label>
        <select class="catmenu" name="category" id="category" required>
            <option value="" disabled selected hidden></option>
            <option class="option" value="breakfast">breakfast</option>
            <option class="option" value="lunch">lunch</option>
            <option class="option" value="dinner">dinner</option>
        </select>
        <br><br>

        <label class="itemlabel">Choose item</label>
        <select class="itemmenu" name="item" id="item" required>
            <!-- Options will be populated dynamically using AJAX -->
        </select>
        <br><br>

        <label class="ratelabel">Enter rating</label>
        <div class="star-rating" required>
            <input type="radio" id="star5" name="rating" value="5" class="star-input"><label for="star5" title="5 stars">&star;</label>
            <input type="radio" id="star4" name="rating" value="4" class="star-input"><label for="star4" title="4 stars">&star;</label>
            <input type="radio" id="star3" name="rating" value="3" class="star-input"><label for="star3" title="3 stars">&star;</label>
            <input type="radio" id="star2" name="rating" value="2" class="star-input"><label for="star2" title="2 stars">&star;</label>
            <input type="radio" id="star1" name="rating" value="1" class="star-input"><label for="star1" title="1 star">&star;</label>
        </div>

        <br><br><br><br>
        <label class="reviewlabel">Enter your review</label><br>
        <textarea class="reviewarea" name="review" placeholder="Enter your review here" id="review" rows="7" cols="40"></textarea>

        <br><br>
        <input class="button" type="Submit" id="addreview" value="Give Review">
    </form>

    <!-- <button onclick="review_given()">Submit</button> -->

    <script>
        $(document).ready(function () {
            $('#category').on('change', function () {
                var category = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'get_items.php',
                    data: { category: category },
                    success: function (response) {
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
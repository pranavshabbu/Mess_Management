<?php 
ini_set('display_errors', 'Off');

include("connection.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $id=$_POST['studentid'];
    $pass=$_POST['studentpass'];

    if(!empty($id) && !empty($pass))
    {
        $query="select password from users where userid=$id";
        $result=mysqli_query($con, $query);

        if($result)
        {
            $data=mysqli_fetch_assoc($result);
            if($data['password']==$pass)
            {
                header("Location: stud_options.html");
                die;
            }
            else{
                echo("Invalid info");
            }
        }
    }
    else{
        echo("Enter valid info");
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
                right:220px;
                font-size:50px;
            }
            .h2{
                position:absolute;
                bottom:340px;
                right:230px;
                font-size:30px;
            }
            .label1{
                position:absolute;
                bottom:290px;
                right:410px;
                font-size:20px;
                padding:15px;
            }
            .label2{
                position:absolute;
                bottom:240px;
                right:410px;
                font-size:20px;
                padding:14px;
            }
            .idfield{
                position:absolute;
                bottom:300px;
                right:210px;
                background-color: transparent;
                border:2px solid white;
                border-radius:5px;
                padding: 5px 10px;
                color: white;
            }
            .passfield{
                position:absolute;
                bottom:250px;
                right:210px;
                background-color: transparent;
                border:2px solid white;
                border-radius:5px;
                padding: 5px 10px;
                color: white;
            }
            .login{
                position:absolute;
                bottom:190px;
                right:420px;
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
            .signup{
                position:absolute;
                bottom:190px;
                right:280px;
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

        <h1 class="h1">Student Login:</h1>
        <h2 class="h2">Enter your Credentials</h2>

        <form class="studlogin" method="POST" action="stud_login.php">
            <label class="label1">Enter studentid</label>
            <input class="idfield" type="number" name="studentid" id="studentid" required>
            <br><br>
            <label class="label2">Enter password</label>
            <input class="passfield" type="password" name="studentpass" id="studentpass" required>
            <br><br>
            <input class="login" type="Submit" id="studentauth" value="Login">
            <br><br>
        </form>
        <button class="signup" id="signup">Signup</button>

        <script>
        document.getElementById("signup").addEventListener("click", function () { window.location.href = "signup.php"; }); 
        document.getElementById("contact").addEventListener("click", function () { window.location.href = "contact_us.html"; });
        document.getElementById("help").addEventListener("click", function () { window.location.href = "help.html"; });
        </script>
    </body>
</html>
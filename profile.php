<?php
session_start();

if (isset($_SESSION["user_login"]) == true) {

    $user_name = $_SESSION["username"];
    $user_email = $_SESSION["useremail"];
} else {
    header("Location: login.php");
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        .banner {
            width: 100%;
            height: 40vh;
            background-color: aliceblue;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
        }

        .banner h1 {
            text-transform: capitalize;
            text-decoration: underline;
        }

        .banner p {
            font-size: 15px;
        }

        a button {
            width: 120px;
            height: 38px;
            background-color: red;
            color: white;
            border: 1px solid white;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <?php include("navbar.php") ?>


    <div class="banner">
        <h1><?php echo $user_name ?></h1>
        <p><?php echo $user_email ?></p>
        <a class="button" href="./logout.php"> <button>Logout</button></a>
    </div>


</body>

</html
<?php
session_start();

if (isset($_SESSION["user_login"]) || isset($_SESSION["user_login"]) == true) {
    header("Location: index.php");
}

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // check email condition if user email is already in database 
    if (mysqli_num_rows($result) > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_login"] = true;
            $_SESSION["username"] = $user["username"];
            $_SESSION["useremail"] = $user["email"];

            header("Location: index.php");
        } else {
            $loginError = 'Invalid credentials.';
        }
    } else {
        $loginError = 'User not found.';
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(45deg, #4e73df, #1c3d7e);
            font-family: Arial, Helvetica, sans-serif;
        }

        .main {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            width: 400px;
            height: auto;
            background-color: white;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            gap: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .inputDiv {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .inputDiv input {
            width: 100%;
            height: 45px;
            padding: 0 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #f7f7f7;
            outline: none;
            transition: border 0.3s ease;
        }

        .inputDiv input:focus {
            border-color: #4e73df;
        }

        .inputDiv button {
            width: 100%;
            height: 45px;
            border-radius: 8px;
            background-color: #4e73df;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .inputDiv button:hover {
            background-color: #3e5a9b;
        }

        .inputDiv a {
            text-align: center;
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .inputDiv a:hover {
            text-decoration: underline;
        }

        .alert {
            width: 100%;
            margin-bottom: 20px;
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>

    <div class="main">
        <form action="login.php" method="POST">
            <h1>Login</h1>

            <!-- Show error message if exists -->
            <?php if (isset($loginError)): ?>
                <div class="alert" role="alert">
                    <?= $loginError; ?>
                </div>
            <?php endif; ?>

            <div class="inputDiv">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <a href="signup.php">Don't have an account? Sign up</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> 
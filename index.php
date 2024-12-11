<?php 
session_start();
if (isset($_SESSION["user_login"]) != true) {
    header("Location: login.php");
}
include 'db.php';
$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM blogs WHERE id = $id";
    $del_result = mysqli_query($conn, $sql);

    if ($del_result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

$conn->close();
?>











?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blogs || PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=lock" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
.main {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .icon-div {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .icon-div a {
            color: #dc3545;
            font-size: 1.25rem;
            transition: color 0.3s ease;
        }

        .icon-div :nth-child(2) {
            color: green;
            font-size: 1.25rem;
            transition: color 0.3s ease;
        }

        .icon-div a:hover {
            color: #155724;
        }

        @media (max-width: 767px) {
            .card {
                max-width: 100%;
            }

            .card-title {
                font-size: 1.1rem;
            }

            .card-text {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
        <h1 class="mb-4 text-center">All Blogs</h1>

        <div class="row main">
            <?php foreach ($result as $post): ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post["title"] ?></h5>
                            <p class="card-text"><?php echo $post["content"] ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $post["author_name"] ?></small></p>
                            <div class="icon-div">
                                <a href="index.php?id=<?php echo $post["Id"] ?>"><i class="bi bi-trash-fill"></i></a>
                                <a href="update.php?id=<?php echo $post["Id"] ?>"><i class="bi bi-pencil-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>

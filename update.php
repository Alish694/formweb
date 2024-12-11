<?php

include  'db.php';











if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM blogs WHERE id = $id";
    $update_result = mysqli_query($conn, $sql);
    $fetch_data = mysqli_fetch_assoc($update_result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $author_name = mysqli_real_escape_string($conn, $_POST["author_name"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);

    $sql = "UPDATE blogs SET author_name='$author_name', title='$title', content='$content' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}


$conn->close();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        input[name="content"] {
            height: 100px;
        }
    </style>
</head>

<body>


    <?php include 'navbar.php' ?>



    <div class="container mt-5 p-5">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label class="form-label">Author Name</label>
                <input type="text" value="<?php echo $fetch_data["author_name"]; ?>" class="form-control" name="author_name" placeholder="Enter your Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" value="<?php echo $fetch_data["title"]; ?>" class="form-control" name="title" placeholder="Enter your blog title">
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea class="form-control" name="content" placeholder="Enter your Blog Content" rows="3"><?php echo $fetch_data["content"]; ?></textarea>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" type="submit">Update Blog</button>
            </div>
        </form>
    </div>

</body>

</html>
<?php

include 'db.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $author_name = $_POST["author_name"];
    $title = $_POST["title"];
    $content = $_POST["content"];


    $sql = "INSERT INTO   blogs(author_name,title,content) VALUES ('$author_name','$title','$content')";


    if ($conn->query($sql) === TRUE) {

        echo  '
        <div class="alert alert-success" role="alert">
         Data Inserted In Database
        </div>
        ';
    } else {

        echo  '
        <div class="alert alert-danger" role="alert">
         Data Not Inserted In Database
        </div>
        ';
    }
}



$conn->close();



?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms || PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>


    <?php include 'navbar.php' ?>


    <div class="container mt-5 p-5">
        <form action="createBlog.php" method="POST">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Author Name</label>
                <input type="text" class="form-control" name="author_name" id="exampleFormControlInput1" placeholder="Enter your Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter your blog title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" placeholder="Enter your Blog Content" rows="3"></textarea>
            </div>

            <div class="col-auto">
                <button class="btn btn-primary" type="submit">Create Blog</button>
            </div>
        </form>

    </div>




</body>

</html>
<?php
require_once('../includes/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process file upload
    $target_directory = '../images/';
    $target_file = $target_directory . basename($_FILES['thumb']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file was uploaded
    if ($_FILES['thumb']['error'] !== UPLOAD_ERR_OK) {
        echo "Error uploading file.";
        exit();
    }

    // Move the uploaded file to the target directory
    if (!move_uploaded_file($_FILES['thumb']['tmp_name'], $target_file)) {
        echo "Error moving file to target directory.";
        exit();
    }

    // Perform database update if file upload was successful
    $query = "UPDATE blogs SET
        title = ?,
        content = ?,
        published_date = ?,
        thumbnail = ?,
        author_id = ?  -- Corrected column name here
        WHERE id = ?";

    $stmt = $connection->prepare($query);

    // Bind parameters and execute query
    $stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(2, $_POST['content'], PDO::PARAM_STR);
    $stmt->bindParam(3, $_POST['published_date'], PDO::PARAM_STR); 
    $stmt->bindParam(4, basename($_FILES['thumb']['name']), PDO::PARAM_STR);
    $stmt->bindParam(5, $_POST['author_id'], PDO::PARAM_INT); 
    $stmt->bindParam(6, $_POST['pk'], PDO::PARAM_INT); 
    if ($stmt->execute()) {
        header('Location: blog_list.php');
        exit();
    } else {
        echo "Error updating database.";
        exit();
    }
} else {
    echo "Invalid request method.";
    exit();
}

?>

<?php
require_once('../includes/connect.php');

// Process file upload
$target_directory = '../images/';
$filename = basename($_FILES['thumb']['name']);
$target_file = $target_directory . $filename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST['submit'])) {
    $check = getimagesize($_FILES['thumb']['tmp_name']);
    if($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES['thumb']['size'] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
$allowed_extensions = array("jpg", "jpeg", "png", "gif");
if (!in_array($imageFileType, $allowed_extensions)) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file and insert project details into the database
} else {
    if (move_uploaded_file($_FILES['thumb']['tmp_name'], $target_file)) {
        echo "The file " . htmlspecialchars($filename) . " has been uploaded.";

        // Process project details insertion into the database
        $query = "INSERT INTO blogs (title, thumbnail, content, author_id, published_date) VALUES (?,?,?,?,?)";

        $stmt = $connection->prepare($query);
        $stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
        $stmt->bindParam(2, $filename, PDO::PARAM_STR); 
        $stmt->bindParam(3, $_POST['content'], PDO::PARAM_STR);
        $stmt->bindParam(4, $_POST['author_id'], PDO::PARAM_INT);
        $stmt->bindParam(5, $_POST['published_date'], PDO::PARAM_STR);

        $stmt->execute();
        $last_id = $connection->lastInsertId();
        $stmt = null;

        header('Location: blog_list.php');
        exit(); // Make sure to exit after redirection
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<?php
include 'config.php';
include 'src/resize.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadFile = $_FILES['image'];
    $newWidth = (int)$_POST['width'];
    $newHeight = (int)$_POST['height'];

    $uploadPath = UPLOAD_DIR . basename($uploadFile['name']);
    move_uploaded_file($uploadFile['tmp_name'], $uploadPath);

    $outputPath = OUTPUT_DIR . 'resized_' . basename($uploadFile['name']);
    
    try {
        resize_image($uploadPath, $outputPath, $newWidth, $newHeight);
        echo "Image successfully resized. <a href='$outputPath'>View Image</a>";
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Resizer</title>
</head>
<body>
    <h1>Resize Your Image</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="image">Select an image:</label>
        <input type="file" name="image" id="image" required><br><br>
        <label for="width">New Width:</label>
        <input type="number" name="width" required><br><br>
        <label for="height">New Height:</label>
        <input type="number" name="height" required><br><br>
        <input type="submit" value="Resize Image">
    </form>
</body>
</html>

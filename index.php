<?php
// Load the image
$image = imagecreatefromjpeg("example.jpg"); // Replace "example.jpg" with the name of your image file

// Get the dimensions of the image
$width = imagesx($image);
$height = imagesy($image);

// Calculate the new dimensions
$newWidth = $width * 0.5; // Change this to the new width you want
$newHeight = $height * 0.5; // Change this to the new height you want

// Create a new image with the new dimensions
$newImage = imagecreatetruecolor($newWidth, $newHeight);

// Resize the image
imagecopyresized($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

// Save the resized image
imagejpeg($newImage, "resized.jpg"); // Replace "resized.jpg" with the name of the resized image file

// Free up memory
imagedestroy($image);
imagedestroy($newImage);
?>

<?php

function resize_image($imagePath, $outputPath, $newWidth, $newHeight) {
    // Get image details
    list($width, $height, $type) = getimagesize($imagePath);
    $image = null;

    switch ($type) {
        case IMAGETYPE_JPEG:
            $image = imagecreatefromjpeg($imagePath);
            break;
        case IMAGETYPE_PNG:
            $image = imagecreatefrompng($imagePath);
            break;
        case IMAGETYPE_GIF:
            $image = imagecreatefromgif($imagePath);
            break;
        default:
            throw new Exception('Unsupported image type');
    }

    // Create a new blank image with the specified dimensions
    $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

    // Resample the image
    imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    // Save the resized image
    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($resizedImage, $outputPath);
            break;
        case IMAGETYPE_PNG:
            imagepng($resizedImage, $outputPath);
            break;
        case IMAGETYPE_GIF:
            imagegif($resizedImage, $outputPath);
            break;
    }

    // Free up memory
    imagedestroy($image);
    imagedestroy($resizedImage);
}
?>

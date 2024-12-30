# resize-image-using-GD-library-with-php

In this script, we use the GD library to resize an image. The script first loads the original image using imagecreatefromjpeg(), and gets the dimensions of the image using imagesx() and imagesy(). Then, it calculates the new dimensions based on a scale factor (in this example, 0.5). It creates a new image with the new dimensions using imagecreatetruecolor(), and resizes the original image to fit the new dimensions using imagecopyresized(). Finally, it saves the resized image using imagejpeg() and frees up memory using imagedestroy().

You can modify this script to perform other image manipulation tasks, such as cropping or watermarking, by using different functions from the GD library.


I would revamp this now for use in a more sophisticated way. 
<?php

function generateThumbnailImage()
{
    $imageDir = '../public/images/placeholder/';
    $image = glob($imageDir . '*.jpg', GLOB_BRACE);
    $imagePath = str_replace('../public', '', $image);
    $randomImage = $imagePath[array_rand($imagePath)];

    return $randomImage;
}

?>

<?php
include 'image_resize_lib/ImageResize.php';
use \Gumlet\ImageResize;
class Image_resize{
    public function __construct()
    {
    }

    public function normal($source_image, $destination_image, $width, $height,$allow_enlarge){
        $image = new ImageResize($source_image);
        $image->resize($width, $height, $allow_enlarge);
        $image->save($destination_image);
    }

    public function toBestFit($source_image, $destination_image, $width, $height, $allow_enlarge = False){
        $image = new ImageResize($source_image);
        $image->resizeToBestFit($width, $height, $allow_enlarge);
        $image->save($destination_image);
    }


    public function toHeight($source_image, $destination_image, $height, $allow_enlarge = False){
        $image = new ImageResize($source_image);
        $image->resizeToHeight($height,$allow_enlarge);
        $image->save($destination_image);
    }
    public function toWidth($source_image, $destination_image, $width, $allow_enlarge = False){
        $image = new ImageResize($source_image);
        $image->resizeToWidth($width,$allow_enlarge);
        $image->save($destination_image);
    }


    public function scale($source_image, $destination_image, $percentage){
        $image = new ImageResize($source_image);
        $image->scale($percentage);
        $image->save($destination_image);
    }

    public function crop($source_image, $destination_image, $width, $height, $allow_enlarge = False){
        $image = new ImageResize($source_image);
        $image->crop($width,  $height, $allow_enlarge);
        $image->save($destination_image);
    }


    public function cropCenter($source_image, $destination_image, $width, $height, $allow_enlarge = False){
        $image = new ImageResize($source_image);
        $image->crop($width, $height, $allow_enlarge, ImageResize::CROPCENTER);
        $image->save($destination_image);

    }

    public function test($image,$newImage){
        $image = new ImageResize($image);
        $image->crop(200, 200, true, ImageResize::CROPCENTER);
        $image->save($newImage);

    }
}
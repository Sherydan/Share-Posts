<?php
    require 'SimpleImage.php';
    class ImageProcessing {
    
        public function showExif($data = []){
            try{
                $image = new SimpleImage;
                $exif = [];
                $exif= $image->fromFile($data['image_to_process'])->getExif();
                
                return $exif;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        
    }
    

?>
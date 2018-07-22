<?php
    require_once('../app/vendor/autoload.php');
    // import the Intervention Image Manager Class
    use Intervention\Image\ImageManager;
    
    class Image {

        private $save_path;
        private $new_image;

        public function addWaterMark($data = []){
            try{
                // create an image manager instance with favored driver
                $manager = new ImageManager();
                // to finally create image instances
                # $image = $manager->make($data['image_to_process'])->resize(100, 100)->save('edited.jpg');
                $image = $manager->make($data['image_to_process'])->insert('C:/xampp/htdocs/shareposts/public/img/watermark.jpg', 'bottom-right', 5, 5)->save('img/watermarked.jpg');
                /*
                $width = $manager->make($data['image_to_process'])->width();
                echo $width;
                */

                $new_image = '/img/watermarked.jpg';

                return $new_image;
            } catch (Exception $e){
                return false;
                # echo $e->getMessage();
            }
        }
    }
?>
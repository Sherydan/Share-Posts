<?php
# Pages es el controlador default
class Pages extends Controller{
    
    public function __CONSTRUCT(){
        # creo la propiedad postModel y llamo a la funcion model
        # la cual busca el modelo dentro de la carpeta y lo instancea
        # $this->postModel = $this->model('Post');
    }

     # como extendi Controller, puedo llamar a los emtodos view y model
    # al cargarse la funcion index (que se determina en la url)
    # esta funcion al mismo tiempo carga la vista junto con sus datos
    public function index(){

        if (isLoggedIn()) {
           redirect('posts'); 
        }
        $data = ['title' => 'SharePosts', 'description' => 'Simple social network built on LuisMVC PHP Framework'];
        $this->view('pages/index', $data);
        
    }

    public function contact(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => htmlspecialchars(strip_tags($_POST['name'])),
                'email' => htmlspecialchars(strip_tags($_POST['email'])),
                'subject' => htmlspecialchars(strip_tags($_POST['subject'])),
                'message' => htmlspecialchars(strip_tags($_POST['message'])),
                'name_err' => '',
                'email_err' => '',
                'subject_err' => '',
                'message_err' => '',
                'email_sv_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter a name';
            }
            
            if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Please enter a valid email';
            }
            
            if (empty($data['subject'])) {
                $data['subject_err'] = 'Please enter a subject';
            }

            if (empty($data['message'])) {
                $data['message_err'] = 'Please enter a message';
            }

            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['subject_err']) && empty($data['message_err'])) {

                $email = new Mail();
                if ($email->sendMail($data)) {
                    $this->view('pages/contact', $data);
                } else {
                    $data['email_sv_err'] = 'Something went wrong';
                }
                
            } else {
                $this->view('pages/contact', $data);
            }
            
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'subject' => '',
                'message' => '',
                'name_err' => '',
                'email_err' => '',
                'subject_err' => '',
                'message_err' => '',
                'email_sv_err' => ''
            ];
            $this->view('pages/contact', $data);
        }
    }

    # funcion about, se llama desde el core haciendo un callback
    public function about(){
        $data = ['title' => 'About Us', 'description' => 'App to share post with other users'];
        $this->view('pages/about', $data);
    }

    public function tables(){
        $data = [];
        $this->view('pages/tables', $data);
    }

    public function images(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # se submiteo el form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          

            $image = $_FILES['uploadImg'];
            $imagetemp = $_FILES['uploadImg']['tmp_name'];
            $path = $_FILES['uploadImg']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $imagename = 'edit.'.$ext;
            $imagePath ='C:/xampp/htdocs/shareposts/public/img/users_img/';

            $data = [
                'image_to_process' => '',
                'image_to_exif' => '',
                'processed_image' => '',
                'processed_exif_image' => '',
                'exif_data' => '',
                'image_error' => '',
                'processed_image_error' => ''
            ];

            if (!empty($_FILES)) {
                $data['image_error'] = $this->validateImage();
            }

            if (empty($data['image_error'])) {
                # guardar imagen
                if(is_uploaded_file($imagetemp)) {
                    if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
                        # echo "Sussecfully uploaded your image";
                        $data['image_to_process'] = $imagePath . $imagename;
                        $img = new Image;
                        $exif = new ImageProcessing;
                        

                        $data['processed_image'] = $img->addWaterMark($data);

                        $data['exif_data'] = $exif->showExif($data);

                        if (!empty($data['exif_data'])) {
                            $this->view('pages/images', $data);
                        } else{
                            $data['image_error'] = 'Something went wrong during image processing';
                            $this->view('pages/images', $data);
                        }

                        
                        if ($data['processed_image']) {
                            $this->view('pages/images', $data);
                        } else {
                            $data['image_error'] = 'Something went wrong during image processing';
                            $this->view('pages/images', $data);
                        }
                        
                    }
                    else {
                        die('failed to move your image');
                    }
                }
                else {
                    die('failed to upload your image');
                }

            } else {
                # error en la imagen, mostrar vista con el error
                $this->view('pages/images', $data);
            }



        } else {
            # se cargo la pagina
            $data = [
                'image_to_process' => '',
                'processed_image' => '',
                'exif_data' => '',
                'image_error' => '',
                'processed_image_error' => ''
            ];
            $this->view('pages/images', $data);
        }
        
    }

    private function validateImage(){
        $acceptedTypes = ["image/jpeg", "image/png"];
        $image = $_FILES['uploadImg'];
        $imagename = $_FILES['uploadImg']['name'];
        $imagetype = $_FILES['uploadImg']['type'];
        $imagetemp = $_FILES['uploadImg']['tmp_name'];
        $error = '';

        if(in_array($_FILES['uploadImg']['type'], $acceptedTypes) === false) {
            $error = 'Please select a valid image type';
         }

        /* Process image with GD library */
        $verifyimg = (!empty($_FILES['uploadImg']['tmp_name'])) ? getimagesize($_FILES['uploadImg']['tmp_name']) : '' ;

        /* Make sure the MIME type is an image */
        $pattern = "#^(image/)[^\s\n<]+$#i";
        if (!empty($verifyimg)) {
            if (!preg_match($pattern, $verifyimg['mime'])) {
                $error = 'Only image files are allowed!';
            }
        }
        

        return $error;
    }
   
}
?>
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

    
    
   
}
?>
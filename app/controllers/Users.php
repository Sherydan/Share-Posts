<?php
    class Users extends Controller{
        public function __construct(){
            # cargo el modelo user para llamar a sus metodos
            $this->userModel = $this->model('User');

        }

        public function register(){
            # si existe un request method post, proceso los datos
            # en caso contrario, solo muestro la vista
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                # procesar el form
                # sanitizar post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                # incializar $data
                
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                # validar nombre
                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter a name';
                }

                # validar email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter a email';
                } else {
                    # verificar que el email no exista
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                # validar password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter a password';
                } elseif (strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                # validar confirmar password
                if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please re enter your password';
                } elseif ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Password do not match';
                }

                # verificar que no hayan errores
                if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    # registro al usuariio
                    # funcionn register devuelve true o false, dependiendo si hubo errores o no al ingresar el usuario
                    if ($this->userModel->register($data)) {
                        flash('register_success', 'You are now registered');
                        # con mi helper, redirecciono al login
                        redirect('users/login');
                    } else {
                        die('something went wrong');
                    }
                    
                } else {
                    # en caso que no se haya submiteado el form, simplemente cargo la vista
                    $this->view('users/register', $data);
                }
                
            } else {
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
                
                $this->view('users/register', $data);
            }
        }

        public function login(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                # procesar el form
                # sanitizar post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                # incializar $data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];
                
                # chequear email en la bd
                if ($this->userModel->findUserByEmail($data['email'])) {
                    # usuario encontrado

                } else {
                    # usuario no encontrado
                    $data['email_err'] = 'User not found';
                }

                # validar password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter a password';
                } elseif (strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                 # verificar que no hayan errores
                if (empty($data['email_err']) && empty($data['password_err'])) {
                    # validado
                    # chequear y setear el usuario
                    # llamo a la funcion login del modelo, que verifica datos y devuelve false en caso de incorrecto o 
                    # devuelve el arreglo con los datos en caso de correcto
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);


                    if ($loggedInUser) {
                        # setear variables de sesion
                        # como $loggedInUser devuelve datos, seteo la session
                        $this->createUserSession($loggedInUser);
                    } else {
                        # login incorrecto
                        # seteo el error e inmediatamente cargo la vista 
                        $data['password_err'] = 'Incorrect password';
                        $this->view('users/login', $data);
                    }
                } else {
                    $this->view('users/login', $data);
                }


                
            } else {
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];
                
                $this->view('users/login', $data);
            }
        }

        private function createUserSession($user){
            # una vez validado el login, creo la sesion
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_nombre'] = $user->nombre;

            # redirecciono posts
            redirect('posts');
        }

        public function logout(){
        
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_password']);
            session_destroy();

            redirect('users/login');
        }

        

        # en caso de que en la url se llame a /users/ y no se le de ningun metodo
        # automaticamente redirecciono al index
        public function index(){
            $data = ['title' => 'SharePosts', 'description' => 'Simple social network built on LuisMVC PHP Framework'];
            header("Location:". URLROOT);
            
        }
    }

?>
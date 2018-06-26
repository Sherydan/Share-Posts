<?php
    class Users extends Controller{
        public function __construct(){

        }

        public function register(){
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
                    die('Success');
                } else {
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

                 # validar email
                 if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter a email';
                }



                # validar confirmar password
                if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please re enter your password';
                } elseif ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Password do not match';
                }

                # validar password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter a password';
                } elseif (strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                 # verificar que no hayan errores
                 if (empty($data['email_err']) && empty($data['password_err'])) {
                    die('Success');
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

        # en caso de que en la url se llame a /users/ y no se le de ningun metodo
        # automaticamente redirecciono al index
        public function index(){
            $data = ['title' => 'SharePosts', 'description' => 'Simple social network built on LuisMVC PHP Framework'];
            header("Location:". URLROOT);
            
        }
    }

?>
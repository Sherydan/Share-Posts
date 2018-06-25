<?php
    class Users extends Controller{
        public function __construct(){

        }

        public function register(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
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
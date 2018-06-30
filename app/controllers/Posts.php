<?php
    class Posts extends Controller{

        public function __construct(){

            if (!isLoggedIn()) {
                flash('user_not_allowed', 'You need to login to view this page');
                redirect('users/login');
            }

            $this->postModel = $this->model('Post');
        }
        
        public function index(){
            $posts = $this->postModel->getPosts();
            $data = ['posts' => $posts];
            $this->view('posts/index', $data);
        }
    }
?>
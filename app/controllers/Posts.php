<?php
    class Posts extends Controller{

        public function __construct(){

            # para ver la seccion post, necesito que el usuario este loggeado
            if (!isLoggedIn()) {
                flash('user_not_allowed', 'You need to login to view this page');
                redirect('users/login');
            }

            # instanceo un nuevo modelo
            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }
        
        public function index(){
            $posts = $this->postModel->getPosts();
            $data = ['posts' => $posts];
            $this->view('posts/index', $data);
        }

        public function add(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                # sanitizar input
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                # establecer valores
                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                # validar campos
                if (empty($data['title'])) {
                    $data['title_err'] = 'Pleae enter a title';
                }
                if (empty($data['body'])) {
                    $data['body_err'] = 'Please enter a body';
                }


                if (empty($data['title_err']) && empty($data['body_err'])) {
                    if ($this->postModel->addPost($data)) {
                        flash('post_message', 'Post Added');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }
                    
                } else {
                    $this->view('posts/add', $data);
                }

            } else {
                $data = ['title' => '', 'body'=> ''];
                $this->view('posts/add', $data);
                
            }

            
           
        }

        public function show($id){
            
            $post = $this->postModel->showPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user
            ];

            if (!empty($post)) {
                $this->view('posts/show', $data);
            } else {
                redirect('posts');
            }
            

        }

        public function edit($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                # sanitizar input
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                # establecer valores
                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                # validar campos
                if (empty($data['title'])) {
                    $data['title_err'] = 'Pleae enter a title';
                }
                if (empty($data['body'])) {
                    $data['body_err'] = 'Please enter a body';
                }


                if (empty($data['title_err']) && empty($data['body_err'])) {
                    if ($this->postModel->editPost($data)) {
                        flash('post_message', 'Post Updated');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }
                    
                } else {
                    $this->view('posts/edit', $data);
                }

            } else {
                $post = $this->postModel->showPostById($id);

                if ($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }

                $data = ['id' => $id, 'title' => $post->title, 'body'=> $post->body];
                $this->view('posts/edit', $data);
                
            }
        }

        public function delete($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $post = $this->postModel->showPostById($id);

                if ($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }

                if ($this->postModel->deletePost($id)) {
                    flash('post_message', 'Post Deleted');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                redirect('posts');
            }

            
            
        }
    }
?>
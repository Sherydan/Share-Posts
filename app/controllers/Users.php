<?php
    class Users extends Controller{
        public function __construct(){
            # instanceo el modelo user para llamar a sus metodos
            $this->userModel = $this->model('User');
            $this->postModel = $this->model('Post');

           

        }

        public function sendMail(){
            require('../helpers/vendor/phpmailer/send_mail.php');
            

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
            $_SESSION['user_name'] = $user->name;

            # redirecciono posts
            redirect('posts');
        }

        public function logout(){
        
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();

            redirect('users/login');
        }

        

        # en caso de que en la url se llame a /users/ y no se le de ningun metodo
        # automaticamente redirecciono al index
        public function index(){
            $data = ['title' => 'SharePosts', 'description' => 'Simple social network built on LuisMVC PHP Framework'];
            header("Location:". URLROOT);
            
        }

        public function profile($id = null){
            $user = $this->userModel->getUserById($id);
            $posts = $this->postModel->getPostsByUser($id);
            $user_settings = $this->userModel->getUserSettings($id);
            $quantity = count($posts);
            $profile_image = !empty($user_settings->path) ? $user_settings->path : '';
            if (!empty($user)) {
                
                $data = [
                    'user' => $user,
                    'quantity' => $quantity,
                    'profile_image' => $profile_image
                ];
    
                $this->view('users/profile', $data);
            } else {
                redirect('posts');
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


        public function edit($id = NULL){
            if (!empty($id) && $_SESSION['user_id'] == $id) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    
                    # ESTO SUCEDERA AL ENVIAR EL SUBMIT DESDE LA PAGINA
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    $image = $_FILES['uploadImg'];
                    $imagetemp = $_FILES['uploadImg']['tmp_name'];
                    $path = $_FILES['uploadImg']['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);

                    $imagename = $id.'.'.$ext;

                    $imagePath ='C:/xampp/htdocs/shareposts/public/img/users_img/';

                    $data = [
                        'user_id' => $id,
                        'timezone' => $_POST['timezone'],
                        'gender' => $_POST['gender'],
                        'display_name' => $_POST['display_name'],
                        'image_name' => $imagename,
                        'timezone_err' => '',
                        'gender_err' => '',
                        'display_name_err' => '',
                        'image_name_err' => ''
                    ];

                    

                    # validar timezone
                    if (empty($data['timezone'])) {
                        $data['timezone_err'] = 'Please select a timezone';
                    }

                    # validar genero
                    if (empty($data['gender'])) {
                        $data['gender_err'] = 'Please select a gender';
                    }

                    # validar display name
                    if (empty($data['display_name'])) {
                        $data['display_name_err'] = 'Please add a display name';
                    }

                    # validar imagen
                    if (!empty($_FILES)) {
                        $data['image_name_err'] = $this->validateImage();
                    }

                    # verificar que no hayan errores
                    if (empty($data['timezone_err']) && empty($data['gender_err']) && empty($data['display_name_err']) && empty($data['image_name_err'])) {
                        
                        if ($this->userModel->updateSettings($data)) {
                            if(is_uploaded_file($imagetemp)) {
                                if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
                                    # echo "Sussecfully uploaded your image.";
                                }
                                else {
                                    die('failed to move your image');
                                }
                            }
                            else {
                                die('failed to upload your image');
                            }

                            flash('edit_success', 'Profile updated');
                            redirect('posts');
                        } else {
                            die('Something went wrong on the image');
                        }
                        
                    } else {
                        $this->view('users/edit_profile', $data);
                    }

                } else {
                    $data = [
                        'user_id' => '',
                        'timezone' => '',
                        'gender' => '',
                        'display_name' => '',
                        'image_name' => '',
                        'timezone_err' => '',
                        'gender_err' => '',
                        'display_name_err' => '',
                        'image_name_err' => ''
                    ];

                    $this->view('users/edit_profile', $data);
                }
                
            } else {
                redirect('posts');
            }
           
        }

        public function recoverPassword(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                $data = [
                    'email' => $_POST['email'],
                    'user_id' => '',
                    'token' => '',
                    'email_err' => '',
                ];

                if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    if ($this->userModel->getUserByEmail($data['email'])) {
                        $generator = new RandomStringGenerator;
                        $tokenLength = 32;
                        $token = $generator->generate($tokenLength);

                        $user_id = $this->userModel->getUserByEmail($data['email']);

                        $data['user_id'] = $user_id->id;
                        $data['token'] = $token;

                        if ($this->userModel->recoverPassword($data)) {
                            $mail = new Mail;
                           

                            if ($mail->sendRecoveryPassMail($data)) {
                                flash('mail_sent_success', 'Success! Please check your email for instructions');
                               $this->view('users/recover_password', $data);
                            } else {
                                die('Something went worng');
                            }

                        } else {
                            die('Something went worng');
                        }
                    } else {
                        $data['email_err'] = 'Email not found';
                    }
                } else {
                    $data['email_err'] = 'Please enter a valid email';
                }

                if (!empty($data['email_err'])) {

                    $this->view('users/recover_password', $data);
                }

            } else {
                $data = [
                    'email' => '',
                    'user_id' => '',
                    'token' => '',
                    'mail_err' => ''
                ];

                $this->view('users/recover_password', $data);
            }
        }

        public function recover($token = ''){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                # si hay peticion post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'password' => $_POST['password'],
                    'password2' => $_POST['password2'],
                    'user_id' => $_POST['user_id'],
                    'valid_token' => 'valid',
                    'password_err' => '',
                    'password2_err' => '',
                    'user_id_err' => ''
                ];

                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter a password';
                } elseif (strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 character long';
                }

                if (empty($data['password2'])) {
                    $data['password2_err'] = 'Please re enter your password';
                } elseif ($data['password2'] != $data['password']) {
                    $data['password2_err'] = 'Password doesnt match'; 
                }

                if (empty($data['user_id'])) {
                    $data['user_id_err'] = 'User not found';
                }

                if (empty($data['password_err']) && empty($data['password2_err']) && empty($data['user_id_err']) ) {
                    # sin errores en el form
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if ($this->userModel->updatePassword($data)) {
                        flash('recover_success', 'Success! You can now log in');
                        # con mi helper, redirecciono al login
                        redirect('users/login');
                    } else {
                        die('Something went wrong');
                    }

                } else {
                    # errores en el form
                    $this->view('users/recover', $data);
                }
            } else {
                if (!empty($token)) {
                    $result = $this->userModel->validateToken($token);
                    if (!empty($result)) {
                        # token valido
                        $data = [
                            'user_id' => $result->user_id,
                            'token' => $result->recovery_key,
                            'valid_token' => 'valid'
                        ];
                        $this->view('users/recover', $data);
                        
                    } else {
                        # token invalido
                        $data = [
                            'valid_token' => 'invalid'
                        ];
                        $this->view('users/recover', $data);
                    }
                } else {
                    # token vacio
                    redirect('pages/index');
                }



            }
            
        }



        
    }

?>
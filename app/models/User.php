<?php
    class User
    {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }
    
        # encontrar el usuario en la base de datos
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);
    
            $row = $this->db->single();
    
            // Check row
            if ($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        # registrar usuario
        public function register($data){
            $this->db->query('INSERT INTO users (email, name, password) VALUES(:email, :name, :password)');
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':password', $data['password']);

            # dependiendo si todo sale bien, retorno true o false
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password){
            # selecciono la fila completa con los datos
            # en este punto, el email ya esta verificado
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashedPassword = $row->password;

            # comparar la pass en texto plano con la que esta en la db 
            if (password_verify($password, $hashedPassword)) {
                # retorno los datos de sesion
                return $row;
            } else {
                # retorno falso en caso de datos incorrectos
                return false;
            }
        }

        public function getUserById($id){
            $this->db->query('SELECT * FROM users WHERE id = :id');
            $this->db->bind(':id', $id);
    
            $row = $this->db->single();

            return $row;
        }
    }
?>
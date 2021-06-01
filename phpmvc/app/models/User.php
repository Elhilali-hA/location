<?php

    class User{

        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function register($data)
        {
            $this->db->query('INSERT INTO client (nom, prenom, email, ville, phone, date_naissance, password) values (:nom, :prenom, :email, :ville, :phone, :date_naissance, :password)');
            // Bind values
            $this->db->bind(':nom', $data['nom']);
            $this->db->bind(':prenom', $data['prenom']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':ville', $data['ville']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':date_naissance', $data['date_naissance']);
            $this->db->bind(':password', $data['password']);
            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        public function add($data)
        {
            $this->db->query('INSERT INTO vehicule (Code, Name, prix, categorie, color) values (:code, :name, :prix, :categorie, :color, :img)');
            // Bind values
            $this->db->bind(':code', $data['Code']);
            $this->db->bind(':name', $data['Name']);
            $this->db->bind(':prix', $data['prix']);
            $this->db->bind(':categorie', $data['categorie']);
            $this->db->bind(':color', $data['color']);
            // $this->db->bind(':disponibilité', $data['disponibilité']);
            $this->db->bind(':ima',$data['ima']);
            // Execute
            if ( $this->db->execute() ) {
                return true;
            } else {
                return false;
            }
        }
    
        public function deleteUser($id)
        {
            $this->db->query('DELETE FROM client where id = :id');
            // Bind values
            $this->db->bind(':id', $id);
        
            // Execute
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }
        
        public function login($email,$password)
        {
            $this->db->query('SELECT * from client where email = :email');
            $this->db->bind(':email', $email);
            $row = $this->db->single();

            $hashed_password = $row->password;
            if ( password_verify($password,$hashed_password) ) {
                return $row;
            } else {
                return false;
            }
        }
    
        

        public function getUserByEmail($email)
        {
            $this->db->query('SELECT * FROM client WHERE email = :email');
            // Bind values
            $this->db->bind(':email', $email);
            $this->db->single();

            // Check row
            if ( $this->db->rowCount() > 0 ) {
                return true;
            } else {
                return false;
            }
        }

        public function getUserByEm( $email)
        {
            $this->db->query('SELECT * FROM client WHERE email = :email');
            // Bind values
            $this->db->bind(':email', $email);
            $this->db->execute();

            // Check row
            
        }

        public function getUserById($id)
        {
            $this->db->query('SELECT * FROM client WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);
            return $this->db->single();
        }
    
        public function updatePassword($data)
        {
            $this->db->query('UPDATE client SET password = :password where email = :email');
            // Bind values
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':email', $data['email']);
            // Execute
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }
        
        public function checkPassword($email,$password)
        {
            $this->db->query('SELECT * from client where email = :email');
            $this->db->bind(':email', $email);
            $row = $this->db->single();
    
            $hashed_password = $row->password;
            if ( password_verify($password,$hashed_password) ) {
                return $row;
            } else {
                return false;
            }
        }

        public function edit ($data) {
  
        
            $this->db->query('UPDATE vehicule SET categorie = :categorie, Name = :name , prix = :prix , img = :img where Code = :Code');
            // Bind values
            $this->db->bind(':Code', $data['Code']);
            $this->db->bind(': categorie', $data[' categorie']);
            $this->db->bind(':Name', $data['Name']);
            $this->db->bind(':prix', $data['prix']);
            $this->db->bind(':img', $data['img']);
 
            // Execute
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }

    }
    
        public function getUser()
        {
            $this->db->query('SELECT * FROM client limit 1');
            return $this->db->resultSet();
    
        }   

        public function getUsers()
        {
            $this->db->query('SELECT * FROM client');
            return $this->db->resultSet();
    
        }  


        public function getcars()
        {
            $this->db->query('SELECT * FROM vehicule');
            return $this->db->resultSet();
    
        }  
        
        

       
    }

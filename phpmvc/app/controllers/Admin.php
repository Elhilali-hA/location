<?php


class Admin extends Controller
{
    public function __construct()
    {
        $this->UserModel = $this->model('User');
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        if (!isLoggedIn()) {
            redirect('admin/login');
        }
        $users = $this->UserModel->getUsers();
        $data = [
            'users' => $users
        ];
        return $this->view('admin/index', $data);
    }
    public function garage()
    {
        $cars = $this->UserModel->getcars();
        $data = [
            'cars' => $cars
        ];
        return $this->view('admin/garage', $data);
        
    }

    public function client()
    {

        $users = $this->UserModel->getUsers();
        $data = [
            'users' => $users
        ];
        return $this->view('admin/client', $data);
    }
    public function profile()
    {

        $users = $this->UserModel->getUser();
        $data = [
            'users' => $users
        ];
        
        return $this->view('admin/profile', $data);
    }







    public function register()
    {
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'nom' => trim($_POST['nom']),
                'prenom' => trim($_POST['prenom']),
                'email' => trim($_POST['email']),
                'ville' => trim($_POST['ville']),
                'phone' => trim($_POST['phone']),
                'date_naissance' => trim($_POST['date_naissance']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            // $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
          
            //Validate username on letters/numbers
            if (empty($data['nom'])) {
                $data['name_err'] = 'Please enter username.';
            } elseif (!preg_match($nameValidation, $data['nom'])) {
                $data['name_err'] = 'Name can only contain letters and numbers.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->UserModel->getUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already taken.';
                }
            }

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['password_err'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 6){
              $data['password_err'] = 'Password must be at least 8 characters';
            } 
            

            //Validate confirm password
             if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->UserModel->register($data)) {
                    //Redirect to the login page
                    redirect('admin/login');
                } else {
                    die('Something went wrong.');
                }
            } else{
                // Load view with errors
                $this->view('admin/register',$data);
            }
       } else {
           // Init data
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

           // Load view
           $this->view('admin/register', $data);
       }
   }


    public function login()
    {
        //Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST Data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Process form
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please inform your email';
            } else if (!$this->UserModel->getUserByEmail($data['email'])) {
                // User not found
                $data['email_err'] = 'No user found!';
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please inform your password';
            }

            //Make sure are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $userAuthenticated = $this->UserModel->login($data['email'], $data['password']);
                if ($userAuthenticated) {
                    // Create session
                    $this->createUserSession($userAuthenticated);
                    redirect("admin/profile");
                } else {
                    $data = [
                        'email' => trim($_POST['email']),
                        'password' => '',
                        'email_err' => 'Email or Password are incorrect',
                        'password_err' => 'Email or Password are incorrect',
                    ];
                    $this->view('admin/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('admin/login', $data);
            }
        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            // Load view
            $this->view('admin/login', $data);
        }
    }

    public function logout()
    {

        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('admin/login');
        
    }

    public function createUserSession($user)
    {
        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('posts');
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_email'])) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        if (!isLoggedIn()) {
            redirect('admin/login');
        }

        //Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST Data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Process form
            $data = [
                'email' => $_SESSION['user_email'],
                'password_old' => trim($_POST['password_old']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'password_old_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate Password Old
            if (empty($data['password_old'])) {
                $data['password_old_err'] = 'Please inform your old password';
            } elseif (strlen($data['password_old']) < 6) {
                $data['password_old_err'] = 'Password old must be at least 6 characters';
            } else if (!$this->userModel->checkPassword($data['email'], $data['password_old'])) {
                $data['password_old_err'] = 'Your old password is wrong!';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please inform your password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm your password';
            } else if ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Password does not match!';
            }

            //Make sure errors are empty
            if (empty($data['password_old_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->UserModel->updatePassword($data)) {
                    flash('register_success', 'Password updated!');
                    redirect('posts');
                } else {
                    die('Something wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/changepassword', $data);
            }
        } else {
            // Init data
            $data = [
                'email' => $_SESSION['user_email'],
                'password_old' => '',
                'password' => '',
                'confirm_password' => '',
                'password_old_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Load view
            $this->view('users/changepassword', $data);
        }
    }

    public function add()
    {
        
        //Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST Data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $image=$_FILES['img']['name'];
        //     // Process form
            $data = [
                'Code' => trim($_POST['Code']),
                'Name' => trim($_POST['Name']),
                'prix' => trim($_POST['prix']),
                'categorie' => trim($_POST['categorie']),
                'color' => trim($_POST['color']),
                "image" => trim($_FILES['image']['name']),
                'name_err' => '',
                
            ];

            // Validate Name
            if (empty($data['Name'])) {
                $data['name_err'] = 'Please inform the name of car';
            }
            if($this->uploadPhoto($image)===true){
                if( $this->UserModel->add($data) ){
                  flash('post_message', 'car added');
                  redirect('admins/dachboard');
               } else{
                  die('Something went wrong');
               }
            }else{
               die('Something went wrong');
            }
        //     if (empty($data['name_err'])){

        //         if ($this->userModel->add($data)) {
        //             flash('user_message', 'User created with success!');
        //             redirect('users/garage');
        //         } else {
        //             die('Something wrong');
        //         }
        //     }
                
        //      else{
        //         // Load view with errors
        //         $this->view('users/add',$data);
        //     }
        // } else {
            // Init data
            $data = [
                'Code' => '',
                'Name' => '',
                'prix' => '',
                'categorie' => '',
                'color' => '',
                // 'disponibilité' => '',
                'name_err' => '',
            ];
        
            // Load view
            $this->view('admin/add', $data);
        }
    }
    public function uploadPhoto($image){
        $dir = "C:\\xamp\htdocs\phpmvc\public\img";
        // $time = time();
        $name = str_replace(' ','-',strtolower($_FILES["image"]["name"]));
        $type = $_FILES["image"]["type"];
       
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$dir."/".$name)){
            return true;
        }else{
           return false;
        }
        
     }
     public function update(){

        $Code=$_GET['Code'];
        $cars = $this->UserModel->getcars($Code);
       
        $data = [
           'cars' => $cars,
           
        ];
     
        $this->view('admin/update',$data);
     }

     
     public function edit($Code)
     {    
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
           // Sanitize POST Array
           $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
           $image=$_FILES['image']['name'];
           $data = [
              'Code' => $Code,
              'Name' => trim($_POST['Name']),
              'categorie' => trim($_POST['categorie']),
              'prix' => trim($_POST['prix']),
              'image' => trim($_FILES['image']['name']),
              'marque_err' => '',
              'modele_err' => '',
              'prix_err' => '',
              
           ];
     
           // Validate
           if( empty($data['marque_err']) ){
              $data['marque_err'] = 'Please enter the marque';
           }
           if( empty($data['modele_err']) ){
              $data['modele_err'] = 'Please enter the modele';
           }
           if( empty($data['prix_err']) ){
              $data['prix_err'] = 'Please enter the price';
           }
     
           // Make sure no errors
           if($this->uploadPhoto($image)===true){
              // Validated
              if( $this->UserModel->edit($data) === true){
                 flash('cart_message', 'car Updated');
                 redirect('admin/garage');
              } else{
                 die('Something went wrong');
              }
           }else{
            //   if( $this->UserModel->edit1($data) === true){
            //      flash('cart_message', 'car Updated');
            //      redirect('admin/garage');
            //   } else{
            //      die('Something went wrong');
            //   }
           }
     
              // Load the view
              
           
     
        } else{
           // Get existing post from model
           $post = $this->UserModel->edit($Code);
     
           //Check for owner
          
           $this->view('admin/update', $data);
        }
     
     } 

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get existing post from model
            $user = $this->UserModel->getUserById($id);

            //Check if the user is logged
            if ($user->id == $_SESSION['user_id']) {
                flash('user_message', 'You cannot delete your own user!');
                redirect('admin');
            }

            //Check if the user has posts
            $row = $this->postModel->getPostByUserId($id);
            if ($row->total > 0) {
                flash('user_message', 'You cannot delete a user with published posts!');
                redirect('admin');
            }

            if ($this->UserModel->deleteUser($id)) {
                flash('user_message', 'The user was removed with success!');
                redirect('admin');
            } else {
                flash('user_message', 'An erro ocurred when delete user');
                redirect('admin');
            }
        } else {
            redirect('admin');
        }
    } //end function

}

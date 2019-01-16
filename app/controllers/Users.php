<?php 

    class Users extends Controller {

        public function __construct() {

            $this->userModel = $this->model('User');

        }

        public function register(){
            //Check for Post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //process form

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init data
                $data =[
                        'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                } else {
                    //check email
                    if($this->userModel->findUserByEmail($data['email'])){
                     $data['email_err'] = 'Email is already taken';
                    }
                }

                //Validate Name
                if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
                }   

                 //Validate Passoword
                if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
                } elseif (strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                 //Validate Confirm password
                if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Password do not match';
                    }
                }


                //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    ///die('SUCCESS');
                    //Validated
                    //Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register User
                    if($this->userModel->register($data)){
                        //flash success of registration
                        flash('register_success', 'You are registered and can log in');
                        //redirect to to login page
                        redirect('users/login'); 
                    } else {
                        die('Something went wrong');
                    }



                } else{
                    //Load view
                    $this->view('users/register', $data);
                }

             

            } else {
                //Init data                
                //id, name, email, password, created_at
                $data =[
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //Load view
                $this->view('users/register', $data);

            }
        }


        public function login(){
            //Check for Post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //process form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init data
                $data =[
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                //Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }

                //Validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }


                //check for user/email

                if($this->userModel->findUserByEmail($data['email'])){
                    //User Found
                } else{
                    $data['email_err'] = 'No user found';
                }

                 //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err']) ){
                    //validated
                    //Check and set logged in user

                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser){
                        //create Session
                        //die('success');
                        $this->createUserSession($loggedInUser);

                    } else {
                        $data['password_err'] = 'Password incorrect';
                        $this->view('users/login', $data);
                    }


                } else{
                    //Load view
                    $this->view('users/login', $data);
                }

            } else {
                //Init data                
                //id, name, email, password, created_at
                $data =[
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                //Load view
                $this->view('users/login', $data);

            }
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            redirect('posts');

        }

        public function logout(){

            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);

            session_destroy();
            redirect('users/login');

        }


        
    }





 ?>
<?php
    spl_autoload_register(function ($class_name) {
        include "./Models/" . $class_name . '.php';
    });
    session_start(); 
    class AuthController{

        public static function loginView(){
            include "./Auth/login.php";
        }

        public static function registerView(){
            include "./Auth/register.php";
        }
        
        public static function login(){
            if(isset($_REQUEST) && isset($_REQUEST['email']) && $_REQUEST['password'] != ""){
                if(file_exists('Auth/users.txt')){
                    $users = User::all();

                    foreach($users as $user){
                        if($user->email === $_REQUEST['email']){
                            if(password_verify($_REQUEST['password'], $user->password)){
                                $_SESSION['auth'] = $user;
                                echo "<script type='text/javascript'>location.href = '/';</script>"; 
                                return;
                            }else{
                                throw new Exception("password incorrect!");
                                return;
                            }
                        }
                    }
                    throw new Exception("Email not found!");
                    
                }else{
                    throw new Exception('Not registred yet!');
                }
            }
        }

        public static function register(){
            if(isset($_REQUEST) && isset($_REQUEST['username']) && $_REQUEST['email'] != "" && $_REQUEST['password'] != ""  && $_REQUEST['password_confirmation'] != ""){
                if(file_exists('Auth/users.txt')){
                    $users = User::all();

                    foreach($users as $user){
                        if($user->email === $_REQUEST['email']){
                            throw new Exception('Email (' . $user->email . ') Already exist!');
                        }
                        elseif($user->username === $_REQUEST['username']){
                            throw new Exception('Username (' . $user->username . ') Already exist!');
                        }
                    }
                    AuthController::addUser($_REQUEST);
                    
                }else{
                    AuthController::addUser($_REQUEST);
                }
            }
        }

        public static function addUser($data){
            if($data['password'] === $data['password_confirmation'] && strlen($data['password']) >= 8){
                $configs = include "./config.php";
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT, [10]);
                $user = User::create([
                    'username' => $data['username'],
                    'full_name' => $data['full_name'],
                    'password' => $data['password'],
                    'email' => $data['email'],
                    'profile_picture' => $configs['App_url']  . $configs['default-avatar'],
                    'created_at' => date('d-m-y h:i:s'),
                ]);
                
                echo "<script>alert('Account created succesfully!')</script>"; 
                echo "<script type='text/javascript'>location.href = '/auth/login';</script>";  
            }else{
                echo ($data['password'] !== $data['password_confirmation']) ? ("<script>alert('Password not confirmed!')</script>") : ("<script>alert('Minimum length of password is 8 characters!')</script>");
            }
        }

        public static function logout(){
            unset($_SESSION['auth']);
            echo "<script type='text/javascript'>location.href = '/auth/login';</script>"; 
        }
    }
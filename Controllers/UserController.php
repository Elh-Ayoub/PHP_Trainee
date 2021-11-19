<?php
    spl_autoload_register(function ($class_name) {
        include "./Models/" . $class_name . '.php';
    });
    // session_start(); 
    class UserController{

        public static function profile(){
            if(isset($_SESSION['auth'])){
                include "./profile.php";
            }else{
                throw new Exception('You must log in first!!');
            } 
        }

        public static function update(){
            if(isset($_REQUEST)){
                $users = User::all();
                foreach($users as $user){
                    if($user != $_SESSION['auth']){
                         if($user->email === $_REQUEST['email']){
                            throw new Exception('Email (' . $user->email . ') Already exist!');
                        }
                        elseif($user->username === $_REQUEST['username']){
                            throw new Exception('Username (' . $user->username . ') Already exist!');
                        }
                    }  
                }
                $_SESSION['auth']->update([
                    'username' => $_REQUEST['username'],
                    'email' => $_REQUEST['email'],
                    'full_name' => $_REQUEST['full_name'],
                ]);
                echo "<script type='text/javascript'>location.href = '/profile';</script>";
            }
        }

        public static function update_password(){
            if(isset($_REQUEST)){
                //check current password
                if(password_verify($_REQUEST['current_password'], $_SESSION['auth']->password)){
                    if($_REQUEST['password'] === $_REQUEST['password_confirmation'] && strlen($_REQUEST['password']) >= 8){
                        $_SESSION['auth']->update([
                            'password' => password_hash($_REQUEST['password'], PASSWORD_BCRYPT, [10]),
                        ]);
                        echo "<script>alert('Password updated succesfully!')</script>"; 
                        echo "<script type='text/javascript'>location.href = '/profile';</script>";
                    }else{
                        ($_REQUEST['password'] !== $_REQUEST['password_confirmation']) ? (throw new Exception("password not confirmed!")) : (throw new Exception("Minimum length of password is 8 characters!"));
                        return;
                    }
                }else{
                    throw new Exception("password incorrect!");
                    return;
                }
            }
        }

        public static function update_avatar(){
            $config = include "./config.php";
            if(isset($_FILES)){
                $target_dir = $config['profile-pictures'];
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . $_SESSION['auth']->id . '.' . explode('.',basename($_FILES["avatar"]['name']))[1];

                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)){
                    $_SESSION['auth']->update([
                        'profile_picture' => $config['App_url'] . $target_file,
                    ]);
                }
                echo "<script type='text/javascript'>location.href = '/profile';</script>";
            }
        }

        public static function setDefaultAvatar(){
            $config = include "./config.php";
            //delete profile picture if exist
            $profile_pic_path = parse_url($_SESSION['auth']->profile_picture, PHP_URL_PATH);
            if(strpos($profile_pic_path, 'Auth/profile-pictures')){
                unlink(trim($profile_pic_path, '/'));
            }
            //update field
            $_SESSION['auth']->update([
                'profile_picture' => $config['App_url'] . $config['default-avatar'],
            ]);
            echo "<script type='text/javascript'>location.href = '/profile';</script>";
        }

        public static function destroy(){
            //delete user's posts
            $posts = Post::where(['author' => $_SESSION['auth']->id]);
            foreach($posts as $post){
                //delete post images if exists
                $post_img = parse_url($post->images, PHP_URL_PATH);
                $path =  trim($post_img, '/');
                unlink(trim($path));
                //delete post
                Post::destroy($post->id);
            }
            //delete profile picture if exist
            $profile_pic_path = parse_url($_SESSION['auth']->profile_picture, PHP_URL_PATH);
            if(strpos($profile_pic_path, 'Auth/profile-pictures')){
                unlink(trim($profile_pic_path, '/'));
            }
            //delete user
            User::destroy($_SESSION['auth']->id);
            unset($_SESSION['auth']);
            echo "<script type='text/javascript'>location.href = '/';</script>";
        }
    }

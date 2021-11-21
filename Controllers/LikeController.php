<?php
    spl_autoload_register(function ($class_name) {
        include "./Models/" . $class_name . '.php';
    });
    class LikeController{

        public static function store()
        {
            if(!$_REQUEST['type'] || !$_REQUEST['post_id']){
                return 'Like type/Post id required!';
            }
            $user_id = $_SESSION['auth']->id;
            $id = $_REQUEST['post_id'];
            $checkLike = Like::where(['post_id'=> $id, 'author' => $user_id])[0];
            if($checkLike){
                //if it's like
                if($checkLike->type == 'like'){
                    // and requested like type is "like"
                    if($_REQUEST['type'] == 'like'){
                        Like::destroy($checkLike->id);
                        return 'Like removed successfully!';
                    }
                    // and requested like type is "dislike"
                    else{
                        $checkLike->update(['type' => 'dislike']);
                        return 'Disliked post successfully!';
                    }            
                }
                //if it's dislike
                elseif($checkLike->type == 'dislike'){
                    if($_REQUEST['type'] == 'like'){
                        $checkLike->update(['type' => 'like']);
                        return 'Liked post successfully!';
                    }
                    else{
                        Like::destroy($checkLike->id);
                        return 'Dislike removed successfully!';
                    } 
                }
            }else{
                $like = Like::create([
                    'author' => $user_id,
                    'post_id' => $id,
                    'type' => $_REQUEST['type'],
                ]);
                if($like){
                    return $_REQUEST['type']. ' post successfully!';
                }else{
                    return 'Something went wrong!';
                }
            }
        }

        public static function getPostLikes(){
            $id = $_REQUEST['post_id'];
            return json_encode(Like::where(['post_id' => $id]));
        }

    }

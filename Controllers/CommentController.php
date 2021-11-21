<?php
    spl_autoload_register(function ($class_name) {
        include "./Models/" . $class_name . '.php';
    });
    class CommentController{

        public static function store()
        {
            if((isset($_REQUEST['comment']) && $_REQUEST['comment'] != "") && $_REQUEST['post_id']){
                $comment = Comment::create([
                    'author' => $_SESSION['auth']->id,
                    'content' => $_REQUEST['comment'],
                    'post_id' => $_REQUEST['post_id'],
                ]);
                if($comment){
                    echo "<script type='text/javascript'>location.href = '/';</script>";
                }else{
                    throw new Exception('Something went wrong!');
                }
            }else{
                throw new Exception('Comment content is required');
            }
        }

        public static function destroy(){
            if(isset($_REQUEST['comment_id'])){
                $id = $_REQUEST['comment_id'];
                if(Comment::find($id)){
                    Comment::destroy($id);
                    echo "<script>alert('comment deleted succesfully!')</script>";
                    echo "<script type='text/javascript'>location.href = '/';</script>";
                }
            }else{
                throw new Exception('Something went wrong!');
            }
        }
    }